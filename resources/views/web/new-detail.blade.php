@extends('layout')
@section('title','Trang chủ')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12">
                <h3>{{ $item->name }}</h3>
                <hr class="mb-1 mt-1"/>
                <small class="mb-2">
                    <i>Đăng ngày: {{ date('d/m/Y H:i',strtotime($item->updated_at)) }}</i>
                </small>
                <div class="content">
                    @php
                        echo $item->content
                    @endphp
                </div>
            </div>
            @php
               $news = App\Post::where('category_id',$item->category_id)->limit(6)->get();
            @endphp
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>Tin tức liên quan</h3>
                </div>
            </div>
            @foreach ($news as $new)
                <div class="col-lg-4">
                    <a href="{{ $new->slug_link }}">
                        <div class="item-new mb-3 btn btn-default">
                            <div class="img">
                                <img height="220" src="{{ $new->image }}"/>
                            </div>
                            <p class="mb-0">{{ $new->name }}</p>
                            <small>{{ $new->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
