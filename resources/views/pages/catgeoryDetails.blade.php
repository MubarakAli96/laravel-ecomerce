@extends('layout.main')
@section('main')


<main class="main">
  <div class="page-header mt-30 mb-50">
    <div class="container">
      <div class="archive-header">
        <div class="row align-items-center">
          <div class="col-xl-3">

            <h1 class="mb-15">{{ $breadcat->name }}</h1>
            <div class="breadcrumb">
              <a href="{{route('index.home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
              <span></span> {{ $breadcat->name }}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container mb-30">
    <div class="row flex-row-reverse">
      <div class="col-lg-4-5">
        <div class="shop-product-fillter">
          <div class="totall-product">
            <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
          </div>
          <div class="sort-by-product-area">
            <div class="sort-by-cover mr-10">
              <div class="sort-by-product-wrap">
                <div class="sort-by">
                  <span><i class="fi-rs-apps"></i>Show:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                  <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                </div>
              </div>
              <div class="sort-by-dropdown">
                <ul>
                  <li><a class="active" href="#">50</a></li>
                  <li><a href="#">100</a></li>
                  <li><a href="#">150</a></li>
                  <li><a href="#">200</a></li>
                  <li><a href="#">All</a></li>
                </ul>
              </div>
            </div>
            <div class="sort-by-cover">
              <div class="sort-by-product-wrap">
                <div class="sort-by">
                  <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                  <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                </div>
              </div>
              <div class="sort-by-dropdown">
                <ul>
                  <li><a class="active" href="#">Featured</a></li>
                  <li><a href="#">Price: Low to High</a></li>
                  <li><a href="#">Price: High to Low</a></li>
                  <li><a href="#">Release Date</a></li>
                  <li><a href="#">Avg. Rating</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row product-grid">

          @foreach($products as $product)
          <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
            <div class="product-cart-wrap mb-30">
              <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                  <a href="{{url('product/details/'. $product->id . '/' . $product->slug)}}">
                    <img class="default-img" src="{{asset($product->product_thumbnail)}}" alt="" />

                  </a>
                </div>
                <div class="product-action-1">
                  <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                      class="fi-rs-heart"></i></a>
                  <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                  <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                </div>
                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp
                <div class="product-badges product-badges-position product-badges-mrg">
                  @if( $product->discount_price == NULL)
                  <span class="hot">New</span>
                  @else
                  <span class="hot">{{round($discount)}}</span>
                  @endif

                </div>
              </div>
              <div class="product-content-wrap">
                <div class="product-category">
                  <a href="shop-grid-right.html">{{$product->category->name}}</a>
                </div>
                <h2><a href="{{url('product/details/'. $product->id . '/' . $product->slug)}}">{{$product->name}}</a>
                </h2>
                <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                <div>
                  @if($product->vendor_id == NULL)
                  <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                  @else
                  <span class="font-small text-muted">By <a
                      href="vendor-details-1.html">{{ $product->vendor->name }}</a></span>
                  @endif
                </div>

                <div class="product-card-bottom">
                  @if($product->discount_price== NULL)
                  <div class="product-price">
                    <span>${{$product->selling_price}}</span>

                  </div>
                  @else
                  <div class="product-price">
                    <span>${{$product->discount_price}}</span>
                    <span class="old-price">${{$product->selling_price}}</span>
                  </div>
                  @endif

                  <div class="add-cart">
                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!--product grid-->
        <div class="pagination-area mt-20 mb-20">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
              <li class="page-item">
                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link dot" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>

        <!--End Deals-->


      </div>
      <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
        <div class="sidebar-widget widget-category-2 mb-30">
          <h5 class="section-title style-1 mb-30">Category</h5>
          <ul>
            @foreach($categories as $product)
            @php
            $products = \App\Models\Product::where('category_id', $product->id)->get();
            @endphp
            <li>
              <a href="shop-grid-right.html"> <img src="{{asset($product->image)}}" alt="" />{{$product->name}}</a><span
                class="count">{{count($products)}}</span>
            </li>
            @endforeach

          </ul>
        </div>
        <!-- Fillter By Price -->
        {{-- <div class="sidebar-widget price_range range mb-30">
          <h5 class="section-title style-1 mb-30">Fill by price</h5>
          <div class="price-filter">
            <div class="price-filter-inner">
              <div id="slider_range" class="price-filter-range" data-min="20" data-max="20,0000"></div>
              <input hidden type="text" id="price_range" name="price_range" value="">
              <input type="text" id="amount" value="$20 - $20,0000" readonly>
              <br><br>
              <button class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button>
            </div>
          </div>
          <div class="list-group">

          </div>

        </div> --}}
        <!-- Product sidebar Widget -->

      </div>
    </div>
  </div>
</main>


@endsection