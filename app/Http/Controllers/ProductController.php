<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Author;
use App\Publication;
use App\Category;
use Cart;
use Session;

class ProductController extends Controller
{
    public function getAddToCart($id) {
      $product = Product::where('id', $id)->first();
      Cart::add([
        'id'=>$id,
        'name'=>$product->name,
        'price'=>$product->price,
        'image'=>$product->image,
        'qty'=>1
      ]);
      return redirect()->back();
    }


    public function removeFromCart(Request $request) {
      Cart::remove($request->rowId);
      return redirect('/add-to-cart');
    }

    public function removeAllCart() {
      Cart::destroy();
      return redirect()->back();
    }

    public function getCart() {
      $activePage = "";
      $cartProducts = Cart::Content();
      $products = Cart::Content();
      $authors = Author::orderBy('NAME', 'asc')->get();
      $publications = Publication::orderBy('NAME', 'asc')->get();
      return view('public_user.pages.cart.add_to_cart', ['cartProducts' => $products, 'activePage'=>$activePage, 'authors'=>$authors, 'publications'=>$publications]);
    }

    public function updateCart(Request $request) {
      Cart::update($request->rowId, $request->qty);
      return redirect()->back();
    }


    // shipping
    public function productShipping()
    {
      $activePage = "";
      $cartProducts = Cart::Content();
      $authors = Author::orderBy('name', 'asc')->get();
      $publications = Publication::orderBy('name', 'asc')->get();
      $products = Cart::Content();
      return view('public_user.pages.cart.shipping', ['cartProducts' => $products, 'activePage'=>$activePage, 'authors'=>$authors, 'publications'=>$publications]);
    }

    // checkout
    public function productCheckout()
    {
      $activePage = "";
      $products = Cart::Content();
      $authors = Author::orderBy('name', 'asc')->get();
      $publications = Publication::orderBy('name', 'asc')->get();
      return view('public_user.pages.cart.checkout', ['cartProducts' => $products, 'activePage'=>$activePage, 'authors'=>$authors, 'publications'=>$publications]);
    }

    // Store Shippint info in session
    public function cartShipping (Request $request) {
      // dd($request->all());

      if ($request->zone == 0) {
        $delivery_charge = 30;
      }
      elseif ($request->zone == 1) {
        $delivery_charge = 50;
      }
      elseif ($request->zone == 2) {
        $delivery_charge = 70;
      }
      elseif ($request->zone == 3) {
        $delivery_charge = 100;
      }
      elseif ($request->zone == 4) {
        $delivery_charge = 100;
      }
      elseif ($request->zone == 5) {
        $delivery_charge = 100;
      }
      elseif ($request->zone == 6) {
        $delivery_charge = 90;
      }
      elseif ($request->zone == 7) {
        $delivery_charge = 80;
      }
      else {
        $delivery_charge = 0;
      }
      $request->session()->put('customer_name', $request->customer_name);
      $request->session()->put('email', $request->email);
      $request->session()->put('customer_mobile', $request->customer_mobile);
      $request->session()->put('contact_person', $request->contact_person);
      $request->session()->put('reciver_number', $request->reciver_number);
      $request->session()->put('zone', $request->zone);
      $request->session()->put('address', $request->address);
      $request->session()->put('delivery_charge', $delivery_charge);

      $activePage = "";
      $products = Cart::Content();
      $authors = Author::orderBy('name', 'asc')->get();
      $publications = Publication::orderBy('name', 'asc')->get();
      return view('public_user.pages.cart.checkout', ['cartProducts' => $products,
      'activePage'=>$activePage, 'authors'=>$authors, 'publications'=>$publications]);
    }

}
