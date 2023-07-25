@extends('admin.layouts.main') @section('main')

<div class="page-wrapper">
  <div class="page-content">
    <div id="layoutSidenav_content">
      <div class="container-fluid">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-9">
                <h1>Roles In Permissions</h1>
              </div>
              <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                    <a href="">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item">
                    {{-- <a href="{{ route('category') }}">Categories</a> --}}
                  </li>
                  <li class="breadcrumb-item active">Add</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add Permission</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('role.permission.store')}}">
                @csrf
                <div class="row">

                  <div class="col-md-12 pr-1">
                    <div class="form-group">
                      <label>Roles Name</label>
                      <select name="role_id" class="form-select mb-3" aria-label="Default select example">
                        <option></option>
                        @foreach( $roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                    <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
                  </div>

                  <div class="col-md-12 m-2">
                    <hr>
                  </div>


                  @foreach($permision_groups as $group)
                  <div class="col-md-12 pr-1">
                    <div class="row">
                      <div class="col-md-3">

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">{{$group->group_name}}</label>
                        </div>

                      </div>

                      <div class="col-md-9">
                        @php
                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);

                        @endphp
                        @foreach($permissions as $permission)
                        <div class="form-check">
                          <input class="form-check-input" name="permission[]" type="checkbox"
                            value="{{$permission->id}}" id="flexCheckDefault{{$permission->id}}">
                          <label class="form-check-label"
                            for="flexCheckDefault{{$permission->id}}">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                      </div>

                    </div>
                  </div>
                  @endforeach
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" />
                      <label class="custom-control-label" for="customSwitch1">Want to published?</label>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-info btn-fill pull-right">
                    save
                  </button>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#flexCheckDefaultAll').click(function(){
console.log('hello');
  });
</script>
@endsection