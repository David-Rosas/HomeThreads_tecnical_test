@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row mb-4 justify-content-end">
        <div class="col-md-6">
            <h1>Product List</h1>
        </div>
        <div class="col-md-6 ">
            <a href="{{ route('upload.excel') }}" style="float: right" class="btn btn-primary">Upload File</a>
        </div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>UPC</th>
                <th>SKU</th>
                <th>Qty</th>
                <th>Color</th>
                <th>Price</th>
                <th>Width</th>
                <th>Height</th>
                <th>Length</th>
                <th>Weight</th>
                <th>Country</th>
                <th>Image</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->upc }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->width }}</td>
                    <td>{{ $product->height }}</td>
                    <td>{{ $product->length }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->country }}</td>
                    <td>
                        @foreach ($product->images as $image)
                        <a href="{{ asset('storage/product_images/' . $image->filename) }}" target="_blank">
                            <img src="{{ asset('storage/product_images/' . $image->filename) }}" alt="Image" width="100">
                        </a>
                        @endforeach
                    </td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
