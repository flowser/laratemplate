<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $courses = Course::with('user', 'category')->get();
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
        $this->validate($request,[
            'title'=> 'required|min:2|max:50',
            'description'=>'required|min:2|max:1000',
        ]);

        $course = new Course();
        $course->title = $request ->title;
        $course->description = $request ->description;
        $course->category_id = $request ->category_id;
        $course->user_id = Auth::id();

        //processing photo nme and size
        $strpos = strpos($request->photo, ';'); //positionof image name semicolon
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $file = $request->file('photo');
        $S_Path = public_path()."/img/courses/small";
        $M_Path = public_path()."/img/courses/medium";
        $L_Path = public_path()."/img/courses/large";
            $img = Image::make($request->photo);
//            $img->crop(300, 150, 25, 25);
            $img ->resize(100, 100)->save($S_Path.'/'.$name);
            $img ->resize(250, 250)->save($M_Path.'/'.$name);
            $img ->resize(500, 500)->save($L_Path.'/'.$name);        
        $course->photo = $name;
        //end processing photo and size
        $course->save();






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
        $course = Course::findOrFail($id);
        //image inline with this course
        $S_Path = public_path()."/img/courses/small/";
        $M_Path = public_path()."/img/courses/medium/";
        $L_Path = public_path()."/img/courses/large/";

        $S_image = $S_Path. $course->photo;
        $M_image = $M_Path. $course->photo;
        $L_image = $L_Path. $course->photo;

        if(file_exists($S_image)){
            @unlink($S_image);  
        }
        if(file_exists($M_image)){  
            @unlink($M_image);
        }
        if(file_exists($L_image)){
            @unlink($L_image);
        }
        $course->delete();
    }
}
