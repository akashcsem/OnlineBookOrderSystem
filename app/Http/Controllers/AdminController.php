<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    //  check authentication that user logged in or not
    public function __construct() {
      $this->middleware('auth');
    }

    // populate dashboard
    public function dashboard() {
      return view('admin.dashboard',
      [
        'todaysTotalOrder'  => Order::where('created_at', '>=', Carbon::today())->get(),
        'totalPendingOrder' => DB::table('orders')->where('status', 0)
      ]);
    }


    public function user() {
      return view('admin.user');
    }

    public function profile() {
      return view('admin.profile');
    }

    public function group() {
      return view('admin.group');
    }

    public function category() {
      return view('admin.category');
    }

    public function author() {
      return view('admin.author');
    }

    public function publication() {
      return view('admin.publication');
    }

    public function product() {
      return view('admin.product');
    }
    public function supplier() {
      return view('admin.supplier');
    }
    public function purchase() {
      return view('admin.purchase');
    }
    public function purchase_list() {
      return view('admin.purchase-list');
    }

}
