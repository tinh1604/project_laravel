@extends('backend.layouts.main')
@section('page_content','Quản lý tin tức')
@section('title')
    Quản lý tin tức
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/news/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên bài</th>
                <th>Danh mục</th>
                <th>Ảnh đại diện</th>
                <th>Tóm lược</th>
                <th>Nội dung</th>
                <th>Lượt comment</th>
                <th>Tác giả</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
                <th>Xem/sửa/xóa</th>
            </tr>
            @if(!empty($news))
                @foreach ($news as $value)
                    <tr>
                        <td>
                            {{ $value['id'] }}
                        </td>
                        <td>
                            {{ $value['title'] }}
                        </td>
                        <td>
                            @if($value->categoriesRelation)
                                {{ $value->categoriesRelation->name }}
                            @endif
                        </td>
                        <td>
                            @if(!empty($value['avatar']))
                                <img src="{{ asset('uploads/' . $value['avatar']) }}"
                                     width="80px"/>
                            @endif
                        </td>
                        <td>
                            {{ $value['summary'] }}
                        </td>
                        <td>
                            {!! $value['content']  !!}
                        </td>
                        <td>
                            {{ $value['comment_total'] }}
                        </td>
                        <td>
                            {{ $value['author'] }}
                        </td>

                        <td>
                            @php
                                $statusText = '';
                                switch ($value['status']) {
                                    case \App\Models\News::STATUS_ENABLED:
                                        $statusText = 'Tin nổi bật';
                                        break;
                                    case \App\Models\News::STATUS_DISABLED:
                                        $statusText = 'Tin thường';
                                        break;
                                }
                            @endphp
                            {{ $statusText }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($value['created_at']))}}
                        </td>
                        <td>
                            <a href="{{ url('admin/news/detail/' . $value['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/news/update/' . $value['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/news/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này không?');">
                                <i class="fas fa-trash-alt"></i>
                            </a> &nbsp;
                        </td>
                    </tr>
                @endforeach()
            @else
                <tr>
                    <td colspan="7">
                        Không có bản ghi nào
                    </td>
                </tr>
            @endif
        </table>
        {{ $news->links()  }}
    </section>
    <!-- /.content -->
@endsection()
