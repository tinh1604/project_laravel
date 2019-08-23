<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\News;
use App\Rules\CustomRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends BackendController
{
  //
  public function index()
  {
    $newsModel = new News();
    $news = $newsModel->getAllPaginationBackend();

    return view('backend/news/index', [
      'news' => $news
    ]);
  }

  public function create()
  {
      $categories = Category::select(['id', 'name'])->get();
    return view('backend/news/create', [
      'categories' => $categories
    ]);
  }

  public function store(Request $request)
  {
    //xử lý validate cho form
    $rules = [
      'title' => ['required', "min:2", "unique:news", new CustomRule()],
      'content' => ['required', new CustomRule()],
      'avatar' => ['image', 'max:2024']
    ];
    $messages = [
      'title.required' => 'Title không được để trống',
      'title.min' => 'Title phải nhập ít nhất 2 ký tự',
      'title.unique' => 'Đã tồn tại title này trong CSDL rồi',
      'content.required' => 'Content không được để trống',
      'avatar.image' => 'Phải upload định dạng ảnh',
      'avatar.max' => 'Ảnh upload dung lượng không được > 2Mb',
    ];
    $this->validate($request, $rules, $messages);
    //tiến hành lưu ảnh nếu có
    $avatarFileName = '';
    //nếu có ảnh upload lên, thì tiến hành lưu ảnh
    if (!empty($request->avatar)) {
      $avatar = $request->avatar;
      //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
      $avatarFileName = 'news-' . time() .
        '-' . $avatar->getClientOriginalName();
      //lưu ảnh lên thư mục public/uploads
      $avatar->move(public_path('uploads'), $avatarFileName);
    }
    //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
    $newsModel = new News();
    $newsModel->title = $request->get('title');
    $newsModel->category_id = $request->get('category_id');
    $newsModel->admin_id = session()->get("admin_id") ? session()->get("admin_id") : null;
    $newsModel->avatar = $avatarFileName;
    $newsModel->summary = $request->get('summary');
    $newsModel->content = $request->get("content");
    $newsModel->comment_total = $request->get('comment_total');
    $newsModel->like_total = $request->get('like_total');
    $newsModel->view = $request->get('view');
    $newsModel->status = $request->get('status');
    if ($newsModel->save()) {
      session()->put('success', "Thêm news thành công");
    } else {
      session()->put('error', 'Thêm news thất bại');
    }

    return redirect('/admin/news');

  }

  public function detail($id)
  {
    $news = News::getByIdRelation($id);

    return view('backend.news.detail', [
      'news' => $news
    ]);
  }

  public function update($id)
  {
    $categories = Category::select(['id', 'name'])->get();
    $news = News::getByIdRelation($id);

    return view('backend.news.update', [
      'news' => $news,
      'categories' => $categories,
    ]);
  }

  public function edit(Request $request, $id)
  {
    $news = News::getByIdRelation($id);
    $rules = [
      'title' => ['required', "min:2", new CustomRule()],
      'content' => ['required', new CustomRule()],
      'avatar' => ['image', 'max:2024']
    ];
    $messages = [
      'title.required' => 'Title không được để trống',
      'title.min' => 'Title phải nhập ít nhất 2 ký tự',
      'content.required' => 'Content không được để trống',
      'avatar.image' => 'Phải upload định dạng ảnh',
      'avatar.max' => 'Ảnh upload dung lượng không được > 2Mb',
    ];
    $this->validate($request, $rules, $messages);
    //tiến hành lưu ảnh nếu có
    $avatarFileName = $news->avatar;
    //nếu có ảnh upload lên, thì tiến hành lưu ảnh

    if (!empty($request->avatar)) {
      //xóa ảnh cũ nếu đã tồn tại
      @unlink(public_path('uploads' . '/' . $avatarFileName));
      $avatar = $request->avatar;
      //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
      $avatarFileName = 'news-' . time() .
        '-' . $avatar->getClientOriginalName();
      //lưu ảnh lên thư mục public/uploads
      $avatar->move(public_path('uploads'), $avatarFileName);
    }
    //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
    $news->title = $request->get('title');
    $news->category_id = $request->get('category_id');
    $news->admin_id = session()->get("admin_id") ? session()->get("admin_id") : null;
    $news->avatar = $avatarFileName;
    $news->summary = $request->get('summary');
    $news->content = $request->get("content");
    $news->comment_total = $request->get('comment_total');
    $news->like_total = $request->get('like_total');
    $news->view = $request->get('view');
    $news->status = $request->get('status');
    if ($news->save()) {
      session()->put('success', "Update news thành công");
    } else {
      session()->put('error', 'Update news thất bại');
    }

    return redirect('/admin/news');
  }

  public function delete($id)
  {
    $news = News::find($id);
    if ($news->delete()) {
      session()->put("success", "Xóa news $id thành công");
    } else {
      session()->put('error', "Xóa news $id thất bại");
    }
    return redirect('admin/news');
  }
}
