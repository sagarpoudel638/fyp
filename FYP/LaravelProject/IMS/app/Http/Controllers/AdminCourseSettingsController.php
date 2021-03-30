<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Yajra\DataTables\DataTables;

class AdminCourseSettingsController extends Controller
{


    function AdminCourseSettingsDashboard()
    {
        $this->data['title'] = 'CourseDetails';
        $courseData = Course::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.AdminCourseSettings', compact('courseData'), $this->data);
    }

    function edit()
    {
        return view('admin.AdminEditCourseSettings');
    }

    function addCourse(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'Course' => 'required|min:3',
                'Fee' => 'required|min:3',

            ]);
            $data['Course'] = $request->Course;
            $data['Fee'] = $request->Fee;


            if (Course::create($data)) {
                return redirect()->route('course')->with('success', 'Record is Inserted');
            }
        }
    }

    public function deleteCourse(Request $request)
    {
        $id = $request->user_id;
        if(Course::findOrFail($id)->delete()){
            return redirect()->route('course')->with('success', 'Record is Deleted');
        }
    }

    public function editCourse(Request $request){
        $id= $request->user_id;
        $editRecord = Course::findOrFail($id);
        return view('AdminEditCourseSettings', compact('editCourse'));

    }
    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'Course' => 'required|min:3',
                'Fee' => 'required|min:3',

            ]);
            $data['Course'] = $request->Course;
            $data['Fee'] = $request->Fee;

            $id = $request->course_id;

            if(Course::where('id',$id)->update($data)){
                return redirect()->route('AdminCourseSettings')->with('success', 'Record is Updated');
            }
        }
    }







}




