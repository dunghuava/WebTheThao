@php
    $navigation = App\Category::where([
        'menu_top'=>1,
        'status'=>1,
        'parent_id'=>0
    ])->orderBy('order_index','asc')->get();
@endphp

<nav class="top-nav pt-4 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="/">
                    <img height="80px" src="/images/logo.png"/>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row top-search">
                    <div class="col-lg-8">
                        <form class="form-group form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm....">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 text-right">
                        @php
                            $cart = new App\Http\Controllers\Cart;
                        @endphp
                        <a href="/gio-hang" class="btn btn-danger">Giỏ hàng ({{ $cart->count() }})</a>
                    </div>
                </div>
                <ul class="menu-top mb-0">
                    <li>
                        <a href="/">Trang chủ</a>
                    </li>
                    @foreach ($navigation as $nav)
                        <li>
                            <a href="{{ $nav->slug_link }}">{{ $nav->name }}</a>
                            @php
                                $subs = App\Category::where('parent_id',$nav->id)->get();
                            @endphp
                            <ul class="sub-menu">
                                @foreach ($subs as $sub)
                                    <li>
                                        <a href="{{ $sub->slug_link }}">{{ $sub->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
@php
    $banner = App\Banner::where([
        'status'=> 1
    ])->get();
@endphp
<section id="carousel" class="carousel slide mb-2" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        @foreach ($banner as $i => $bn)
            <li data-target="#carousel_{{ $bn->id }}" data-slide-to="0" class="{{ $i == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
        @foreach ($banner as $i => $bn)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <a target="_blank" title="{{ $bn->image }}" href="{{ $bn->link ?? '#' }}">
                        <img src="{{ $bn->image }}" width="100%" height="500">
                    </a>
                </div>
        @endforeach
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</section>
