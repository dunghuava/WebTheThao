@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm / Sửa bài viết</h3>
              </div>
              <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên bài viết</label>
                        <input value="{{ $item->name ?? '' }}" name="name" type="text" class="form-control">
                        @if(isset($item))
                            <input name="id" type="hidden" value="{{ $item->id }}"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input value="{{ $item->slug_link ?? '' }}" name="slug" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Loại bài viết</label>
                        <select name="type" class="form-control">
                            <option value="0">Bài viết</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả bài viết</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết bài viết</label>
                        <textarea rows="10" class="form-control editor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
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
