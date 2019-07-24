
@extends('master.admin')

@section('page-title')
  Admin - Dashboards
@endsection

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="vue-user">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid pt-5">

        <dashboard-component>

        </dashboard-component>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
