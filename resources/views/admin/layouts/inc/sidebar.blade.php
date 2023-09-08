<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="{{asset('backend/assets/images/images.png')}}" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">Admin-Panel</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
    </div>
  </div>
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{route('admin.dashboard')}}">
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
    </li>
    <li class="menu-label">Frontend Pages</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="fadeIn animated bx bx-wrench"></i>
        </div>
        <div class="menu-title">Home Slider</div>
      </a>

      <ul>
        <li> <a href="{{ route('all.slider')}}"><i class="fadeIn animated bx bx-show"></i>Home Slider</a>
        </li>

      </ul>
    </li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="fadeIn animated bx bx-wrench"></i>
        </div>
        <div class="menu-title">Home Banner</div>
      </a>
      <ul>
        <li> <a href="{{ route('all.banner')}}"><i class="fadeIn animated bx bx-show"></i>Home Banners</a>
        </li>

      </ul>
    </li>

    <li class="menu-label">Backend Pages</li>

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class='bx bx-cart'></i>
        </div>
        <div class="menu-title">Product</div>
      </a>
      <ul>
        <li> <a href="{{route('product')}}"><i class="fadeIn animated bx bx-show"></i>Products</a>
        </li>
        <li> <a href="{{route('product')}}"><i class="fadeIn animated bx bx-bell-plus"></i>Add Products</a>
        </li>
        <li> <a href="{{route('product')}}"><i class="fadeIn animated bx bx-pen"></i>Edit Products</a>
        </li>
        <li> <a href="ecommerce-products-details.html"><i class="fadeIn animated bx bx-detail"></i>Product Details</a>
        </li>

      </ul>
    </li>
    <li>
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
    </li>
    <li>
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
    </li>
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

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class='bx bx-cart'></i>
        </div>
        <div class="menu-title">Orders</div>
      </a>
      <ul>
        <li> <a href="{{route('orders')}}"><i class="fadeIn animated bx bx-show"></i>Pending_Orders</a>
        </li>
        {{-- <li> <a href="#"><i class="fadeIn animated bx bx-pen"></i>Edit Brands</a>
        </li> --}}
      </ul>
    </li>

    <li class="menu-label">User Managment</li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
        </div>
        <div class="menu-title">User Managment</div>
      </a>
      <ul>

        <li> <a href="{{route('all.users')}}"><i class="fadeIn animated bx bx-show"></i>All Users</a>
        </li>
        <li> <a href="{{route('all.venders')}}"><i class="fadeIn animated bx bx-show"></i>All Venders</a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-grid-alt"></i>
        </div>
        <div class="menu-title">Contact and NewsLetters </div>
      </a>
      <ul>
        <li> <a href="{{route('all.contacts')}}"><i class="fadeIn animated bx bx-show"></i>Contacted Person Details</a>
        </li>
        <li> <a href="table-datatable.html"><i class="fadeIn animated bx bx-show"></i>News latters</a>
        </li>
      </ul>
    </li>

    <li>
      <a href="{{ route('admin.profile')}}">
        <div class="parent-icon"><i class="fadeIn animated bx bx-user"></i>
        </div>
        <div class="menu-title">User Profile</div>
      </a>
    </li>
    <a href="faq.html">
      <div class="parent-icon"><i class="bx bx-help-circle"></i>
      </div>
      <div class="menu-title">FAQ</div>
    </a>
    <li class="menu-label"> Site Setting</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="fadeIn animated bx bx-wrench"></i>
        </div>
        <div class="menu-title">Site Pages</div>
      </a>

      <ul>
        <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Site Page</a>
        </li>

      </ul>
    </li>
    <li class="menu-label">Admin Managment</li>
    <li>
      <a class="fadeIn animated bx bx-link" href="javascript:;">
        <div class="parent-icon"><i class="fadeIn animated bx bx-run"></i>
        </div>
        <div class="menu-title">Admin Managements</div>
      </a>

      <ul>
        <li class="">Admin Manage</li>
        <li>
          <a class="fadeIn animated bx bx-link" href="javascript:;">
            <div class=""><i class=""></i>
            </div>
            <div class="menu-title">Admin Manages</div>
          </a>
          <ul>
            <li> <a class="fadeIn animated bx bx-link" href="{{ route('admin.all')}}"><i></i>All Admin</a>
            <li> <a class="fadeIn animated bx bx-link" href="{{ route('add.all_admins')}}"><i></i>Add Admins</a></li>

        </li>
      </ul>
    </li>
    <li>

    </li>
    <li class="menu-label">Role and Permission</li>
    <li>
      <a class="fadeIn animated bx bx-link" href="javascript:;">
        <div class=""><i class=""></i>
        </div>
        <div class="menu-title">Role & Permission</div>
      </a>
      <ul>
        <li> <a class="fadeIn animated bx bx-link" href="{{ route('all.permission')}}"><i></i>All
            Permission</a>

        <li> <a class="fadeIn animated bx bx-link" href="{{route('all.roles')}}"><i></i>Add Roles</a>

        <li> <a href="{{route('add.roles.permissions')}}"><i></i>Roles in
            Permissions</a>
        </li>

    </li>

  </ul>
  </li>
  </ul>
</div>