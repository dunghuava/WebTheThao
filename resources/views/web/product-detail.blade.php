@extends('layout')
@section('title','Trang chủ')
@section('content')
<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5">
                    <div class="img">
                        <img src="{{ $item->image }}" />
                    </div>
                </div>
                <div class="col-lg-7">
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <h4>{{ $item->name }}</h4>
                        <input type="hidden" name="id" value="{{ $item->id }}" />
                        <p class="text-danger font-weight-bold">{{ number_format($item->price) }} đ</p>
                        <button type="submit" class="btn btn-sm btn-success">Đặt mua</button>
                        <p class="mt-2">
                            {{ $item->desc }}
                        </p>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3 pb-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Chi tiết sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Đánh giá</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p>
                                @php
                                echo $item->content
                                @endphp
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p>Chưa có đánh giá nào</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
    $products = App\Product::where('category_id',$item->category_id)->limit(6)->get();
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Sản phẩm liên quan</h3>
            </div>
        </div>
        @foreach($products as $prod)
        <div class="col-lg-3">
            <a href="{{ $prod->slug_link }}" class="btn btn-sm btn-default mb-3">
                <div class="product-item mb-3">
                    <div class="img">
                        <img height="250" src="{{ $prod->image }}" />
                    </div>
                    <p>{{ $prod->name }}</p>
                    <p class="text-danger font-weight-bold">{{ number_format($prod->price) }} đ</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection
