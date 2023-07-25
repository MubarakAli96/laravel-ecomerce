@extends('admin.layouts.main')
@section('main')

<div class="page-wrapper">
  <div class="page-content">
    eeidt

    {{-- <div class="container">
      <div class="card" style="width: 100%">
        <div class="card-header">
          <div class="row">
            <div class="col-md-2 mb-3">
              @if($seller->avatar != NULL)
              <div id="imagePreview">
                <img src="{{ asset('storage/'. $seller->avatar) }}" alt="plus-circle" width="100px" height="100px">
  </div>
  @else
  <img class="avatar shadow" src="{{ asset('dashboard/images/avatar/avatar.jfif') }}" alt="">
</div>
@endif
</div>

<div class="col-md-8 mb-3" style="margin-top: 1rem !important">
  <div class="col-md-6 mb-3">
    <h6 class="card-subtitle">Name</h6>
    <h2 class=" card-text">{{ $vendor->name }}</h2>
  </div>
</div>
<div class="col-md-2 mb-3" style="margin-top: 1rem !important">
  <div class="col-md-6 mb-3">
    <a href="{{ route('admin.seller.edit', $vendor->id) }}" class="btn btn-primary btn-sm mt-2"><i
        class="fa fa-edit"></i> Edit</a>
  </div>
</div>
</div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <div class="row">

    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">Phone</h6>
      <p class=" card-text">{{ $vendor->phone_no }} {{ $seller->phone }}</p>
    </div>
    @if($seller->user_id != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">Email</h6>
      <p class=" card-text">{{ $vendor->email }}</p>
    </div>
    @endif
    @if($seller->address != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">Address</h6>
      <p class=" card-text">{{ $seller->address }}</p>
    </div>
    @endif

    @if($seller->company_name != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">License number</h6>
      <p class=" card-text">{{ $seller->company_name }}</p>
    </div>
    @endif

    @if($seller->company_logo != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">VIN number</h6>
      <p class=" card-text">{{ $seller->company_logo }}</p>
    </div>
    @endif

    @if($seller->city != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">City</h6>
      <p class=" card-text">{{ $seller->city }}</p>
    </div>
    @endif
    @if($seller->zip_code != null)
    <div class="col-md-6 mb-3">
      <h6 class="card-subtitle">Zip Code</h6>
      <p class=" card-text">{{ $seller->zip_code }}</p>
    </div>
    @endif

    @if($seller->description != null)
    <div class="col-md-10 mb-3">
      <h6 class="card-subtitle">Description</h6>
      <p class=" card-text">{!! $seller->description !!}</p>
    </div>
    @endif

  </div>
</div>
</div> --}}
</div>


@endsection