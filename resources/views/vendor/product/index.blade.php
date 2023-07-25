@extends('vendor.layouts.vendor')
@section('vendor')
<div class="page-wrapper">
<div class="page-content">
<div class="card radius-10">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<h5 class="mb-0">Product Summary</h5>
</div>
<div class="font-22 ms-auto"><i class="bx bx-dots-squares-rounded"><a href="{{ route('vendor_product.add')}}">Add-Product</a></i>
</div>
</div>
<hr>
<div class="table-responsive">
<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
  <th>S.no</th>
  <th>ProductName</th>
  <th>Price</th>
  <th>QTY</th>
   <th>ProductCode</th>
  {{-- <th>Price</th> --}}
  <th>Status</th>
  <th>Action</th> 
</tr>
</thead>
<tbody>
  @foreach($products as $key => $product)
<tr>
  <td>{{$key +1}}</td>
  <td>
    <div class="d-flex align-items-center">
      <div class="recent-product-img">
        <img src=" {{ $product->product_thumbnail }}" alt="">
       
        </div>
      <div class="ms-2">
        <h6 class="mb-1 font-14">{{ $product->name}}</h6>
      </div>
    </div>
  </td>
  <td>{{ $product->selling_price}}</td>
  <td>{{ $product->product_qty}}</td>
  
  <td>
    <div class="badge rounded-pill bg-light-info text-info w-100">{{ $product->product_code}}</div>
  </td>
  <td>{{$product->status}}</td>
  <td>
    <div class="d-flex order-actions">	<a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
      <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
    </div>
  </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

@endsection
