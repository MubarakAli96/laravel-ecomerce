@extends('layout.main')
@section('main')


<main class="main">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb">
        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
        <span></span> Cash On Delivery
      </div>
    </div>
  </div>
  <div class="container mb-80 mt-50">
    <div class="row">
      <div class="col-lg-8 mb-40">
        <h3 class="heading-2 mb-10">Cash On Delivery</h3>
        <div class="d-flex justify-content-between">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="border p-40 cart-totals ml-30 mb-50">
          <div class="d-flex align-items-end justify-content-between mb-30">
            <h4>Your Order</h4>

          </div>
          <div class="divider-2 mb-30"></div>
          <div class="table-responsive order_table checkout">





            <table class="table no-border">
              <tbody>
                {{-- <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Subtotal</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">$12.31</h4>
                  </td>
                </tr> --}}

                {{-- <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Coupn Name</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h6 class="text-brand text-end">EASYLEA</h6>
                  </td>
                </tr> --}}

                {{-- <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Coupon Discount</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{$data['total']}}</h4>
                </td>
                </tr> --}}

                <tr>
                  <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total</h6>
                  </td>
                  <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{$data['total']}}</h4>
                  </td>
                </tr>
              </tbody>
            </table>





          </div>
        </div>
      </div>


      <div class="col-lg-6">
        <div class="border p-40 cart-totals ml-30 mb-50">
          <div class="d-flex align-items-end justify-content-between mb-30">
            <h4>Make cash On Payment</h4>

          </div>
          <div class="divider-2 mb-30"></div>
          <div class="table-responsive order_table checkout">
            <form action="{{route('cash.order')}} " method="post">
              @csrf
              <div class="form-row">

                <input type="hidden" name="amount" value="{{$data['total']}}">
                <input type="hidden" name="name" value="{{$data['name']}}">
                <input type="hidden" name="city" value="{{$data['city']}}">
                <input type="hidden" name="country" value="{{$data['country']}}">
                <input type="hidden" name="email" value="{{$data['email']}}">
                <input type="hidden" name="address" value="{{$data['address']}}">
                <input type="hidden" name="phone_no" value="{{$data['phone_no']}}">
                <input type="hidden" name="postal_code" value="{{$data['postal_code']}}">
                <input type="hidden" name="additional_info" value="{{$data['additional_info']}}">



                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
              </div>
              <br>
              <button class="btn btn-primary">Submit Payment</button>
            </form>



          </div>
        </div>

      </div>
    </div>
  </div>
</main>



@endsection