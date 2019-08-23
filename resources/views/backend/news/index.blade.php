@extends('backend.layouts.main')
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
                <th>Title</th>
                <th>Category Name</th>
                <th>Người tạo</th>
                <th>Avatar</th>
                <th>Summary</th>
                <th>Comment total</th>
                <th>Like total</th>
                <th>View</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Ation</th>
            </tr>
            @if(!empty($news))
                @foreach ($news as $new)
                    <tr>
                        <td>
                            {{ $new['id'] }}
                        </td>
                        <td>
                            {{ $new['title'] }}
                        </td>
                        <td>
                            @if($new->categoriesRelation)
                                {{ $new->categoriesRelation->name }}
                            @endif
                        </td>
                        <td>
                            @if($new->adminsRelation)
                                {{ $new->adminsRelation->username }}
                            @endif
                        </td>
                        <td>
                            @if(!empty($new['avatar']))
                                <img src="{{ asset('uploads/' . $new['avatar']) }}"
                                     width="80px"/>
                            @endif
                        </td>
                        <td>
                            {{ $new['summary'] }}
                        </td>
                        <td>
                            {{ $new['comment_total'] }}
                        </td>
                        <td>
                            {{ $new['like_total'] }}
                        </td>
                        <td>
                            {{ $new['view'] }}
                        </td>
                        <td>
                            @php
                                $statusText = '';
                                switch ($new['status']) {
                                    case \App\Models\News::STATUS_ENABLED:
                                        $statusText = 'Active';
                                        break;
                                    case \App\Models\News::STATUS_DISABLED:
                                        $statusText = 'Disabled';
                                        break;
                                }
                            @endphp
                            {{ $statusText }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($new['created_at']))}}
                        </td>
                        <td>
                            <a href="{{ url('admin/news/detail/' . $new['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/news/update/' . $new['id']) }}">
                                <span class="fa fa-pencil"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/news/delete/' . $new['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này hay không?');">
                                <span class="fa fa-trash"></span>
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
