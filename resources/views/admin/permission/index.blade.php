@extends('admin.layouts.main') @section('main')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">Permissions Summary</h5>
          </div>
          <div class="font-22 ms-auto"><i class="bx bx-dots-squares-rounded"><a
                href="{{ route('add.permission')}}">Add-Permissions</a></i>
          </div>
        </div>
        <hr>
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>S.No#</th>
                <th>Permision Name</th>
                <th>Group Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($permissions as $key => $permission)
              <tr>
                <td>{{$key +1}}</td>
                <td>
                  <div class="d-flex align-items-center">
                    {{-- <div class="recent-product-img">
                      <img src="{{$permission->image}}" alt="">
                  </div> --}}
                  <div class="ms-2">
                    <h6 class="mb-1 font-14">{{ $permission->name}}</h6>
                  </div>
        </div>
        </td>
        <td>{{ $permission->group_name}}</td>
        <td>{{ $permission->status}}</td>



        <td>
          <div class="d-flex order-actions"> <a href="{{route('edit.permission', $permission->id )}}" class=""><i
                class="bx bx-cog"></i></a>
            <form method="POST" action="{{ route('permission.destory', $permission->id)}}">
              @csrf
              <input name="_method" type="hidden" value="DELETE" />
              <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                title="Delete">
                Delete
              </button>
            </form>
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