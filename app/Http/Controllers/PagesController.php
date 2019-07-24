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
  public function index(Request $request)
  {
    // Toastr::info('welcome admin!');

    if ($request->search == null) {
      $search = "";
    } else {
      $search = $request->search;
    }

    $activePage = "home";
    $selectedCategory = 0;
    $selectedGroup = 0;

    $products = Product::where('name','like','%'.$search.'%')
    ->orWhere('price','like','%'.$search.'%')
    ->orWhereHas('author', function ($query) use ($search) {
        $query->where('name', 'like', '%'.$search.'%');
    })
    ->paginate(20);

    // $products = DB::table('products')
    // ->where('name', 'like', '%'.$search.'%')
    // ->orWhere('price', 'like', '%'.$search.'%')
    // ->paginate(10);

    $cartProducts = Cart::Content();
    $categories = Category::orderBy('name', 'asc')->get();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.home', ['products'=>$products,
    'cartProducts'=>$cartProducts, 'authors'=>$authors,
    'publications'=>$publications, 'selectedCategory'=>$selectedCategory,
    'selectedGroup'=>$selectedGroup, 'activePage'=>$activePage, 'categories'=>$categories]);
  }

  public function productByCategory($id)
  {
    // return $id;
    // Toastr::info('welcome admin!');
    $activePage = "home";
    $selectedGroup = 0;
    $selectedCategory = $id;
    if ($id == 0) {
      $products = DB::table('products')->paginate(10);
    } else {
      $products = DB::table('products')->where('products.category_id', $id)->paginate(10);
    }
    $cartProducts = Cart::Content();
    $categories = Category::orderBy('name', 'asc')->get();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.home',
    ['products'=>$products, 'cartProducts'=>$cartProducts,
    'selectedCategory'=>$selectedCategory, 'authors'=>$authors,
    'publications'=>$publications, 'activePage'=>$activePage,
    'categories'=>$categories,'selectedGroup'=>$selectedGroup]);
  }

  public function productByGroup($id)
  {
    // return $id;
    // Toastr::info('welcome admin!');
    $activePage = "home";
    $selectedCategory = 0;
    $selectedGroup = $id;
    if ($id == 0) {
      $products = DB::table('products')->paginate(10);
    } else {
      $products = DB::table('products')->where('products.group_id', $id)->paginate(10);
    }
    $cartProducts = Cart::Content();
    $categories = Category::orderBy('name', 'asc')->get();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.home',
    ['products'=>$products, 'cartProducts'=>$cartProducts,
    'selectedCategory'=>$selectedCategory, 'authors'=>$authors,
    'publications'=>$publications, 'activePage'=>$activePage,
    'categories'=>$categories,'selectedGroup'=>$selectedGroup]);
  }

  public function singleProduct($id)
  {
    $activePage = "home";
    $cartProducts = Cart::Content();
    $categories = Category::orderBy('name', 'asc')->get();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    $product = DB::table('products')
                   ->join('categories', 'categories.id', '=', 'category_id')
                   ->join('authors', 'authors.id', '=', 'author_id')
                   ->join('publications', 'publications.id', '=', 'publication_id')
                   ->select('products.*', 'categories.name as catName', 'authors.name as authorName', 'publications.name as publisherName')
                   ->where('products.id', $id)
                   ->first();
      $products = DB::table('products')->where('author_id', $product->author_id)->paginate(10);
      return view('public_user.pages.singleProduct', ['product'=>$product, 'products'=>$products, 'cartProducts'=>$cartProducts, 'activePage'=>$activePage, 'publications'=>$publications, 'authors'=>$authors]);

  }

  public function writer(Request $request, $id)
  {
    if ($request->search == null) {
      $search = "";
    } else {
      $search = $request->search;
    }

    $activePage = "writer";
    $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->paginate(10);

    $cartProducts = Cart::Content();
    $curentAuthor = DB::table('authors')->where('id', $id)->first();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.writer_list', ['cartProducts'=>$cartProducts, 'products'=>$products, 'authors'=>$authors, 'publications'=>$publications, 'curentAuthor'=>$curentAuthor, 'activePage'=>$activePage]);
  }

  public function all_writer()
  {
    $activePage = "writer";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.all_writer', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }

  public function publication($id)
  {
    $activePage = "publication";
    $categories = Category::orderBy('name', 'asc')->get();
    $products = Product::orderBy('name', 'asc')->get();
    $cartProducts = Cart::Content();
    $curentPublication = DB::table('publications')->where('id', $id)->first();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.publication_detail', ['products'=>$products, 'cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'curentPublication'=>$curentPublication, 'activePage'=>$activePage, 'categories'=>$categories]);
  }

  public function all_publication()
  {
    $activePage = "publication";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.publication_list', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }

  public function novel(Request $request)
  {


    $activePage = "novel";
    $categories = Category::orderBy('name', 'asc')->get();
    $category_id = 0;
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

    $cartProducts = Cart::Content();
    $authors = Author::orderBy('name', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.novel', ['products'=>$products, 'cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage, 'categories'=>$categories]);
  }

  public function contact()
  {
    $activePage = "contact";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.contact', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }
  public function about_us()
  {
    $activePage = "about_us";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.about_us', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }

  public function bestseller()
  {
    $activePage = "bestseller";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.bestseller', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }

  public function islamic()
  {
    $activePage = "islamic";
    $cartProducts = Cart::Content();
    $authors = Author::orderBy('NAME', 'asc')->get();
    $publications = Publication::orderBy('NAME', 'asc')->get();
    return view('public_user.pages.islamic', ['cartProducts'=>$cartProducts, 'authors'=>$authors, 'publications'=>$publications, 'activePage'=>$activePage]);
  }
}
