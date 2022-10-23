<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class LessonsController extends Controller
{
    public function index($id){
        $Course = Course::findOrFail($id);
        return view('admin.Lesson.index',compact('id','Course'));
    }
    public function datatable(Request $request)
    {
        $data = Lesson::orderBy('id', 'asc')->where('course_id',$request->course_id);
        if($request->instructor_id){
            $data->where('instructor_id',$request->instructor_id);
        }
            return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })


            ->editColumn('course_id', function ($row) {

                if($row->Course){
                    $data = $row->Course->title;

                    return $data;
                }else{
                    return '';
                }
            })

            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__("lang.inActive").'</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })


                ->addColumn('actions', function ($row) {
                    $actions = ' <a href="' . url("Lesson-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                    return $actions;

                })
            ->rawColumns(['actions', 'checkbox', 'is_active' ])
            ->make();

    }

    public function store(Request $request){


        $data = new Lesson();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->sort=$request->sort;
        $data->is_active=$request->is_active;
        $data->image=$request->image;
            $data->course_id=$request->course_id;
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Lesson::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->sort=$request->sort;
        $data->is_active=$request->is_active;
        $data->image=$request->image;
        $data->video=$request->video;
        $data->course_id=$request->course_id;
        $data->save();

        return redirect('Lessons',$data->course_id)->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Lesson::findOrFail($id);
        return view('admin.Lesson.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Lesson::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
