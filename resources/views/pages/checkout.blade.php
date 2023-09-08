@extends('layout.main')
@section('main')

<main class="main">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb">
        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
        <span></span> Checkout
      </div>
    </div>
  </div>
  <div class="container mb-80 mt-50">
    <div class="row">
      <div class="col-lg-8 mb-40">
        <h3 class="heading-2 mb-10">Checkout</h3>
        <div class="d-flex justify-content-between">
          <h6 class="text-body">There are products in your cart</h6>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7">

        <div class="row">
          <h4 class="mb-30">Billing Details</h4>
          <form method="post" method="post" action="{{route('checkout.store')}}">
            @csrf


            <div class="row">
              <div class="form-group col-lg-6">
                <input type="text" required="" value="{{Auth::user()->name}}" name="name" placeholder="Name">
              </div>
              <div class="form-group col-lg-6">
                <input type="email" required="" name="email" value="{{Auth::user()->email}}" placeholder="Email *">
              </div>
            </div>
            <div class="row shipping_calculator">
              <div class="form-group col-lg-6">
                <div class="custom_select">
                  <select name="country" class="form-control select-active">
                    <option value="">Select Country...</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="india">iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="France">france</option>
                    <option value="America">America</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6">
                <input required="" type="text" name="phone_no" placeholder="Phone*">
              </div>
            </div>

            <div class="row shipping_calculator">
              {{-- <div class="form-group col-lg-6">
                <div class="custom_select">
                  <select class="form-control select-active">
                    <option value="">Select an option...</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AD">Andorra</option>
                  </select>
                </div>
              </div> --}}
              <div class="form-group col-lg-6">
                <input required="" type="text" name="postal_code" placeholder="Post Code *">
              </div>
            </div>
            <div class="row shipping_calculator">
              <div class="form-group col-lg-6">
                <div class="custom_select">
                  <select name="city" class="form-control select-active">
                    <option value="">Select an city...</option>
                    <option value="Karchi">Karachi</option>
                    <option value="dehli">dehli</option>
                    <option value="Lahore">lahore</option>
                    <option value="Gilgit">gilgit</option>
                    <option value="Kashmir">kashmir</option>

                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6">
                <input required="" type="text" name="address" placeholder="Address *">
              </div>
            </div>
            <div class="form-group mb-30">
              <textarea rows="5" name="additional_info" placeholder="Additional information"></textarea>
            </div>

        </div>
      </div>
      <div class="col-lg-5">
        <div class="border p-40 cart-totals ml-30 mb-50">
          <div class="d-flex align-items-end justify-content-between mb-30">
            <h4>Your Order</h4>
            <h6 class="text-muted">Subtotal</h6>
          </div>
          <div class="divider-2 mb-30"></div>
          <div class="table-responsive order_table checkout">
            <table class="table no-border">
              <tbody>
                @php
                $subtotal = 0;
                @endphp
                @forelse (auth()->user()->cart as $item)

                <tr>
                  <td class="image product-thumbnail"><img src="{{$item->product->product_thumbnail}}" alt="#"></td>
                  <td>
                    <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                        class="text-heading">{{$item->product->name}}</a></h6></span>
                    <div class="product-rate-cover">

                      <strong>Color :{{$item->color}} </strong>
                      <strong>Size :{{$item->size}} </strong>

                    </div>
                  </td>
                  <td>
                    <h6 class="text-muted pl-20 pr-20">x{{$item->quantity}}</h6>
                  </td>
                  @php
                  $total = $item->product->discount_price * $item->quantity;
                  $subtotal = $subtotal + $total;
                  @endphp
                  <td>
                    <h4 class="text-brand"> {{$total}}</h4>
                  </td>
                </tr>
                @empty

                @endforelse
              </tbody>
            </table>
            <table class="table no-border">
              <tbody>

                <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Subtotal</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{$subtotal}}</h4>
                    <input type="hidden" name="total" value="{{$subtotal}}">
                  </td>
                </tr>

                <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Coupn Name</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h6 class="text-brand text-end">EASYLEA</h6>
                  </td>
                </tr>

                <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Coupon Discount</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">$132</h4>
                  </td>
                </tr>

                <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{$subtotal}}</h4>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
        <div class="payment ml-30">
          <h4 class="mb-30">Payment</h4>
          <div class="payment_option">
            <div class="custome-radio">
              <input class="form-check-input" value="stripe" required="" type="radio" name="payment_option"
                id="exampleRadios3" checked="">
              <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer"
                aria-controls="bankTranfer">Strip Payment</label>
            </div>
            <div class="custome-radio">
              <input class="form-check-input" value="cash" required="" type="radio" name="payment_option"
                id="exampleRadios4" checked="">
              <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment"
                aria-controls="checkPayment">Cash on delivery</label>
            </div>
            <div class="custome-radio">
              <input class="form-check-input" required="" value="card" type="radio" name="payment_option"
                id="exampleRadios5" checked="">
              <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal"
                aria-controls="paypal">Online Getway</label>
            </div>
          </div>
          <div class="payment-logo d-flex">
            <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-paypal.svg')}}" alt="">
            <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-visa.svg')}}" alt="">
            <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-master.svg')}}" alt="">
            <img src="{{asset('frontend/assets/imgs/theme/icons/payment-zapper.svg')}}" alt="">
          </div>
          <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i
              class="fi-rs-sign-out ml-15"></i></button>
        </div>
      </div>
    </div>
  </div>
  </form>
</main>

@endsection