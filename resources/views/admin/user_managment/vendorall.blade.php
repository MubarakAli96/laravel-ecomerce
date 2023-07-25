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
            <li class="breadcrumb-item active" aria-current="page">Vendors Table</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Vendors</h6>
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
              @foreach($vendors as $key=> $vendor)
              <tr>
                <td>{{$key+1}}</td>
                <td> @if($vendor->profile_image == NULL)
                  <a href="vendor-details-1.html">

                    <img class="rounded-circle p-1 bg-primary" src="{{ url('upload/noimage/no_image.jpg')}}" alt=""
                      style="width:80px; height:80px " />
                  </a>
                  @else
                  <a href="vendor-details-1.html">

                    <img class="rounded-circle p-1 bg-primary" src="{{asset($vendor->profile_image)}}" alt=""
                      style=" width:80px; height:80px " />
                  </a>
                  @endif
                </td>
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->email}}</td>
                <td id="changeSelect{{ $vendor->id }}">
                  <select name="status_change" id="status_change{{ $vendor->id }}" onchange="status({{ $vendor->id }})">
                    <option value="1" @if ($vendor->status == 1) selected @endif
                      class="">{{ __('Active') }}</option>
                    <option value="0" @if ($vendor->status == 0) selected @endif
                      class="">{{ __('Deactive') }}</option>
                  </select>
                </td>
                <td>{{$vendor->created_at}}</td>

                <td>
                  <a href="{{ route('admin.vendor.details', $vendor->id) }}" class=""><i class="bx bx-cog">Edit</i></a>
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
@section('bottom_script')

<script>
  function status(value) {
            var id = $('#status_change' + value).val();
            var url = '{{ route('all.venders.status', ['', '']) }}';
            url = url + '/' + value + '/' + id;
            console.log(url);
            $.ajax({
                type: 'GET',
                url: url,
            }).done(function(data) {
                console.log(data);
                successModal(data.data);
                // var id = $('#changeSelect' + value).html('');
                // html = '';
                // var id = $('#changeSelect' + value).html(html);
            });

        }
</script>

@endsection