@extends('admin.layouts.main') @section('main')
<div class="page-wrapper">
<div class="page-content">
<div class="card radius-10">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<h5 class="mb-0">Slider Summary</h5>
</div>
<div class="font-22 ms-auto"><i class="bx bx-dots-squares-rounded"><a href="{{ route('sliderAll')}}">Add-NewSlider</a></i>
</div>
</div>
<hr>
<div class="table-responsive">
<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
  <th>Slider-id</th>
  <th>Heading</th>
  <th>Paraghraph</th>
   <th>Date</th>
  {{-- <th>Price</th> --}}
  <th>Status</th>
  <th>Action</th> 
</tr>
</thead>
<tbody>
  @foreach($sliders as $key => $slider)
<tr>
  <td>{{$key +1}}</td>
  <td>
    <div class="d-flex align-items-center">
      <div class="recent-product-img">
        <img src="{{$slider->silder_banner}}" alt="">
      </div>
      <div class="ms-2">
        <h6 class="mb-1 font-14">{{ $slider->heading}}</h6>
      </div>
    </div>
  </td>
  <td>{{ $slider->paragraph}}</td>
  <td>{{ $slider->created_at->format('m/d/Y')}}</td>
  {{-- <td>$64.00</td> --}}
  <td>
    <div class="badge rounded-pill bg-light-info text-info w-100">{{ $slider->status}}</div>
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
