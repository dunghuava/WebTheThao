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
        @if($type == 'post')
            <div class="row">
                @foreach($items as $item)
                    <div class="col-lg-4">
                        <a href="{{ $item->slug_link }}">
                            <div class="item-new mb-3 btn btn-default">
                                <div class="img">
                                    <img height="220" src="{{ $item->image }}"/>
                                </div>
                                <p class="mb-0">{{ $item->name }}</p>
                                <small>{{ $item->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @if($type == 'product')
            <div class="row">
                @foreach($items as $item)
                    <div class="col-lg-3">
                        <a href="{{ $item->slug_link }}" class="btn btn-sm btn-default mb-3">
                            <div class="product-item mb-3">
                                <div class="img">
                                    <img height="250" src="{{ $item->image }}" />
                                </div>
                                <p>{{ $item->name }}</p>
                                <p class="text-danger font-weight-bold">{{ number_format($item->price) }} đ</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @if($type == 'page')
            <div class="row">
              <div class="col-lg-12">
                   @php
                        echo $items->desc
                   @endphp
              </div>
            </div>
        @endif
    </section>
@endsection
