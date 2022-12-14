<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DeleteRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $search = $request->get("q");
        $courses = Course::query()->where("name","like",'%'.$search.'%')->paginate(2);
        $courses->appends(['q' => $search]);

        return view("courses.index", [
            "courses" => $courses,
            "search" => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("courses.creat");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $course = new Course();
        $course->fill($request->validated());
        $course->save();

        return redirect()->route("courses.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view("courses.edit",[
            "course"=>$course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Course $course)
    {
        Course::where("id",$course->id)->update(
            $request->except([
                "_token",
                "_method",
            ]));
        return redirect()->route("courses.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request,$course)
    {
        Course::destroy($course);
        // n???u kh bi???n truy???n v??o kh??ng ph???i l?? 1 ?????i t?????ng th?? ta d??ng
        // Course::destroy();
        // Course::where("id",$course)->delete();
        return redirect()->route("courses.index");
    }
}
