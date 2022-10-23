<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareersCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CareersCategoriesController extends Controller
{
    public function index(){

        return view('admin.CareersCategory.index');
    }
    public function datatable(Request $request)
    {
        $data = CareersCategory::orderBy('id', 'asc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })



            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__("lang.inactive").'</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("CareersCategories-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })


            ->rawColumns(['actions', 'checkbox', 'is_active' ])
            ->make();

    }

    public function store(Request $request){


        $data = new CareersCategory();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->is_active=$request->is_active;
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  CareersCategory::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->is_active=$request->is_active;
        $data->save();

        return redirect('CareersCategory')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = CareersCategory::findOrFail($id);
        return view('admin.CareersCategory.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            CareersCategory::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
