@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm / Sửa sản phẩm</h3>
              </div>
              <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
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
                        <label>Loại sản phẩm</label>
                        <select required name="category_id" class="form-control">
                            <option value="">Chọn loại sản phẩm</option>
                            <?=$options?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label><br/>
                        <input name="image" type="file" class="form-control-x mb-2"><br/>
                        @if(isset($item) && !empty($item->image))
                            <img width="100" src="{{ $item->image }}"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="desc" class="form-control">{{ $item->desc ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết sản phẩm</label>
                        <textarea name="content" rows="10" class="form-control editor">{{ $item->content ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input value="{{ number_format($item->price ?? 0) }}" name="price" type="text" style="width: auto;" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option {{ ($item->status ?? 0) == 1 ? 'selected' : '' }} value="1">Kích hoạt</option>
                            <option {{ ($item->status ?? 0) == 0 ? 'selected' : '' }} value="0">Không kích hoạt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sắp xếp</label>
                        <input value="{{ $item->order_index ?? 0 }}" name="order_index" type="number" style="width: auto;" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.product.list') }}" class="btn btn-danger">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
              </form>
            </div>
            </div>
        </div>
    </div>
@endsection
