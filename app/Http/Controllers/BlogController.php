<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('user', 'category')->orderBy('id', 'desc')->get();
        //    dd($courses);
        return response()->json([
            'courses' => $courses,
        ], 200);
    }
    //get all categories
    public function all_categories()
    {
        $categories = Category::with('courses')->orderBy('id', 'desc')->get();
        // $categories = Category::all();
        //    dd($categories );
        return response()->json([
            'categories' => $categories,
        ], 200);
    }
    //get all course by category id
    public function category_courses($id)
    {
        $courses = Course::with('user', 'category')->where('category_id', $id)->orderBy('id', 'desc')->get();
        //    dd($courses);
        return response()->json([
            'courses' => $courses,
        ], 200);
    }
    //get all course by search index
    public function search_courses()
    {
        // $search = $request->search;/
        $search = \Request::get('s');
        if($search !=null) {
            $courses = Course::with('user', 'category')
                ->where('title','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->get();
            //    dd($courses);
                return response()->json([
                    'courses' => $courses,
                ], 200);
        }else{
            return $this->index();
        }       
        
    }
    public function latest_courses()
     {
        $courses = Course::with('user', 'category')->orderBy('id', 'desc')->get();
        //    dd($courses);
        return response()->json([
            'courses' => $courses,
        ], 200);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('user','category')->where('id', $id)->first();
        return response()->json([
            'course' => $course,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
