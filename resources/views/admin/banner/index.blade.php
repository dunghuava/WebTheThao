@extends('admin.layout')
@section('title','page')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Tên banner</label>
                            @if($item)
                                <input type="hidden" name="id" value="{{ $item->id }}"/>
                            @endif
                            <input required value="{{ $item->name ?? '' }}" type="text" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label><br/>
                            <input type="file" name="image" class="form-control-x"/>
                        </div>
                        <div class="form-group">
                            <label>Liên kết URL</label>
                            <input value="{{ $item->link ?? '' }}" type="text" name="link" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label><br/>
                            <input type="checkbox" {{ ($item->status ?? 0) ? 'checked':'' }} name="status" value="1" class="form-control-x"/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Lưu banner</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    @if($item)
        <script>
            $('#exampleModal').modal('show');
        </script>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title mr-3 mb-0">Danh sách banner</h3>
                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-default font-weight-bold"> + Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên banner</th>
                      <th>Hình ảnh</th>
                      <th>Liên kết</th>
                      <th class="text-center">Trạng thái</th>
                      <th width="10%">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($banner as $index => $item)
                        <tr>
                            <td class="align-middle">{{ $index + 1 }}</td>
                            <td class="align-middle">
                                {{ $item->name }}
                            </td>
                            <td class="align-middle">
                                <img height="55" src="{{ $item->image }}"/>
                            </td>
                            <td class="align-middle">
                                <p>
                                    <a target="_blank" href="{{ $item->link }}">{{ $item->link }}</a>
                                </p>
                            </td>
                            <td align="center" class="align-middle">
                                <input {{ $item->status ? 'checked':'' }} type="checkbox"/>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.banner.index').'?edit='.$item->id }}" class="btn btn-sm btn-success">Sửa</a>
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
