<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">VendorPanel</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
    </div>
  </div>
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{route('vendor.dashboard')}}">
        <div class="parent-icon"><i class='bx bx-home-circle'></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
      {{-- <ul>
        <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
        </li>
        <li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
        </li>
        <li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
        </li>
        <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
        </li>
        <li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
        </li>
      </ul> --}}

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-category"></i>
        </div>
        <div class="menu-title">Application</div>
      </a>
      <ul>
        {{-- <li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
        </li>
        <li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
        </li>
        <li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
        </li>
        <li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
        </li>
        <li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
        </li>
        <li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
        </li>
        <li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
        </li> --}}
      </ul>
    </li>



    <li class="menu-label">Backend Pages</li>
    @if(Auth::check() && Auth::user()->status == 1)
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class='bx bx-cart'></i>
        </div>
        <div class="menu-title">Product</div>
      </a>
      <ul>
        <li> <a href="{{route('vendor_product.all')}}"><i class="fadeIn animated bx bx-show"></i>Products</a>
        </li>
        <li> <a href="{{route('vendor_product.add')}}"><i class="fadeIn animated bx bx-bell-plus"></i>Add Products</a>
        </li>
        <li> <a href="{{route('vendor_product.edit')}}"><i class="fadeIn animated bx bx-pen"></i>Edit Products</a>
        </li>
        {{-- <li> <a href="ecommerce-products-details.html"><i class="fadeIn animated bx bx-detail"></i>Product Details</a>
        </li> --}}

      </ul>
    </li>
    @else

    @endif
    {{-- <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class='bx bx-cart'></i>
        </div>
        <div class="menu-title">Category</div>
      </a>
      <ul>
        <li> <a href="{{route('category')}}"><i class="fadeIn animated bx bx-show"></i>Category</a>
    </li>
    <li> <a href="{{route('category.add')}}"><i class="fadeIn animated bx bx-bell-plus"></i>Add Category</a>
    </li>
    <li> <a href="#"><i class="fadeIn animated bx bx-pen"></i>Edit Category</a>
    </li>
  </ul>
  </li> --}}
  {{-- <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class='bx bx-cart'></i>
        </div>
        <div class="menu-title">Sub Category</div>
      </a>
      <ul>
        <li> <a href="{{route('sub_catgory')}}"><i class="fadeIn animated bx bx-show"></i>SubCategroy</a>
  </li>
  <li> <a href="{{route('sub_catgory.add')}}"><i class="fadeIn animated bx bx-bell-plus"></i>Add SubCategroy</a>
  </li>
  <li> <a href="#"><i class="fadeIn animated bx bx-pen"></i>Edit SubCategroy</a>
  </li>

  </ul>
  </li> --}}
  @if(Auth::check() && Auth::user()->status == 1)
  <li>
    <a href="javascript:;" class="has-arrow">
      <div class="parent-icon"><i class='bx bx-cart'></i>
      </div>
      <div class="menu-title">Brands</div>
    </a>
    <ul>
      <li> <a href="{{route('brand')}}"><i class="fadeIn animated bx bx-show"></i>Brands</a>
      </li>
      <li> <a href="{{route('brand.add')}}"><i class="fadeIn animated bx bx-bell-plus"></i> Add Brands</a>
      </li>
      <li> <a href="#"><i class="fadeIn animated bx bx-pen"></i>Edit Brands</a>
      </li>
    </ul>
  </li>
  @else
  @endif

  @if(Auth::check() && Auth::user()->status == 1)
  <li class="menu-label">Forms & Tables</li>
  <li>
    <a class="has-arrow" href="javascript:;">
      <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
      </div>
      <div class="menu-title">Forms</div>
    </a>

  </li>
  @else
  @endif
  @if(Auth::check() && Auth::user()->status == 1)
  <li>

    <a class="has-arrow" href="javascript:;">
      <div class="parent-icon"><i class="bx bx-grid-alt"></i>
      </div>
      <div class="menu-title">Contact and Forms</div>
    </a>
    <ul>
      <li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Basic Table</a>
      </li>
      <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
      </li>
    </ul>
  </li>
  @else
  @endif
  @if(Auth::check() && Auth::user()->status == 1)
  <li class="menu-label">Pages</li>

  <li>
    <a href="user-profile.html">
      <div class="parent-icon"><i class="bx bx-user-circle"></i>
      </div>
      <div class="menu-title">User Profile</div>
    </a>
  </li>


  <li>
    <a href="faq.html">
      <div class="parent-icon"><i class="bx bx-help-circle"></i>
      </div>
      <div class="menu-title">FAQ</div>
    </a>
  </li>

  </ul>
  @else
  @endif

</div>