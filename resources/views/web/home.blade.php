@extends('layout')
@section('title','Trang chủ')
@section('content')
    <section class="container pt-3 pb-2">
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
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>Trang phục thể thao</h3>
                </div>
            </div>
            @for($i=0;$i<8;$i++)
                <div class="col-lg-3">
                    <div class="product-item mb-3">
                        <div class="img">
                            <img src="/images/tshirt.jpg"/>
                        </div>
                        <p>Premium Bio Washed 100% Soft Cotton</p>
                        <p class="text-danger font-weight-bold">190.000 đ</p>
                        <a href="/san-pham/ao-thun-costom-gia-re" class="btn btn-sm btn-success">Đặt mua</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>Thiết bị tập thể thao</h3>
                </div>
            </div>
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
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-title">
                    <h3>Tin tức nổi bật</h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="item-new big">
                    <a href="/tin-tuc/viet-nam-0-2-timoer-ho-chi-minh">
                        <img class="mb-2" src="/images/tintuc.jpg"/>
                        <h5>Việt Nam 2-0 Timor Leste (H2): Thanh Minh ghi bàn</h5>
                        <p>Tiền đạo Thanh Minh đánh đầu nâng tỷ số lên 2-0 trước Timor Leste, ở trận cuối vòng bảng bóng đá nam SEA Games trên sân Việt Trì.</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="item-new small">
                    <a href="/tin-tuc/viet-nam-0-2-timoer-ho-chi-minh">
                        <img class="mb-2" src="/images/tintuc.jpg"/>
                        <p>Việt Nam 2-0 Timor Leste (H2): Thanh Minh ghi bàn</p>
                    </a>
                </div>
                <div class="item-new small">
                    <a href="/tin-tuc/viet-nam-0-2-timoer-ho-chi-minh">
                        <img class="mb-2" src="/images/tintuc.jpg"/>
                        <p>Việt Nam 2-0 Timor Leste (H2): Thanh Minh ghi bàn</p>
                    </a>
                </div>
                <div class="item-new small">
                    <a href="/tin-tuc/viet-nam-0-2-timoer-ho-chi-minh">
                        <img class="mb-2" src="/images/tintuc.jpg"/>
                        <p>Việt Nam 2-0 Timor Leste (H2): Thanh Minh ghi bàn</p>
                    </a>
                </div>
                <div class="item-new small">
                    <a href="/tin-tuc/viet-nam-0-2-timoer-ho-chi-minh">
                        <img class="mb-2" src="/images/tintuc.jpg"/>
                        <p>Việt Nam 2-0 Timor Leste (H2): Thanh Minh ghi bàn</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
