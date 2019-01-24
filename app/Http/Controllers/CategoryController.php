<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        // dd($categories);
        return response()->json([
            'categories' =>  $categories
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:50|unique:categories'
        ]);

            $category = New Category();
            $category ->name = $request->name;
            $category->save();
            return ['message', 'Category Created succesfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        return response()->json([
            'category' =>$category
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category ->save();
        // dd($category);
        return response()->json([
            'category' =>$category
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function delete_selected($ids) //deleted elected categoy
    {
        $all_ids = explode(',', $ids);
    //    dd($all_ids);
        foreach ($all_ids as $id){
            // dd($id);
            // echo $id;
            $category = Category::findOrFail($id);
            $category->delete();
        }
        
    }
}
