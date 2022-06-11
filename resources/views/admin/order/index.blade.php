@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title mr-3 mb-0">Danh sách đặt hàng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Họ và tên</th>
                      <th>Địa chỉ</th>
                      <th>Email / Số ĐT</th>
                      <th class="text-center">Thanh toán</th>
                      <th class="text-center">Trạng thái</th>
                      <th width="10%">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders as $index => $item)
                        <tr>
                            <td class="align-middle">{{ $index + 1 }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td class="align-middle">{{ $item->address }}</td>
                            <td class="align-middle">
                                {{ $item->email .'/' }}
                            </td>
                            <td class="align-middle" align="center">
                                {{ $item->cast ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                            </td>
                            <td align="center" class="align-middle">
                                <select style="width:200px" class="form-control">
                                    <option {{ $item->status == 0 ? 'selected':'' }} value="0">Đang chờ</option>
                                    <option {{ $item->status == 1 ? 'selected':'' }} value="1">Đang xử lý</option>
                                    <option {{ $item->status == 2 ? 'selected':'' }} value="2">Đang giao</option>
                                    <option {{ $item->status == 3 ? 'selected':'' }} value="3">Giao thành công</option>
                                    <option {{ $item->status == 4 ? 'selected':'' }} value="3">Đã hủy</option>
                                </select>
                            </td>
                            <td class="align-middle">
                                <a data-toggle="collapse" href="#collapse_{{ $index }}" role="button" aria-expanded="false" aria-controls="collapse_{{ $index }}" class="btn btn-sm btn-success">Xem</a>
                                <a href="{{ route('admin.category.delete') }}" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <tr class="collapse" id="collapse_{{ $index }}">
                            <td colspan="7">
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $order_item = App\OrderItem::where('order_id',$item->id)->get();
                                            @endphp
                                            @foreach ($order_item as $k => $pr)
                                                <tr>
                                                    <td>{{ $k +1 }}</td>
                                                    <td>{{ $pr->name }}</td>
                                                    <td>{{ number_format($pr->price) }}đ</td>
                                                    <td>{{ $pr->quanity }}</td>
                                                    <td>{{ number_format($pr->amount) }}đ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
    </div>
@endsection
