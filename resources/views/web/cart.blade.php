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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="col-lg-4">
            <form>
                <div class="form-group">
                  <label for="formGroupExampleInput">Họ tên</label>
                  <input required type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Địa chỉ</label>
                  <input required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Số ĐT</label>
                    <input required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Ghi chú</label>
                    <input type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Đặt hàng</button>
              </form>
        </div>
    </div>
</section>
@endsection
