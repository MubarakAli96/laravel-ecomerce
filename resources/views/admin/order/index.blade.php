@extends('admin.layouts.main')
@section('main')
<div class="page-wrapper">
  <div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Pending Orders</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
          </ol>
        </nav>
      </div>

    </div>
    <div class="card">
      <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
          <div class="position-relative">
            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span
              class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
          </div>
          {{-- <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i
                class="bx bxs-plus-square"></i>Add New Order</a></div> --}}
        </div>
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="table-light">
              <tr>
                <th>Order#</th>
                <th>Invoice</th>
                <th>Amount</th>
                <th>Phone_no</th>
                <th>Date</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $key => $order)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div>
                      <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                    </div>
                    <div class="ms-2">
                      @if($order->order_number == NULL)
                      <h6 class="mb-0 font-14"> Cash On Delivery</h6>
                      @else
                      <h6 class="mb-0 font-14">{{$order->order_number}}</h6>
                      @endif
                    </div>
                  </div>
                </td>
                <td>{{$order->invoice_no}}</td>

                <td>${{$order->amount}}</td>
                <td>{{$order->phone_no}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->payment_method}}</td>
                <td>
                  <span class="badge rounded-pill bg-success">{{$order->status}}</span>
                </td>
                <td>
                  <a href="" class="btn btn-info" title="Details"><i class="fadeIn animated bx bx-show"></i></a>
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