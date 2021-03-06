@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title mr-3 mb-0">Danh sách bài viết</h3>
                <a href="{{ route('admin.post.add') }}" class="btn btn-sm btn-default font-weight-bold"> + Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên bài viết</th>
                      <th>Loại</th>
                      <th>Mô tả</th>
                      <th>Hình ảnh</th>
                      <th>Trạng thái</th>
                      <th width="10%">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($post as $index => $item)
                        <tr>
                            <td class="align-middle">{{ $index + 1 }}</td>
                            <td class="align-middle">
                                {{ $item->name }}
                                @if(!empty($item->slug))
                                    <p>
                                        <a target="_blank" href="{{ $item->slug_link }}">{{ $item->slug_link }}</a>
                                    </p>
                                @endif
                            </td>
                            <td class="align-middle">
                                @php
                                    if($item->category_id > 0) {
                                        $parent = App\Category::find($item->category_id);
                                        if($parent){
                                            echo $parent->name;
                                        }
                                    }
                                @endphp
                            </td>
                            <td class="align-middle">{{ $item->desc }}</td>
                            <td class="align-middle">
                                <img width="55" src="{{ $item->image }}"/>
                            </td>
                            <td class="align-middle">
                                <input {{ $item->status ? 'checked':'' }} type="checkbox"/>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.post.edit',$item->id) }}" class="btn btn-sm btn-success">Sửa</a>
                                <a onclick="return confirm('Bạn có muốn xóa mục này ?')" href="{{ route('admin.post.delete',$item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
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
