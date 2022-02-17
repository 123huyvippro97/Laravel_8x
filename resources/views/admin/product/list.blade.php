@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá Gốc</th>
                <th>Giá KM</th>
                <th>Active</th>
                <th>Ngày cập nhập</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td style='width: 50px'>{{ $product->id  }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->menu }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_sale }}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class='btn btn-primary' href='/admin/products/edit/{{ $product->id  }}'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger' href='javascript:void(0)'
                    onclick="removeRow({{ $product->id  }}, '/admin/products/destroy')"
                    ><i class='fas fa-trash'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}
@endsection
