@extends('admin.layouts.main')
@section('main')

<div class="page-wrapper">
  <div class="page-content">



    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Data</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Users Table</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Users</h6>
    <hr />
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>S.No#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $key=> $user)
              <tr>
                <td>{{$key+1}}</td>
                <td>@if($user->profile_image == NULL)
                  <a href="vendor-details-1.html">

                    <img class="rounded-circle p-1 bg-primary" src="{{ url('upload/noimage/no_image.jpg')}}" alt=""
                      style="width:80px; height:80px " />
                  </a>
                  @else
                  <a href="vendor-details-1.html">

                    <img class="rounded-circle p-1 bg-primary" src="{{asset($user->profile_image)}}" alt=""
                      style=" width:80px; height:80px " />
                  </a>
                  @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->status == 1)
                  Active
                  @else
                  Inactive
                  @endif
                </td>
                <td>{{$user->created_at}}</td>

                <td>
                  <a href="{{ route('admin.vendor.details', $user->id) }}" class=""><i class="bx bx-cog">Edit</i></a>
                  <a href="javascript:;" class=""><i class="bx bx-search-alt me-0">View</i></a>
                  <a href="javascript:;" class=""><i class="bx bx-trash-alt">Delete</i></a>
                </td>

              </tr>
              @endforeach


            </tbody>
            <tfoot>
              <tr>
                <th>S.No#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Start date</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>








  </div>
</div>

@endsection