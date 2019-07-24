<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function index()
    {
      // return "get data";
      return Publication::latest()->paginate(10);
    }

    public function store(Request $request)
    {
      // dd($request->all());
      $this->validate($request, [
        'name'      => 'required|string|max:255|min:2',
      ]);
      // insert data
      return Publication::create([
        'name'      => $request['name'],
        'description'  => $request['description'],
      ]);
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
      $publication = Publication::findOrFAil($id);
      $this->validate($request, [
        'name'      => 'required|string|max:255|min:2',
      ]);
      $publication->update($request->all());
      return ['message'=>'Getting id is: ' . $id];
    }

    public function destroy($id)
    {
      $publication = Publication::findOrFail($id);
      // delete user
      $publication->delete();
      // redirect back
      return ['message' => 'User deleted successfully'];
    }
}
