@extends('backend.layouts.main')
@section('title')
    Chi tiết sản phẩm # {{ $product['id'] }}
@endsection()
@section('content')
    <section class="content">
        <p>
            <b>ID: </b> {{ $product['id'] }}
        </p>
        <p>
            <b>Tên sản phẩm: </b> {{ $product['name'] }}
        </p>
        <p>
            <b>Tên tiếng Anh: </b> {{ $product->english_name }}
        </p>
        <p>
            <b>Hình ảnh: </b> <br/>
            @if(!empty($product->img))
                <img width="300" src="{{ asset('/uploads/' . $product->img) }}"/>
            @endif
        </p>
        <p>
            <b>Giá: </b> {{ $product->price }}
        </p>
        <p>
            <b>Miêu tả: </b> <br/> {{ $product['description'] }}
        </p>
        <p>
            <b>Thời gian tạo: </b>
            {{ date('H:i:s d-m-Y', strtotime($product->created_at)) }}
        </p>
        <p>
            <b>Trạng thái: </b>
            @php
                if($product['status']==1){
                        echo 'Sản phẩm nổi bật';
            }
            else echo 'Sản phẩm thường';
            @endphp
        </p>
        <a href="{{ url('/admin/product') }}" class="btn btn-primary">
            Back
        </a>
    </section>
@endsection()
