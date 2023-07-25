@extends('admin.layouts.main') @section('main')
<div class="page-wrapper">
<div class="page-content">
<div class="card radius-10">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<h5 class="mb-0">Brands Summary</h5>
</div>
<div class="font-22 ms-auto"><i class="bx bx-dots-squares-rounded"><a href="{{ route('brand.add')}}">Add-brands</a></i>
</div>
</div>
<hr>
<div class="table-responsive">
<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
  <th>Brands id</th>
  <th>Brands</th>
  <th>Slug</th>
   <th>Date</th>
  {{-- <th>Price</th> --}}
  <th>Status</th>
  <th>Action</th> 
</tr>
</thead>
<tbody>
  @foreach($brands as $key => $brand)
<tr>
  <td>{{$key +1}}</td>
  <td>
    <div class="d-flex align-items-center">
      <div class="recent-product-img">
        <img src="{{$brand->image}}" alt="">
      </div>
      <div class="ms-2">
        <h6 class="mb-1 font-14">{{ $brand->name}}</h6>
      </div>
    </div>
  </td>
  <td>{{ $brand->slug}}</td>
  <td>{{ $brand->created_at->format('m/d/Y')}}</td>
  {{-- <td>$64.00</td> --}}
  <td>
    <div class="badge rounded-pill bg-light-info text-info w-100">{{ $brand->status}}</div>
  </td>
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
