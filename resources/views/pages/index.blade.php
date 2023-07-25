@extends('layout.main')
@section('main')

<main class="main">
  <section class="home-slider position-relative mb-30">
    <div class="container">
      <div class="home-slide-cover mt-30">
        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
          @foreach($sliders as $slider)
          <div class="single-hero-slider single-animation-wrap"
            style="background-image: url({{asset($slider->silder_banner)}})">
            <div class="slider-content">
              <h1 class="display-2 mb-40">
                {{ $slider->heading}}
              </h1>
              <p class="mb-65">{{ $slider->paragraph}}</p>
              <form class="form-subcriber d-flex">
                <input type="email" placeholder="Your emaill address" />
                <button class="btn" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
          @endforeach

        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
      </div>
    </div>
  </section>
  <!--End hero slider-->

  <section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
      <div class="section-title">
        <div class="title">
          <h3>Featured Categories</h3>

        </div>
        <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows">
        </div>
      </div>
      <div class="carausel-10-columns-cover position-relative">
        <div class="carausel-10-columns" id="carausel-10-columns">
          @foreach($categoriesFeature as $feature)
          <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
            <figure class="img-hover-scale overflow-hidden">
              <a href="{{ url('product/category/'.$feature->id .'/' .$feature->slug)}}"><img height="70px"
                  src="{{asset($feature->image)}}" alt="" /></a>
            </figure>
            <h6><a href="{{ url('product/category/'.$feature->id .'/' .$feature->slug)}}">{{$feature->name}}</a></h6>
            @php
            $products = App\Models\Product::where('category_id', $feature->id)->limit(9)->get();
            @endphp
            <span>{{ count($products)}}</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!--End category slider-->
  <section class="banners mb-25">
    <div class="container">
      <div class="row">
        @foreach($banners as $banner)
        <div class="col-lg-4 d-md-none d-lg-flex">
          <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
            <img src="{{asset($banner->banner_image)}}" alt="" />
            <div class="banner-text">
              <h4>The best Organic <br />{{$banner->heading}}</h4>
              <a href="shop-grid-right.html" class="btn btn-xs">{{$banner->paragraph}} <i
                  class="fi-rs-arrow-small-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--End banners-->

  <section class="product-tabs section-padding position-relative">
    <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <h3> New Products </h3>
        <ul class="nav nav-tabs links" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
              type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
          </li>
          @foreach($categoriesFeature as $category)
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $category->id }}" type="button"
              role="tab" aria-controls="tab-two" aria-selected="false">{{$category->name}}</a>
          </li>
          @endforeach

        </ul>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
          <div class="row product-grid-4">
            @php
            $products = App\Models\Product::where('status', 1)->limit(10)->get();
            @endphp
            @foreach($products as $key => $product)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
              <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                    <a href="{{url('product/details/'. $product->id . '/' . $product->slug)}}">
                      <img class="default-img" src="{{asset( $product->product_thumbnail)}}" alt="" />

                    </a>
                  </div>
                  <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                        class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                        class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                      data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                  </div>

                  @php
                  $amount = $product->selling_price - $product->discount_price;
                  $discount = ($amount/$product->selling_price) * 100;
                  @endphp

                  <div class="product-badges product-badges-position product-badges-mrg">
                    @if($product->discount_price == NULL)
                    <span class="hot">New</span>
                    @else
                    <span class="hot">{{ round($discount)}}</span>
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
                    <span class="font-small text-muted">By
                      <a href="vendor-details-1.html">Owner</a></span>
                    @else
                    <span class="font-small text-muted">By
                      <a href="vendor-details-1.html">{{$product->vendor->name}}</a></span>
                    @endif
                  </div>
                  <div class="product-card-bottom">
                    @if($product->discount_price == NULL)
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
            <!--end product card-->

            <!--end product card-->
          </div>
          <!--End product-grid-4-->
        </div>
        <!--En tab one-->
        @foreach($categoriesFeature as $category)
        <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two">
          <div class="row product-grid-4">


            @php
            $categorywise = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
            @endphp
            @forelse ($categorywise as $item)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
              <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                    <a href="{{url('product/details/'. $product->id . '/' . $product->slug)}}">
                      <img class="default-img" src="{{asset( $item->product_thumbnail)}}" alt="" />

                    </a>
                  </div>
                  <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                        class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                        class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                      data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                  </div>

                  <div class="product-badges product-badges-position product-badges-mrg">
                    <span class="hot">Hot</span>
                  </div>
                </div>
                <div class="product-content-wrap">
                  <div class="product-category">
                    <a href="shop-grid-right.html">{{$item->category->name}}</a>
                  </div>
                  <h2><a href="{{url('product/details/'. $product->id . '/' . $product->slug)}}">{{$item->name}}</a>
                  </h2>
                  <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                      <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                  </div>
                  <div>
                    @if($product->vendor_id == NULL)
                    <span class="font-small text-muted">By
                      <a href="vendor-details-1.html">Owner</a></span>
                    @else
                    <span class="font-small text-muted">By
                      {{-- <a href="vendor-details-1.html">{{$item->vendor->name}}</a></span> --}}
                    @endif
                  </div>
                  <div class="product-card-bottom">
                    <div class="product-price">
                      <span>$28.85</span>
                      <span class="old-price">$32.8</span>
                    </div>
                    <div class="add-cart">
                      <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty

            <h1> there is not product</h1>
            @endforelse
            <!--end product card-->
          </div>
          <!--End product-grid-4-->
        </div>
        @endforeach
        <!--En tab two-->

        <!--En tab seven-->
      </div>
      <!--End tab-content-->
    </div>
  </section>
  <!--Products Tabs-->

  <section class="section-padding pb-5">
    <div class="container">
      <div class="section-title wow animate__animated animate__fadeIn">
        <h3 class=""> Featured Products </h3>

      </div>
      <div class="row">
        <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
          <div class="banner-img style-2">
            <div class="banner-text">
              <h2 class="mb-100">Bring nature into your home</h2>
              <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
          <div class="tab-content" id="myTabContent-1">
            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
              <div class="carausel-4-columns-cover arrow-center position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                  @foreach($featurePro as $f_prod)
                  <div class="product-cart-wrap">
                    <div class="product-img-action-wrap">
                      <div class="product-img product-img-zoom">
                        <a href="{{url('product/details/'. $f_prod->id . '/' . $f_prod->slug)}}">
                          abc
                          <img class="default-img" src="{{ asset($f_prod->product_thumbnail)}}" alt="" />
                          {{-- <img class="hover-img" src="{{ asset('frontend/assets/imgs/shop/product-1-2.jpg')}}"
                          alt="" /> --}}
                        </a>
                      </div>
                      <div class="product-action-1">
                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                          data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i
                            class="fi-rs-heart"></i></a>
                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i
                            class="fi-rs-shuffle"></i></a>
                      </div>
                      @php
                      $amount = $f_prod->selling_price - $f_prod->discount_price;
                      $discount = ($amount/$f_prod->selling_price) * 100;
                      @endphp
                      <div class="product-badges product-badges-position product-badges-mrg">
                        @if($f_prod->discount_price == NULL)
                        <span class="hot">New</span>
                        @else
                        <span class="hot">Save {{round($discount)}}</span>
                        @endif

                      </div>
                    </div>
                    <div class="product-content-wrap">
                      <div class="product-category">
                        <a href="shop-grid-right.html">{{$f_prod->category->name}}</a>
                      </div>
                      <h2><a href="{{url('product/details/'. $f_prod->id . '/' . $f_prod->slug)}}">
                          {{$f_prod->name}}</a></h2>
                      <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 80%"></div>
                      </div>
                      @if($f_prod->discount_price == NULL)
                      <div class="product-price mt-10">
                        <span>${{$f_prod->selling_price}}</span>

                      </div>
                      @else
                      <div class="product-price mt-10">
                        <span>${{$f_prod->discount_price}} </span>
                        <span class="old-price">${{$f_prod->selling_price}}</span>
                      </div>
                      @endif

                      <div class="sold mt-15 mb-15">
                        <div class="progress mb-5">
                          <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                        <span class="font-xs text-heading"> Sold: 90/120</span>
                      </div>
                      <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To
                        Cart</a>
                    </div>
                  </div>
                  <!--End product Wrap-->
                  @endforeach

                  <!--End product Wrap-->
                </div>
              </div>
            </div>
            <!--End tab-pane-->
          </div>
          <!--End tab-content-->
        </div>
        <!--End Col-lg-9-->
      </div>
    </div>
  </section>
  <!--End Best Sales-->

  <!-- TV Category -->

  <section class="product-tabs section-padding position-relative">
    <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <h3>{{$skip_category_0->name}} Category </h3>

      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
          <div class="row product-grid-4">
            @foreach($skip_product_0 as $skipProduct)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
              <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".5s">
                <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                    <a href="{{url('product/details/'. $skipProduct->id . '/' . $skipProduct->slug)}}">
                      <img class="default-img" src="{{asset($skipProduct->product_thumbnail)}}" alt="" />
                      {{-- <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-5-2.jpg')}}" alt="" />
                      --}}
                    </a>
                  </div>
                  @php
                  $amount = $skipProduct->selling_price - $skipProduct->discount_price;
                  $discount = ($amount/$skipProduct->selling_price) * 100;
                  @endphp
                  <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                        class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                        class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                      data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                  </div>

                  <div class="product-badges product-badges-position product-badges-mrg">
                    @if($skipProduct->discount_price == NULL)
                    <span class="best">New</span>
                    @else
                    <span class="best">{{round($discount)}}%</span>
                    @endif

                  </div>
                </div>
                <div class="product-content-wrap">
                  <div class="product-category">
                    <a href="shop-grid-right.html">{{$skipProduct->category->name}}</a>
                  </div>
                  <h2><a
                      href="{{url('product/details/'. $skipProduct->id . '/' . $skipProduct->slug)}}">{{$skipProduct->name}}</a>
                  </h2>
                  <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                      <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                  </div>
                  <div>
                    <span class="font-small text-muted">By <a
                        href="vendor-details-1.html">{{ $product->vendor->name }}</a></span>
                  </div>
                  <div class="product-card-bottom">
                    @if($skipProduct->discount_price == NULL)
                    <div class="product-price">
                      <span>${{$skipProduct->selling_price }}</span>

                    </div>
                    @else
                    <div class="product-price">
                      <span>${{$skipProduct->discount_price }}</span>
                      <span class="old-price">${{$skipProduct->selling_price }}</span>
                    </div>
                    @endif

                    <div class="add-cart">
                      <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end product card-->
            @endforeach
          </div>
          <!--End product-grid-4-->
        </div>
      </div>
      <!--End tab-content-->
    </div>
  </section>
  <section class="product-tabs section-padding position-relative">
    <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <h3>{{$skip_category_2->name}} Category </h3>

      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
          <div class="row product-grid-4">
            @foreach($skip_product_2 as $skip_2_pro)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
              <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                    <a href="{{url('product/details/'. $skip_2_pro->id . '/' . $skip_2_pro->slug)}}">
                      <img class="default-img" src="{{asset($skip_2_pro->product_thumbnail)}}" alt="" />
                      {{-- <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-1-2.jpg')}}" alt="" />
                      --}}
                    </a>
                  </div>
                  <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                        class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                        class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                      data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                  </div>
                  @php
                  $amount = $skip_2_pro->selling_price - $skip_2_pro->discount_price;
                  $discount = ($amount/$skip_2_pro->selling_price) * 100;
                  @endphp
                  <div class="product-badges product-badges-position product-badges-mrg">
                    @if( $skip_2_pro->discount_price== NULL)
                    <span class="hot">New</span>
                    @else
                    <span class="hot">{{round($discount)}}</span>
                    @endif
                  </div>
                </div>
                <div class="product-content-wrap">
                  <div class="product-category">
                    <a href="shop-grid-right.html">{{$skip_2_pro->category->name}}</a>
                  </div>
                  <h2><a
                      href="{{url('product/details/'. $skip_2_pro->id . '/' . $skip_2_pro->slug)}}">{{$skip_2_pro->name}}
                    </a>
                  </h2>
                  <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                      <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                  </div>
                  <div>
                    <span class="font-small text-muted">By <a
                        href="vendor-details-1.html">{{$product->vendor->name}}</a></span>
                  </div>
                  <div class="product-card-bottom">
                    @if($skip_2_pro->discount_price == NULL)
                    <div class="product-price">
                      <span>${{$skip_2_pro->selling_price}}</span>
                    </div>
                    @else
                    <div class="product-price">
                      <span>${{$skip_2_pro->discount_price}}</span>
                      <span class="old-price">${{$skip_2_pro->selling_price}}</span>
                    </div @endif>
                    <div class="add-cart">
                      <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!--end product card-->
          </div>
          <!--End product-grid-4-->
        </div>


      </div>
      <!--End tab-content-->
    </div>


  </section>
  <section class="product-tabs section-padding position-relative">
    <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <h3>{{$skip_category_3->name}} Category </h3>

      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
          <div class="row product-grid-4">
            @foreach($skip_product_3 as $skip_p3)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
              <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <div class="product-img-action-wrap">
                  <div class="product-img product-img-zoom">
                    <a href="{{url('product/details/'. $skip_p3->id . '/' . $skip_p3->slug)}}">
                      <img class="default-img" src="{{asset($skip_p3->product_thumbnail)}}" alt="" />
                      {{-- <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-1-2.jpg')}}" alt="" />
                      --}}
                    </a>
                  </div>
                  <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                        class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                        class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                      data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                  </div>
                  @php
                  $amount = $skip_p3->selling_price - $skip_p3->discount_price;
                  $discount = ($amount/$skip_p3->selling_price) * 100;
                  @endphp
                  <div class="product-badges product-badges-position product-badges-mrg">
                    @if($skip_p3->discount_price==NULL)
                    <span class="hot">Hot</span>
                    @else
                    <span class="hot">{{round($discount)}}</span>
                    @endif

                  </div>
                </div>
                <div class="product-content-wrap">
                  <div class="product-category">
                    <a href="shop-grid-right.html">{{$skip_p3->category->name}}</a>
                  </div>
                  <h2><a href="{{url('product/details/'. $skip_p3->id . '/' . $skip_p3->slug)}}">{{$skip_p3->name}}</a>
                  </h2>
                  <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                      <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                  </div>
                  <div>
                    <span class="font-small text-muted">By <a
                        href="vendor-details-1.html">{{$product->vendor->name}}</a></span>
                  </div>
                  <div class="product-card-bottom">
                    @if($skip_p3->discount_price== NULL)
                    <div class="product-price">
                      <span>${{$skip_p3->selling_price}}</span>
                    </div>
                    @else
                    <div class="product-price">
                      <span>${{$skip_p3->discount_price}}</span>
                      <span class="old-price">${{$skip_p3->selling_price}}</span>
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
          <!--End product-grid-4-->
        </div>


      </div>
      <!--End tab-content-->
    </div>


  </section>
  <section class="section-padding mb-30">
    <div class="container">
      <div class="row">

        <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
          data-wow-delay="0">
          <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
          <div class="product-list-small animated animated">
            @foreach($hot_deal as $h_deals)
            <article class="row align-items-center hover-up">
              <figure class="col-md-4 mb-0">
                <a href="shop-product-right.html"><img src="{{asset($h_deals->product_thumbnail)}}" alt="" /></a>
              </figure>
              <div class="col-md-8 mb-0">
                <h6>
                  <a href="shop-product-right.html">{{$h_deals->name}}</a>
                </h6>
                <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                @php
                $amount = $h_deals->selling_price - $h_deals->discount_price;
                $discount = ($amount/$h_deals->selling_price) * 100;
                @endphp
                @if($h_deals->discount_price==NULL)
                <div class="product-price">
                  <span>${{$h_deals->selling_price}}</span>

                </div>
                @else
                <div class="product-price">
                  <span>${{$h_deals->discount_price}}</span>
                  <span class="old-price">${{$h_deals->selling_price}}</span>
                </div>
                @endif

              </div>
            </article>
            @endforeach
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
          <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
          <div class="product-list-small animated animated">
            @foreach($special_offer as $special)
            <article class="row align-items-center hover-up">
              <figure class="col-md-4 mb-0">
                <a href="shop-product-right.html"><img src="{{asset($special->product_thumbnail)}}" alt="" /></a>
              </figure>
              <div class="col-md-8 mb-0">
                <h6>
                  <a href="shop-product-right.html">{{$special->name}}</a>
                </h6>
                <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                @php
                $amount = $special->selling_price - $special->discount_price;
                $discount = ($amount/$special->selling_price) * 100;
                @endphp
                @if($special->discount_price==NULL)
                <div class="product-price">
                  <span>${{$special->selling_price}}</span>

                </div>
                @else
                <div class="product-price">
                  <span>${{$special->discount_price}}</span>
                  <span class="old-price">${{$special->selling_price}}</span>
                </div>
                @endif
              </div>
            </article>
            @endforeach
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
          data-wow-delay=".2s">
          <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
          <div class="product-list-small animated animated">
            @foreach($recently_added as $rec_add)
            <article class="row align-items-center hover-up">
              <figure class="col-md-4 mb-0">
                <a href="shop-product-right.html"><img src="{{asset( $rec_add->product_thumbnail)}}" alt="" /></a>
              </figure>
              <div class="col-md-8 mb-0">
                <h6>
                  <a href="shop-product-right.html">{{ $rec_add->name}}</a>
                </h6>
                <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                @php
                $amount = $rec_add->selling_price - $rec_add->discount_price;
                $discount = ($amount/$rec_add->selling_price) * 100;
                @endphp
                @if($rec_add->discount_price==NULL)
                <div class="product-price">
                  <span>${{$rec_add->selling_price}}</span>

                </div>
                @else
                <div class="product-price">
                  <span>${{$rec_add->discount_price}}</span>
                  <span class="old-price">${{$rec_add->selling_price}}</span>
                </div>
                @endif
              </div>
            </article>
            @endforeach
          </div>
        </div>

        <div
          class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
          data-wow-delay=".3s">
          <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
          <div class="product-list-small animated animated">
            @foreach($special_deals as $sp_deal)
            <article class="row align-items-center hover-up">
              <figure class="col-md-4 mb-0">
                <a href="shop-product-right.html"><img src="{{asset($sp_deal->product_thumbnail)}}" alt="" /></a>
              </figure>
              <div class="col-md-8 mb-0">
                <h6>
                  <a href="shop-product-right.html">{{$sp_deal->name}}</a>
                </h6>
                <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                @php
                $amount = $sp_deal->selling_price - $sp_deal->discount_price;
                $discount = ($amount/$sp_deal->selling_price) * 100;
                @endphp
                @if($sp_deal->discount_price==NULL)
                <div class="product-price">
                  <span>${{$sp_deal->selling_price}}</span>

                </div>
                @else
                <div class="product-price">
                  <span>${{$sp_deal->discount_price}}</span>
                  <span class="old-price">${{$sp_deal->selling_price}}</span>
                </div>
                @endif
              </div>
            </article>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--End 4 columns-->
  <div class="container">
    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
      <h3 class="">All Our Vendor List </h3>
      <a class="show-all" href="shop-grid-right.html">
        All Vendors
        <i class="fi-rs-angle-right"></i>
      </a>
    </div>

    @php
    $vendors = \App\Models\User::where('role', 'vendor')->orderBy('name', 'ASC')->limit(5)->get()
    @endphp
    <div class="row vendor-grid">
      @foreach($vendors as $vendor)
      <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
        <div class="vendor-wrap mb-40">
          <div class="vendor-img-action-wrap">
            <div class="vendor-img">
              @if($vendor->profile_image == NULL)
              <a href="vendor-details-1.html">

                <img class="default-img" src="{{ url('upload/noimage/no_image.jpg')}}" alt=""
                  style=" width:100pc; height:100px" />
              </a>
              @else
              <a href="vendor-details-1.html">

                <img class="default-img" src="{{asset($vendor->profile_image)}}" alt=""
                  style=" width:100pc; height:100px" />
              </a>
              @endif
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
              <span class="hot">Mall</span>
            </div>
          </div>
          <div class="vendor-content-wrap">
            <div class="d-flex justify-content-between align-items-end mb-30">
              <div>
                <div class="product-category">
                  <span class="text-muted"> Since:{{$vendor->created_at->format('M-Y-D')}}</span>
                </div>
                <h4 class="mb-5"><a href="vendor-details-1.html">{{$vendor->name}}</a></h4>
                <div class="product-rate-cover">
                  @php
                  $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                  @endphp
                  <span class="font-small total-product">{{count($products)}} products</span>
                </div>
              </div>

            </div>
            <div class="vendor-info mb-30">
              <ul class="contact-infor text-muted">

                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Call
                    Us:</strong><span>{{$vendor->phone_no}}</span></li>
              </ul>
            </div>
            <a href="vendor-details-1.html" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
          </div>
        </div>
      </div>
      <!--end vendor card-->
      @endforeach

    </div>
  </div>

</main>

@endsection