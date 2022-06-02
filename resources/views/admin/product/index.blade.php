@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title mr-3 mb-0">Danh sách sản phẩm</h3>
                <a href="{{ route('admin.product.add') }}" class="btn btn-sm btn-default font-weight-bold"> + Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên danh mục</th>
                      <th>Loại</th>
                      <th>Thuộc danh mục</th>
                      <th>Menu top</th>
                      <th width="10%">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($product as $index => $item)
                        <tr>
                            <td>1.</td>
                            <td>
                                {{ $item->name }}
                                @if(!empty($item->slug))
                                    <p>
                                        <a target="_blank" href="{{ $item->slug_link }}">{{ $item->slug_link }}</a>
                                    </p>
                                @endif
                            </td>
                            <td>{{ $item->type_label }}</td>
                            <td>{{ $item->parent_label }}</td>
                            <td>{{ $item->menu_label }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit',$item->id) }}" class="btn btn-sm btn-success">Sửa</a>
                                <a href="{{ route('admin.category.delete') }}" class="btn btn-sm btn-danger">Xóa</a>
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
