@extends('backend.layouts.main')

@section('title', 'Danh sach san pham')

@section('content')
 <h1>Danh sach san pham</h1>

 @if (session('status'))

     <div class="alert alert-success">
         {{ session('status') }}
     </div>

 @endif
 <div style="padding: 20px">
     <a href="{{ url("/backend/product/create")}}" class="btn btn-info">Ten san pham</a>
 </div>

 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
     <thead>
     <tr>
         <th>Id san pham</th>
         <th>Anh dai dien</th>
         <th>Ten san pham</th>
         <th>Gia san pham</th>
         <th>Ton kho</th>
         <th>Hanh dong</th>
     </tr>
     </thead>
     <tfoot>
     <tr>
         <th>Id san pham</th>
         <th>Anh dai dien</th>
         <th>Ten san pham</th>
         <th>Gia san pham</th>
         <th>Ton kho</th>
         <th>Hanh dong</th>
     </tr>
     </tfoot>
     <tbody>
     @if(isset($products) && !empty($products))
         @foreach($products as $product)
             <tr>
                 <td>{{$product->id}}</td>
                 <td></td>
                 <td>{{$product->product_name}} </td>
                 <td>{{$product->product_price}}</td>
                 <td>{{$product->product_quantity}}</td>
                 <td>
                     <a href="{{url("/backend/product/edit/$product->id")}}" class="btn btn-warning">Sua san pham</a>
                     <a href="{{url("/backend/product/delete/$product->id")}}" class="btn btn-danger">Xoa san pham</a>
                 </td>
             </tr>
         @endforeach
     @else
            chua co ban ghi nao trong bang
     @endif
     </tbody>
 </table>
    {{$products->links()}}
@endsection