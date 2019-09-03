<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends BackendController
{
    public function index()
    {
        $ProductModel = new Product();
        $product = $ProductModel->getAllPaginationBackend();

        //lấy thông tin danh mục cho phần search
        $product_category_model = new ProductCategory();
        $product_category = $product_category_model->getAllPaginationBackend();


        return view('backend/product/index', [
            'product' => $product,
            'product_category' => $product_category
        ]);
    }

    public function create()
    {
        $product_category = ProductCategory::select(['id', 'name'])->get();
        return view('backend/product/create', [
            'ProductCategory' => $product_category
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', "min:2"],
            'price' => ['required'],
            'description' => ['required'],
            'img' => ['required','image', 'max:2024']
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải nhập ít nhất 2 ký tự',
            'price.required' => 'Giá không được để trống',
            'description.required' => 'Content không được để trống',
            'img.required' => 'chưa chọn file upload',
            'img.image' => 'Phải upload định dạng ảnh',
            'img.max' => 'Ảnh upload dung lượng không được > 2Mb',
        ];
        $this->validate($request, $rules, $messages);
        $imgFileName = '';
        if (!empty($request->img)) {
            $img = $request->img;
            $imgFileName = time().'-' . $img->getClientOriginalName();
            $img->move(public_path('uploads'), $imgFileName);
        }

        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $productModel = new Product();
        $productModel->name = $request->get('name');
        $productModel->english_name = $request->get('english_name');
        $productModel->product_category_id = $request->get('product_category_id');
        $productModel->img = $imgFileName;
        $productModel->price = $request->get('price');
        $productModel->description = $request->get("description");
        $productModel->highlight = $request->get('highlight');
        if ($productModel->save()) {
            session()->put('success', "Thêm sản phẩm thành công");
        } else {
            session()->put('error', 'Thêm sản phẩm thất bại');
        }

        return redirect('/admin/product');

    }

    public function detail($id)
    {
        $products = Product::getByIdRelation($id);

        return view('backend.product.detail', [
            'product' => $products
        ]);
    }

    public function update($id)
    {
        $Product_category = ProductCategory::select(['id', 'name'])->get();
        $product = Product::getByIdRelation($id);

        return view('backend.product.update', [
            'product' => $product,
            'product_category' => $Product_category
        ]);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::getByIdRelation($id);
        $rules = [
            'name' => ['required', "min:2"],
            'price' => ['required'],
            'description' => ['required'],
            'img' => ['image', 'max:2024']
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Title phải nhập ít nhất 2 ký tự',
            'price.required' => 'Giá không được để trống',
            'description.required' => 'Content không được để trống',
            'img.image' => 'Phải upload định dạng ảnh',
            'img.max' => 'Ảnh upload dung lượng không được > 2Mb',
        ];
        $this->validate($request, $rules, $messages);
        $imgFileName = $product->img;

        if (!empty($request->img)) {
            //xóa ảnh cũ nếu đã tồn tại
            @unlink(public_path('uploads' . '/' . $imgFileName));
            $img = $request->img;
            //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
            $imgFileName = time().'-'.$img->getClientOriginalName();
            //lưu ảnh lên thư mục public/uploads
            $img->move(public_path('uploads'), $imgFileName);
        }
        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $product->name = $request->get('name');
        $product->english_name = $request->get('english_name');
        $product->product_category_id = $request->get('product_category_id');
        $product->img = $imgFileName;
        $product->price = $request->get('price');
        $product->description = $request->get("description");
        $product->highlight = $request->get('highlight');
        if ($product->save()) {
            session()->put('success', "Update sản phẩm thành công");
        } else {
            session()->put('error', 'Update sản phẩm thất bại');
        }

        return redirect('/admin/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product->delete()) {
            session()->put("success", "Xóa sản phẩm ID = $id thành công");
        } else {
            session()->put('error', "Xóa sản phẩm ID = $id thất bại");
        }
        return redirect('admin/product');
    }
}
