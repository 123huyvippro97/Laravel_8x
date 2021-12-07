@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="card card-primary">
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Tên danh mục</label>
                    <input type="text" class="form-control" id="menu" value="{{ $menu->name }}" name="name" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="parent_id" id="" class="form-control">
                        <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}> Danh mục cha </option>
                        @foreach($menus as $menuParent)
                            <option value="{{ $menuParent->id }}" {{ $menuParent->id == $menu->parent_id ? 'selected' :'' }}> {{$menuParent->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả</label>
                    <textarea name="description" class="form-control"> {{ $menu->description }} </textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" name="active" value="1" {{ $menu->active == 1 ? 'checked' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="noneActive" name="active" value="0" {{ $menu->active == 0 ? 'checked' : '' }}>
                        <label for="noneActive" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhập Danh Mục</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
