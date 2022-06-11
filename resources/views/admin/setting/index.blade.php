@extends('admin.layout')
@section('title','page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Cấu hình website</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên website</label>
                            <input required value="{{ $item->title ?? '' }}" name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Logo</label><br>
                            <input name="logo" type="file"><br/>
                            @if(isset($item) && !empty($item->logo))
                                <img class="mt-2" width="100" src="{{ $item->logo }}"/>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Thông tin footer</label>
                            <textarea name="footer" type="text" class="form-control editor">
                                @php
                                    echo $item->footer ?? ''
                                @endphp
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Copyright</label>
                            <input value="{{ $item->copyright ?? '' }}" name="copyright" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.index') }}" class="btn btn-danger">Hủy bỏ</a>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
