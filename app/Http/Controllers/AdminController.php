<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    public function dashboard() {
      return view('admin.dashboard');
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
    // public function productss() {
    //   return view('admin.product');
    // }
}
