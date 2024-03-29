<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/student');
    }


    public function store(Request $request)
    {
        return StudentFacade::store($request->all());
    }

    public function list(Request $request)
    {
        $stu = StudentFacade::all();
        return response()->json($stu);
    }

    public function get($student_id)
    {
        $stu = StudentFacade::get($student_id);
        return response()->json($stu);
    }

    public function delete($student_id)
    {
        return StudentFacade::delete($student_id);
    }

    public function status($student_id)
    {
        return StudentFacade::status($student_id);
    }

    public function update(Request $request, $id)
    {
        return StudentFacade::update($request->all(), $id);
    }

    public function save(Request $request)
    {
        $image_path = $this->uploadImage($request);
        return StudentFacade::save($request->all(), $image_path);
    }

    private function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            return 'images/' . $imageName;
        }
        return null;
    }

}
