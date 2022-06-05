@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm / Sửa danh mục</h3>
              </div>
              <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input required value="{{ $item->name ?? '' }}" name="name" type="text" class="form-control">
                        @if(isset($item))
                            <input name="id" type="hidden" value="{{ $item->id }}"/>
                        @endif
                    </div>
                    @if(isset($item))
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <p>
                            <a target="_blank" href="{{ $item->slug_link }}">{{ $item->slug_link }}</a>
                        </p>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="desc" rows="10" class="form-control editor">{{ $item->desc ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Loại hiển thị</label>
                        <select name="type" class="form-control">
                            <option {{ ($item->type ?? 0) == 0 ? 'selected' : '' }} value="0">Bài viết</option>
                            <option {{ ($item->type ?? 0) == 1 ? 'selected' : '' }} value="1">Sản phẩm</option>
                            <option {{ ($item->type ?? 0) == 2 ? 'selected' : '' }} value="2">Nội dung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thuộc danh mục</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Đặt làm danh mục chính</option>
                            <?=$options?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option {{ ($item->status ?? 0) == 1 ? 'selected' : '' }} value="1">Kích hoạt</option>
                            <option {{ ($item->status ?? 0) == 0 ? 'selected' : '' }} value="0">Không kích hoạt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Đặt làm menu top</label>
                        <select name="menu_top" class="form-control">
                            <option {{ ($item->menu_top ?? 0) == 1 ? 'selected' : '' }} value="1">Có</option>
                            <option {{ ($item->menu_top ?? 0) == 0 ? 'selected' : '' }} value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hiển thị trang chủ</label>
                        <select name="show_home" class="form-control">
                            <option {{ ($item->show_home ?? 0) == 1 ? 'selected' : '' }} value="1">Có</option>
                            <option {{ ($item->show_home ?? 0) == 0 ? 'selected' : '' }} value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sắp xếp</label>
                        <input value="{{ $item->order_index ?? 0 }}" name="order_index" type="number" style="width: auto;" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.category.list') }}" class="btn btn-danger">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
              </form>
            </div>
            </div>
        </div>
    </div>
@endsection
