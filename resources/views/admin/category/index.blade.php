@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title mr-3 mb-0">Danh sách danh mục</h3>
                <a href="{{ route('admin.category.add') }}" class="btn btn-sm btn-default font-weight-bold"> + Thêm mới</a>
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
                      <th class="text-center">Menu top</th>
                      <th class="text-center">Trang chủ</th>
                      <th class="text-center">Trạng thái</th>
                      <th width="10%">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($category as $index => $item)
                        <tr>
                            <td class="align-middle">{{ $index + 1 }}</td>
                            <td>
                                {{ $item->name }}
                                @if(!empty($item->slug))
                                    <p>
                                        <a target="_blank" href="{{ $item->slug_link }}">{{ $item->slug_link }}</a>
                                    </p>
                                @endif
                            </td>
                            <td class="align-middle">
                                @switch($item->type)
                                    @case(0)
                                        {{ 'Bài viết' }}
                                        @break
                                    @case(1)
                                        {{ 'Sản phẩm' }}
                                        @break
                                    @case(2)
                                        {{ 'Nội dung' }}
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td class="align-middle">
                                @php
                                    if($item->parent_id > 0) {
                                        $parent = App\Category::find($item->parent_id);
                                        if($parent){
                                            echo $parent->name;
                                        }
                                    }
                                @endphp
                            </td>
                            <td align="center" class="align-middle">
                                <input {{ $item->menu_top ? 'checked':'' }} type="checkbox"/>
                            </td>
                            <td align="center" class="align-middle">
                                <input {{ $item->show_home ? 'checked':'' }} type="checkbox"/>
                            </td>
                            <td align="center" class="align-middle">
                                <input {{ $item->status ? 'checked':'' }} type="checkbox"/>
                            </td>
                            <td class="align-middle">
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
