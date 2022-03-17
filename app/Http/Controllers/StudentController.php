<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('students.index', compact('student'));
    }
    public function fetchStudent()
    {
        $student = Student::all();
        return response()->json([
            'student' => $student,
        ]);
    }
    public function getStudent($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }
    public function submitStudent(Request $request)
    {
        $student = Student::find($request->s_id);
        $student->s_name = $request->s_name;
        $student->s_dob = $request->s_dob;
        $student->s_from = $request->s_from;
        $student->s_school_name = $request->s_school_name;
        $student->s_fname = $request->s_fname;
        $student->s_fdob = $request->s_fdob;
        $student->s_fjob = $request->s_fjob;
        $student->s_mname = $request->s_mname;
        $student->s_mdob = $request->s_mdob;
        $student->s_mjob = $request->s_mjob;
        $student->s_status = $request->s_status;
        $student->save();
        return response()->json($student);
    }
    public function _addStudent(Request $request)
    {
        $student = new Student();
        $student->studentName = $request->studentName;
        $student->course = $request->course;
        $student->fee = $request->fee;
        $student->save();
        return response()->json($student);
    }
    public function addStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            's_name' => 'required|max:50',
            's_dob' => 'required',
            's_from' => 'required',
            's_school_name' => 'required',
            's_register_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $student = new Student();
            $student->s_name = $request->s_name;
            $student->s_dob = $request->s_dob;
            $student->s_from = $request->s_from;
            $student->s_status = $request->s_status;
            $student->s_school_name = $request->s_school_name;
            $student->s_register_date = $request->s_register_date;
            $student->s_fname = $request->s_fname;
            $student->s_fdob = $request->s_fdob;
            $student->s_fjob = $request->s_fjob;
            $student->s_mname = $request->s_mname;
            $student->s_mdob = $request->s_mdob;
            $student->s_mjob = $request->s_mjob;
            $student->subject_id = $request->subject_id;
            $student->score_id = $request->score_id;
            $student->attendance_id = $request->attendance_id;
            $student->grade_id = $request->grade_id;

            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'was add succesfully',
            ]);
        }
    }
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => 'was delete succesfully',
        ]);
    }
    public function cloneStudent($id)
    {
        $student = Student::find($id);
        $student->s_name = "Clone new Record ";
        $cloneStudent = $student->replicate();
        $cloneStudent->save();
        return response()->json([
            'status' => 200,
            'message' => 'was clone succesfully',
        ]);
    }
}