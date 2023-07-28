@extends('vendor.layouts.vendor')
@section('vendor')
<script src="https://ajax.googleapies.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Products</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr />
        <form id="myForm" method="post" action="{{ route('vendorproduct.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-body mt-4">
            <div class="row">
              <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Title</label>
                    <input type="text" name="name" class="form-control" id="inputProductTitle"
                      placeholder="Enter product title">
                  </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product tags</label>
                    <input type="text" name="product_tags" class="form-control" data-role="tagsinput" value="">
                  </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product color</label>
                    <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="">
                  </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product size</label>
                    <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="">
                  </div>
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="inputProductDescription" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">ShortDescription</label>
                    <textarea class="form-control" name="short_decription" id="inputProductDescription"
                      rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="product_thumbnail" class="form-label">Product thumbnail</label>
                    <input class="form-control" type="file" id="formFile" name="product_thumbnail"
                      onchange="mainThamUrl($this)" />
                    <img src="" id="mainThmb" alt="">
                  </div>
                  <div class="mb-3">
                    <label for="product_thumbnail" class="form-label">Product MultiImages</label>
                    <input class="form-control" type="file" id="formFile" name="multi_image[]" multiple="" />
                  </div>
                  {{-- <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Product Images</label>
                    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                  </div> --}}
                </div>
              </div>
              <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputPrice" class="form-label">Product Price</label>
                      <input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCompareatprice" class="form-label">Discount Price</label>
                      <input type="text" name="discount_price" class="form-control" id="inputCompareatprice"
                        placeholder="00.00">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCostPerPrice" class="form-label">Product Code</label>
                      <input type="text" name="product_code" class="form-control" id="inputCostPerPrice"
                        placeholder="00.00" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="inputStarPoints" class="form-label">Product QTY</label>
                      <input type="text" name="product_qty" class="form-control" id="inputStarPoints"
                        placeholder="00.00">
                    </div>
                    <div class="col-12">
                      <label for="inputProductType" class="form-label">Product Brand</label>
                      <select name="brand_id" class="form-select" id="inputProductType">
                        <option></option>
                        @foreach( $brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                      <label for="inputVendor" class="form-label">Product Category</label>
                      <select name="category_id" class="form-select" id="inputVendor">
                        <option></option>
                        @foreach( $categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="col-12">
                      <label for="inputCollection" class="form-label">Product SubCategory</label>
                      <select name="sub_category_id" class="form-select" id="sub_category_id">
                        <option></option>


                      </select>
                    </div>
                    {{-- <div class="col-12">
                        <label for="inputCollection" class="form-label">Product vendor</label>
                        <select name="vendor_id" class="form-select" id="inputCollection">
                            <option></option>
                            @foreach( $vendorActive as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                    @endforeach

                    </select>
                  </div> --}}
                  <div class="row g-3">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hot_deals" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Hot deals</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="features" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Features</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="special_offers" value=""
                          id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Special Offers</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="special_deals" value=""
                          id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" />
                        <label class="custom-control-label" for="customSwitch1">Want to published?</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end row-->
      </div>
      </form>
    </div>
  </div>

</div>
</div>

@push('script')
<script>

</script>

@endpush

@endsection