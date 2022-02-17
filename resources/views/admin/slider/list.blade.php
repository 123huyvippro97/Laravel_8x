@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Ngày cập nhập</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td style='width: 50px'>{{ $slider->id  }}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->url }}</td>
                <td>
                    <a href="{{ $slider->thumb }}" >
                        <img src="{{ $slider->thumb }}" alt="{{ $slider->thumb }}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    <a class='btn btn-primary' href='/admin/sliders/edit/{{ $slider->id  }}'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger' href='javascript:void(0)'
                    onclick="removeRow({{ $slider->id  }}, '/admin/sliders/destroy')"
                    ><i class='fas fa-trash'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
@endsection
