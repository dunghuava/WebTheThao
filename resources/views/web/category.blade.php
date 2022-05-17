@extends('layout')
@section('title','Danh mục')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            @for($i=0;$i<8;$i++)
                <div class="col-lg-3">
                    <div class="product-item mb-3">
                        <div class="img">
                            <img src="/images/xoay_eo.jpg"/>
                        </div>
                        <p>Premium Bio Washed 100% Soft Cotton</p>
                        <p class="text-danger font-weight-bold">190.000 đ</p>
                        <a href="/san-pham/ao-thun-costom-gia-re" class="btn btn-sm btn-success">Đặt mua</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection
