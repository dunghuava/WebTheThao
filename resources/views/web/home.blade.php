@extends('layout')
@section('title','Trang chủ')
@section('content')
    @php
        $category = App\Category::where([
            'status' => 1,
            'show_home' => 1,
            'type' => 1
        ])->get();
    @endphp
    <section class="container pt-3 pb-2 d-none">
        <div class="row">
            <div class="col-lg-4">
                <div class="box-item">
                    <img src="/images/box.png"/>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-item">
                    <img src="/images/box.png"/>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-item">
                    <img src="/images/box.png"/>
                </div>
            </div>
        </div>
    </section>
    @foreach ($category as $cate)
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>{{ $cate->name }}</h3>
                </div>
            </div>
            @php
                $product = App\Product::where([
                    'status' => 1,
                    'category_id' => $cate->id
                ])->get();
            @endphp
            @foreach($product as $item)
                <div class="col-lg-3">
                    <div class="product-item mb-3">
                        <div class="img">
                            <img src="{{ $item->image }}"/>
                        </div>
                        <p>{{ $item->name }}</p>
                        <p class="text-danger font-weight-bold">{{ number_format($item->price) }} đ</p>
                        <a href="{{ $item->slug_link }}" class="btn btn-sm btn-success">Đặt mua</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @endforeach

    @php
        $bigItem = App\Post::orderBy('id','desc')->first();
        $smallItem = App\Post::orderBy('id','desc')->where('id','<>',$bigItem->id)->limit(4)->get();
    @endphp
    @if($bigItem)
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>Tin tức nổi bật</h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="item-new big">
                    <a href="{{ $bigItem->slug_link }}">
                        <img class="mb-2" src="{{ $bigItem->image }}"/>
                        <h5>{{ $bigItem->name }}</h5>
                        <p>{{ substr($bigItem->desc,0,254) }}</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                @foreach ($smallItem as $n)
                <div class="item-new small">
                    <a href="{{ $n->slug_link }}">
                        <img class="mb-2" src="{{ $n->image }}"/>
                        <p>{{ $n->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
