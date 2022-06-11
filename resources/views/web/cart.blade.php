@extends('layout')
@section('title','Giỏ hàng')
@section('content')
<section class="container pb-2">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $cart = new App\Http\Controllers\Cart;
                    @endphp
                    @foreach ($cart->get() as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price']) }}đ</td>
                            <td>
                                <input style="width:80px" type="number" value="{{ $item['quantity'] }}"/>
                            </td>
                            <td>{{ number_format($item['amount']) }}đ</td>
                            <td align="center">
                                <a href="" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="col-lg-4">
            <form method="POST" action="{{ route('cart.submit') }}">
                @csrf
                <div class="form-group">
                  <label for="formGroupExampleInput">Họ tên</label>
                  <input name="name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Địa chỉ</label>
                  <input name="address" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input name="email" required type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Số ĐT</label>
                    <input name="phone" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Ghi chú</label>
                    <textarea name="note" type="text" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Đặt hàng</button>
              </form>
        </div>
    </div>
</section>
@endsection
