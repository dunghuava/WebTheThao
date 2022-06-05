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
        </div>
    </section>
@endsection
