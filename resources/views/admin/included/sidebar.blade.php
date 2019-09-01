<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>

    <li class="nav-item">
      <!-- Brand Logo -->
      <a href="#" class="nav-link">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-bold">Soptoborno</span>
      </a>
    </li>
  </ul>


</nav>
<!-- /.navbar -->







<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{!! asset('img/admin-avatar.png') !!}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>





    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

       <li class="nav-item">
         <a href="{!! route('dashboard') !!}" class="nav-link">
           <i class="nav-icon fas fa-tachometer-alt teal"></i>
           <p>
             Dashboard
           </p>
         </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog green"></i>
            <p>
              User
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{!! route('user') !!}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{!! route('profile') !!}" class="nav-link">
                <i class="fas fa-user nav-icon orange"></i>
                <p>Profile</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item">
          <a href="{!! route('todays.orders') !!}" class="nav-link">
            <i class="nav-icon fab fa-first-order green"> </i>
            <p>
              Order
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('group') !!}" class="nav-link">
            <i class="nav-icon fas fa-object-group teal"></i>
            <p>
              Group
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('category') !!}" class="nav-link">
            <i class="nav-icon fas fa-boxes teal"></i>
            <p>
              Category
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('author') !!}" class="nav-link">
            <i class="nav-icon fas fa-user-alt teal"></i>
            <p>
              Author
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('admin.publication') !!}" class="nav-link">
            <i class="nav-icon fas fa-book-reader teal"></i>
            <p>
              Publication
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('product') !!}" class="nav-link">
            <i class="nav-icon fab fa-product-hunt teal"></i>
            <p>
              Product
            </p>
          </a>
         </li>
        <li class="nav-item">
          <a href="{!! route('supplier') !!}" class="nav-link">
            <i class="nav-icon fab fa-product-hunt teal"></i>
            <p>
              Supplier
            </p>
          </a>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-cog green"></i>
             <p>
               Purchase
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{!! route('purchase') !!}" class="nav-link">
                 <i class="fas fa-users nav-icon"></i>
                 <p>Purchase Product</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{!! route('purchase-list') !!}" class="nav-link">
                 <i class="fas fa-user nav-icon orange"></i>
                 <p>Purchase List</p>
               </a>
             </li>

           </ul>
         </li>


         <li class="nav-item">
           <a data-toggle="modal" href="#" data-target="#logout" class="nav-link" >
             <i class="nav-icon fas fa-power-off red"></i>
             <p>Logout</p>
           </a>
          </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>


  <!-- The Modal -->
  <div class="modal modal-danger" id="logout">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header text-center">
          <h4 class="modal-title text-center">Do you want to logout?</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-right">


          <button type="button" class="btn btn-success px-5" >
            <a href="{{ route('logout') }}" style="text-decoration: none; color: white;"          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Yes
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </button>
          <button type="button" class="btn btn-danger px-4" data-dismiss="modal">No</button>

        </div>

      </div>
    </div>
  </div>
  <!-- /.sidebar -->
</aside>
