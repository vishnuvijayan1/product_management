@extends('layouts.app')

@section('content')
<style>
    .thead-light {
        display: table-header-group;
        vertical-align: middle !important;
        border-color: inherit !important;
        background-color: rgb(172, 172, 172) !important;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
                <div class="h4">Manage Product <span style="float: right;"><a href="{{ route('products.create') }}" style="text-align: right" class="btn btn-primary btn-sm"> Add Product </a></span></div>
                <table class="table mt-4">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price (Per Item)</th>
                        <th width="20%" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                        <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $product->product_name }}</td>
                          <td>{{ $product->quantity }}</td>
                          <td>{{ $product->price }}</td>
                          <td><a class="btn btn-primary btn-sm" href="{{ route('products.generate-invoice',['product_id' => $product->id])}}">Generate Invoice</a> <a class="btn btn-danger btn-sm delete-product"  href="{{ route('products.delete',['product_id' => $product->id])}}">Delete</a> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">There is no product to show</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
