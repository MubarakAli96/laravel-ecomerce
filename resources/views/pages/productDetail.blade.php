@extends('layout.main')
@section('main')


<main class="main">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb">
        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{$products->category->name}}</a>
        <span></span> <a href="shop-grid-right.html">{{$products->sub_category->name}}</a> <span></span>
        {{$products->name}}
      </div>
    </div>
  </div>
  <form action="{{ route('cart.add') }}" method="POST">
    <div class="container mb-30">
      <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
          <div class="product-detail accordion-detail">
            <div class="row mb-50 mt-30">
              <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                <div class="detail-gallery">
                  <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                  <!-- MAIN SLIDES -->
                  <div class="product-image-slider">
                    @foreach($multiImages as $image)
                    <figure class="border-radius-10">
                      <img src="{{asset($image->multi_image)}}" alt="product image" />
                    </figure>
                    @endforeach
                  </div>
                  <!-- THUMBNAILS -->
                  <div class="slider-nav-thumbnails">
                    @foreach($multiImages as $image)
                    <div><img width="60px" height="80px" src="{{asset($image->multi_image)}}" alt="product image" />
                    </div>
                    @endforeach
                  </div>
                </div>
                <!-- End Gallery -->
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="detail-info pr-30 pl-30">
                  @if($products->product_qty > 0)
                  <span class="stock-status in-stock"> In Stock </span>
                  @else
                  <span class="stock-status out-stock"> Out of Stock </span>
                  @endif
                  <h2 class="title-detail">{{$products->name}}</h2>
                  <div class="product-detail-rating">
                    <div class="product-rate-cover text-end">
                      <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                      </div>
                      <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                    </div>
                  </div>
                  <div class="clearfix product-price-cover">
                    @php
                    $amount =$products->selling_price - $products->discount_price;
                    $discount = ($amount/$products->selling_price) * 100;

                    @endphp

                    @if($products->discount_price == NULL)
                    <div class="product-price primary-color float-left">
                      <span class="current-price text-brand">${{$products->selling_price}}</span>
                    </div>
                    @else
                    <div class="product-price primary-color float-left">
                      <span class="current-price text-brand">${{$products->discount_price}}</span>
                      <span>
                        <span class="save-price font-md color3 ml-15">{{ round($discount)}}% Off</span>
                        <span class="old-price font-md ml-15">${{$products->selling_price}}</span>
                      </span>
                    </div>
                    @endif

                  </div>
                  <div class="short-desc mb-30">
                    <p class="font-lg">{{$products->short_decription}}</p>
                  </div>
                  {{-- size  --}}
                  @if($products->product_size == !NULL)
                  <div class="attr-detail attr-size mb-30">
                    <strong class="mr-10">Size </strong>
                    <select name="size" class="form-control unicase-from-control" id="size">

                      <option selected="" disabled="">--Choose Size--</option>
                      @foreach($product_size as $size)
                      <option value="{{ $size }}">{{ ucwords($size) }}</option>
                      @endforeach
                    </select>
                  </div>
                  @else

                  @endif

                  @if($products->product_color == !NULL)
                  <div class="attr-detail attr-size mb-30">
                    <strong class="mr-10">Color </strong>
                    <select name="color" class="form-control unicase-from-control" id="size">
                      <option selected="" disabled="">--Choose color--</option>
                      @foreach($product_color as $color)
                      <option value="{{ $color }}">{{ ucwords($color) }}</option>
                      @endforeach
                    </select>
                  </div>
                  @else

                  @endif
                  @if($products->product_qty > 0)
                  <div class="detail-extralink mb-50">

                    <div class="product-extra-link2">
                      <input type="hidden" id="products_id" name="">
                      <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="products_id" value="{{ $products->id }}">
                        <input type="hidden" name="products->color" value="{{ $products->color }}">
                        <input type="hidden" name="products->size" value="{{ $products->size }}">
                        <input type="hidden" name="vendor_id" value="{{ $products->vendor_id }}">
                        <input type="number" style="width: 60px; height: 55px;" name="quantity" value="1" min="1">

                        <button type="submit">Add to Cart</button>
                      </form>
                      <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i
                          class="fi-rs-heart"></i></a>
                      <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                          class="fi-rs-shuffle"></i></a>
                    </div>
                    @else

                    @endif
                  </div>
                  <div class="font-xs">
                    <ul class="mr-50 float-start">
                      <li class="mb-5">Brand: <span class="text-brand">{{$products->brand->name}}</span></li>
                      @if($products->vendor_id == NULL)
                      <li> Owner Product</li>
                      @else
                      <li class="mb-5">VendorID: <span class="text-brand">{{$products->vendor_id}}</span></li>
                      @endif
                      <li>Category: <span class="text-brand">{{$products->category->name}}</span></li>
                      <li class="mb-5">SubCategory:<span class="text-brand"> {{$products->sub_category->name}}</span>
                      </li>
                    </ul>
                    <ul class="float-start">
                      <li class="mb-5">Product Code: <a href="#">{{$products->product_code}}</a></li>
                      <li class="mb-5">Tags: <a href="#" rel="tag">{{$products->product_tags}}</a></li>
                      <li>Stock:<span class="in-stock text-brand ml-5">{{$products->product_qty}} Items In Stock</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Detail Info -->
              </div>
            </div>
            <div class="product-info">
              <div class="tab-style3">
                <ul class="nav nav-tabs text-uppercase">
                  <li class="nav-item">
                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                      href="#Description">Description</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional
                      info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                  </li>
                </ul>
                <div class="tab-content shop_info_tab entry-main-content">
                  <div class="tab-pane fade show active" id="Description">
                    <div class="">
                      {{ $products->description}}

                    </div>

                  </div>
                  <div class="tab-pane fade" id="Additional-info">
                    <table class="font-md">
                      <tbody>
                        <tr class="stand-up">
                          <th>Stand Up</th>
                          <td>
                            <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                          </td>
                        </tr>
                        <tr class="folded-wo-wheels">
                          <th>Folded (w/o wheels)</th>
                          <td>
                            <p>32.5″L x 18.5″W x 16.5″H</p>
                          </td>
                        </tr>
                        <tr class="folded-w-wheels">
                          <th>Folded (w/ wheels)</th>
                          <td>
                            <p>32.5″L x 24″W x 18.5″H</p>
                          </td>
                        </tr>
                        <tr class="door-pass-through">
                          <th>Door Pass Through</th>
                          <td>
                            <p>24</p>
                          </td>
                        </tr>
                        <tr class="frame">
                          <th>Frame</th>
                          <td>
                            <p>Aluminum</p>
                          </td>
                        </tr>
                        <tr class="weight-wo-wheels">
                          <th>Weight (w/o wheels)</th>
                          <td>
                            <p>20 LBS</p>
                          </td>
                        </tr>
                        <tr class="weight-capacity">
                          <th>Weight Capacity</th>
                          <td>
                            <p>60 LBS</p>
                          </td>
                        </tr>
                        <tr class="width">
                          <th>Width</th>
                          <td>
                            <p>24″</p>
                          </td>
                        </tr>
                        <tr class="handle-height-ground-to-handle">
                          <th>Handle height (ground to handle)</th>
                          <td>
                            <p>37-45″</p>
                          </td>
                        </tr>
                        <tr class="wheels">
                          <th>Wheels</th>
                          <td>
                            <p>12″ air / wide track slick tread</p>
                          </td>
                        </tr>
                        <tr class="seat-back-height">
                          <th>Seat back height</th>
                          <td>
                            <p>21.5″</p>
                          </td>
                        </tr>
                        <tr class="head-room-inside-canopy">
                          <th>Head room (inside canopy)</th>
                          <td>
                            <p>25″</p>
                          </td>
                        </tr>
                        <tr class="pa_color">
                          <th>Color</th>
                          <td>
                            <p>Black, Blue, Red, White</p>
                          </td>
                        </tr>
                        <tr class="pa_size">
                          <th>Size</th>
                          <td>
                            <p>M, S</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="Vendor-info">
                    <div class="vendor-logo d-flex mb-30">
                      <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                      <div class="vendor-name ml-15">
                        @if($products->vendor_id == NULL)
                        <h6>
                          <a href="vendor-details-2.html">Owner</a>
                        </h6>
                        @else
                        <h6>
                          <a href="vendor-details-2.html">{{$products->vendor->name}}</a>
                        </h6>
                        @endif
                        <div class="product-rate-cover text-end">
                          <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                          </div>
                          <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                        </div>
                      </div>
                    </div>
                    <ul class="contact-infor mb-50">
                      @if($products->vendor_id == !NULL)
                      <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong>
                        <span>{{$products->vendor->address}}</span>
                      </li>
                      @else
                      <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong>
                        <span>{{$products->address}}</span>
                      </li>
                      @endif
                      @if($products->vendor_id == !NULL)
                      <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact
                          Seller:</strong><span>{{$products->vendor->phone_no}}</span></li>
                      @else
                      <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact
                          Seller:</strong><span>{{$products->phone_no}}</span></li>
                      @endif
                    </ul>
                    <div class="d-flex mb-55">
                      <div class="mr-30">
                        <p class="text-brand font-xs">Rating</p>
                        <h4 class="mb-0">92%</h4>
                      </div>
                      <div class="mr-30">
                        <p class="text-brand font-xs">Ship on time</p>
                        <h4 class="mb-0">100%</h4>
                      </div>
                      <div>
                        <p class="text-brand font-xs">Chat response</p>
                        <h4 class="mb-0">89%</h4>
                      </div>
                    </div>
                    <p>Noodles & Company is an American fast-casual restaurant that offers international and American
                      noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by
                      Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and
                      recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations
                      across 29 states and Washington, D.C.</p>
                  </div>
                  <div class="tab-pane fade" id="Reviews">
                    <!--Comments-->
                    <div class="comments-area">
                      <div class="row">
                        <div class="col-lg-8">
                          <h4 class="mb-30">Customer questions & answers</h4>
                          <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex mb-30">
                              <div class="user justify-content-between d-flex">
                                <div class="thumb text-center">
                                  <img src="assets/imgs/blog/author-2.png" alt="" />
                                  <a href="#" class="font-heading text-brand">Sienna</a>
                                </div>
                                <div class="desc">
                                  <div class="d-flex justify-content-between mb-10">
                                    <div class="d-flex align-items-center">
                                      <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                    </div>
                                    <div class="product-rate d-inline-block">
                                      <div class="product-rating" style="width: 100%"></div>
                                    </div>
                                  </div>
                                  <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus,
                                    suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque
                                    modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id
                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                </div>
                              </div>
                            </div>
                            <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                              <div class="user justify-content-between d-flex">
                                <div class="thumb text-center">
                                  <img src="assets/imgs/blog/author-3.png" alt="" />
                                  <a href="#" class="font-heading text-brand">Brenna</a>
                                </div>
                                <div class="desc">
                                  <div class="d-flex justify-content-between mb-10">
                                    <div class="d-flex align-items-center">
                                      <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                    </div>
                                    <div class="product-rate d-inline-block">
                                      <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                  </div>
                                  <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus,
                                    suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque
                                    modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id
                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                </div>
                              </div>
                            </div>
                            <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                <div class="thumb text-center">
                                  <img src="assets/imgs/blog/author-4.png" alt="" />
                                  <a href="#" class="font-heading text-brand">Gemma</a>
                                </div>
                                <div class="desc">
                                  <div class="d-flex justify-content-between mb-10">
                                    <div class="d-flex align-items-center">
                                      <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                    </div>
                                    <div class="product-rate d-inline-block">
                                      <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                  </div>
                                  <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus,
                                    suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque
                                    modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id
                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <h4 class="mb-30">Customer reviews</h4>
                          <div class="d-flex mb-30">
                            <div class="product-rate d-inline-block mr-15">
                              <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <h6>4.8 out of 5</h6>
                          </div>
                          <div class="progress">
                            <span>5 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="100">50%</div>
                          </div>
                          <div class="progress">
                            <span>4 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                              aria-valuemin="0" aria-valuemax="100">25%</div>
                          </div>
                          <div class="progress">
                            <span>3 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45"
                              aria-valuemin="0" aria-valuemax="100">45%</div>
                          </div>
                          <div class="progress">
                            <span>2 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65"
                              aria-valuemin="0" aria-valuemax="100">65%</div>
                          </div>
                          <div class="progress mb-30">
                            <span>1 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85"
                              aria-valuemin="0" aria-valuemax="100">85%</div>
                          </div>
                          <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                        </div>
                      </div>
                    </div>
                    <!--comment form-->
                    <div class="comment-form">
                      <h4 class="mb-15">Add a review</h4>
                      <div class="product-rate d-inline-block mb-30"></div>
                      <div class="row">
                        <div class="col-lg-8 col-md-12">
                          <form class="form-contact comment_form" action="#" id="commentForm">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <input class="form-control" name="email" id="email" type="email"
                                    placeholder="Email" />
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <input class="form-control" name="website" id="website" type="text"
                                    placeholder="Website" />
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="button button-contactForm">Submit Review</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-60">
              <div class="col-12">
                <h2 class="section-title style-1 mb-30">Related products</h2>
              </div>
              <div class="col-12">
                <div class="row related-products">
                  @foreach($relatedProducts as $relProduct)
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap hover-up">
                      <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                          <a href="shop-product-right.html" tabindex="0">
                            <img class="default-img" src="{{asset($relProduct->product_thumbnail)}}" alt="" />
                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
                          </a>
                        </div>
                        <div class="product-action-1">
                          <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                          <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"
                            tabindex="0"><i class="fi-rs-heart"></i></a>
                          <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"
                            tabindex="0"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        @php
                        $amount = $relProduct->selling_price - $relProduct->discount_price;
                        $discount = ($amount/$relProduct->selling_price) *100;
                        @endphp
                        <div class="product-badges product-badges-position product-badges-mrg">
                          @if($relProduct->discount_price== null)
                          <span class="hot">New</span>
                          @else
                          <span class="hot">{{round($discount)}}</span>
                          @endif
                        </div>
                      </div>
                      <div class="product-content-wrap">
                        <h2><a href="shop-product-right.html" tabindex="0">{{$relProduct->name}}</a></h2>
                        <div class="rating-result" title="90%">
                          <span> </span>
                        </div>
                        @if($relProduct->discount_price == null)
                        <div class="product-price">
                          <span>{{$relProduct->selling_price}}</span>
                        </div>
                        @else
                        <div class="product-price">
                          <span>{{$relProduct->discount_price}}</span>
                          <span class="old-price">{{$relProduct->selling_price}}</span>
                        </div>
                        @endif

                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

@endsection