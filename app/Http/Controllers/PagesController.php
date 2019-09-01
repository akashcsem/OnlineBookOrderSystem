<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Author;
use App\Publication;
use App\Category;
use Cart;
use DB;

class PagesController extends Controller
{
  public function index(Request $request) {
      if ($request->search == null) {
        $search = "";
      } else {
        // return $request->search . " akash";
        $search = $request->search;
      }

      $products = Product::where('name','like','%'.$search.'%')
      ->orWhere('price','like','%'.$search.'%')
      ->orWhereHas('author', function ($query) use ($search) {
          $query->where('name', 'like', '%'.$search.'%');
      })->simplePaginate(20);

      return view('public_user.pages.home',
      [
        'products'         => $products,
        'cartProducts'     => Cart::Content(),
        'authors'          => Author::orderBy('name', 'asc')->get(),
        'publications'     => Publication::orderBy('NAME', 'asc')->get(),
        'selectedCategory' => 0,
        'selectedGroup'    => 0,
        'activePage'       => "home",
        'categories'       => Category::orderBy('name', 'asc')->get()
      ]);
  }


  //  get all product with selected category
  public function productByCategory($id) {
    if ($id == 0) {
      $products = DB::table('products')->paginate(10);
    } else {
      $products = DB::table('products')->where('products.category_id', $id)->paginate(10);
    }

    return view('public_user.pages.home',
    [
      'products'         => $products,
      'cartProducts'     => Cart::Content(),
      'selectedCategory' => $id,
      'authors'          => Author::orderBy('name', 'asc')->get(),
      'publications'     => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'       => "home",
      'categories'       => Category::orderBy('name', 'asc')->get(),
      'selectedGroup'    => 0
    ]);
  }


  // get all product with selected group
  public function productByGroup($id) {
    if ($id == 0) {
      $products = DB::table('products')->paginate(10);
    } else {
      $products = DB::table('products')->where('products.group_id', $id)->paginate(10);
    }

    return view('public_user.pages.home',
    [
      'products'        => $products,
      'cartProducts'    => Cart::Content(),
      'selectedCategory'=> 0,
      'authors'         => Author::orderBy('name', 'asc')->get(),
      'publications'    => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'      => "home",
      'categories'      => Category::orderBy('name', 'asc')->get(),
      'selectedGroup'   => $id
    ]);
  }


  // View book detail
  public function show ($id) {

    $product  = Product::where('id', $id)->first();
    $products = Product::where('author_id', $product->author_id)->paginate(10);

    return view('public_user.pages.show',
      [
        'product'      => $product,
        'products'     => $products,
        'cartProducts' => Cart::Content(),
        'activePage'   => "home",
        'publications' => Publication::orderBy('NAME', 'asc')->get(),
        'authors'      => Author::orderBy('name', 'asc')->get()
      ]);

  }


  // get all books of specific writer
  public function writer(Request $request, $id) {
      if ($request->search == null) {
        $search = "";
      } else {
        $search = $request->search;
      }

    $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->paginate(10);
    return view('public_user.pages.writer_list',
    [
      'cartProducts' => Cart::Content(),
      'products'     => $products,
      'authors'      => Author::orderBy('NAME', 'asc')->get(),
      'publications' => Publication::orderBy('NAME', 'asc')->get(),
      'curentAuthor' => DB::table('authors')->where('id', $id)->first(),
      'activePage'   => "writer"]);
  }


  // get all writer list
  public function all_writer() {
    return view('public_user.pages.all_writer',
    [
      'cartProducts' => Cart::Content(),
      'authors'      => Author::orderBy('NAME', 'asc')->get(),
      'publications' => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'   => "writer"
    ]);
  }


  // get all books of specic publication
  public function publication($id) {

    return view('public_user.pages.publication_detail',
    [
      'products'          => Product::orderBy('name', 'asc')->get(),
      'cartProducts'      => Cart::Content(),
      'authors'           => Author::orderBy('name', 'asc')->get(),
      'publications'      => Publication::orderBy('NAME', 'asc')->get(),
      'curentPublication' => DB::table('publications')->where('id', $id)->first(),
      'activePage'        => "publication",
      'categories'        => Category::orderBy('name', 'asc')->get()
    ]);
  }


  // get all publication list
  public function all_publication() {
      return view('public_user.pages.publication_list',
      [
        'cartProducts' => Cart::Content(),
        'authors'      => Author::orderBy('NAME', 'asc')->get(),
        'publications' => Publication::orderBy('NAME', 'asc')->get(),
        'activePage'   => "publication"
      ]);
  }


  // get all novel
  public function novel(Request $request) {
    $category_id = 0;  // we assume that "novel" is a category which id is 0
    $categories  = Category::orderBy('name', 'asc')->get();

    foreach ($categories as $category) {
      if(strtolower($category->name) == "novel") {
        $category_id = $category->id;
      }
    }

    if ($request->search == null) {
      $products = DB::table('products')->where('category_id', $category_id)->paginate(10);
    } else {
      $search = $request->search;
      $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->paginate(10);
    }

      return view('public_user.pages.novel',
      [
        'products'     => $products,
        'cartProducts' => Cart::Content(),
        'authors'      => Author::orderBy('name', 'asc')->get(),
        'publications' => Publication::orderBy('NAME', 'asc')->get(),
        'activePage'   => "novel",
        'categories'   => $categories
      ]);
  }


  // populate contact page
  public function contact() {
    return view('public_user.pages.contact',
    [
      'cartProducts' => Cart::Content(),
      'authors'      => Author::orderBy('NAME', 'asc')->get(),
      'publications' => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'   => "contact"
    ]);
  }


  // populate about page
  public function about_us() {
      return view('public_user.pages.about_us',
      [
        'cartProducts' => Cart::Content(),
        'authors'      => Author::orderBy('NAME', 'asc')->get(),
        'publications' => Publication::orderBy('NAME', 'asc')->get(),
        'activePage'   => "about_us"
      ]);
  }


  // populate best sale product
  public function bestseller() {
    return view('public_user.pages.bestseller',
    [
      'cartProducts' => Cart::Content(),
      'products'     => Product::take(12)->orderBy('sold', 'desc')->get(),
      'authors'      => Author::orderBy('NAME', 'asc')->get(),
      'publications' => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'   => "bestseller"
    ]);

  }


  // populate islamic page with islamic books
  public function islamic() {
    return view('public_user.pages.islamic',
    [
      'cartProducts' => Cart::Content(),
      'products'     => Product::where('islamic', 1)->paginate(15),
      'authors'      => Author::orderBy('NAME', 'asc')->get(),
      'publications' => Publication::orderBy('NAME', 'asc')->get(),
      'activePage'   => "islamic"
    ]);
  }
}
