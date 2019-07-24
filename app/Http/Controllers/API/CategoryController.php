<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoryController extends Controller
{
  public function index()
  {
      // load page with initial data
      return Category::latest()->paginate(5);
  }
  public function category_list()
  {
      // load page with initial data
      return DB::table('categories')->paginate(255);
  }

  public function store(Request $request)
  {
    // dd($request->all());
    // validation
    $this->validate($request, [
      'name'      => 'required|string|max:255|min:2',
      'description'  => 'required|string|min:4|max:191',
    ]);
    // insert data
    return Category::create([
      'name'      => $request['name'],
      'description'  => $request['description'],
    ]);
  }


  public function show($id)
  {
      // display single item detail
  }

  public function update(Request $request, $id)
  {
      // update data
      $category = Category::findOrFAil($id);
      $this->validate($request, [
        'name'      => 'required|string|max:255|min:2',
        'description'  => 'required|string|min:4|max:191',s
      ]);
      $category->update($request->all());
      return ['message'=>'Getting id is: ' . $id];
  }

  public function destroy($id)
  {
      //  delete
      // select id
      $category = Category::findOrFail($id);
      // delete user
      $category->delete();
      // redirect back
      return ['message' => 'Category deleted successfully'];
  }


}
