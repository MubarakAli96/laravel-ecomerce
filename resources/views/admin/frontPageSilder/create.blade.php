@extends('admin.layouts.main') @section('main')

<div class="page-wrapper">
  <div class="page-content">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-9">
                            <h1>Create Slider</h1>
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
                        <h4 class="card-title">Add Slider</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label for="formFile" class="form-label"
                                            >Silder Banner</label
                                        >
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            name ="silder_banner"
                                        />
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label>Heading</label>
                                        <input type="text" name="heading" value="" class="form-control" placeholder="name here" />
                                    </div>
                                </div>
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label>Paragraph</label>
                                        <input type="text" name="paragraph" value="" class="form-control" placeholder="name here" />
                                    </div>
                                </div>

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
@endsection