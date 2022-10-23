<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index(){

        return view('admin.Course.index');
    }
    public function datatable(Request $request)
    {
        $data = Course::orderBy('id', 'asc');
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

            ->editColumn('created_by', function ($row) {
                $data = $row->CreatedBy->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('updated_by', function ($row) {

                if($row->updated_by){
                    $data = $row->UpdatedBy->name;

                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('sub_category_id', function ($row) {

                if($row->SubCategory){
                    $data = $row->SubCategory->title;

                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('main_category_id', function ($row) {

                if($row->MainCategory){
                    $data = $row->MainCategory->title;

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
            ->editColumn('is_popular', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__("lang.inActive").'</div>';
                if ($row->is_popular == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Course-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })

            ->addColumn('lessons', function ($row) {
                $actions = ' <a href="' . url("Lessons/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i>' . __("lang.lessons") .'  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','is_popular', 'is_active' ,'lessons'])
            ->make();

    }

    public function store(Request $request){


        $data = new Course();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->ar_long_description=$request->ar_long_description;
        $data->en_long_description=$request->en_long_description;
        $data->price=$request->price;
        $data->time=$request->time;
        $data->instructor_id=$request->instructor_id;
        $data->main_category_id=$request->main_category_id;
        $data->sub_category_id=$request->sub_category_id;
        $data->is_active=$request->is_active;
        $data->slug=$request->slug;
        $data->image=$request->image;
//        $data->is_popular=$request->is_popular;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Course::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->ar_long_description=$request->ar_long_description;
        $data->en_long_description=$request->en_long_description;
        $data->price=$request->price;
        $data->time=$request->time;
        $data->instructor_id=$request->instructor_id;
        $data->main_category_id=$request->main_category_id;
        $data->sub_category_id=$request->sub_category_id;
        $data->is_active=$request->is_active;
        $data->slug=$request->slug;
        $data->image=$request->image;
//        $data->is_popular=$request->is_popular;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('Courses')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Course::findOrFail($id);
        return view('admin.Course.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Course::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
