<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(){

        return view('admin.Category.index');
    }
    public function datatable(Request $request)
    {
        $data = Category::orderBy('id', 'asc');

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

            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__("lang.inactive").'</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('is_popular', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__("lang.inactive").'</div>';
                if ($row->is_popular == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Category-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })

            ->addColumn('subCategory', function ($row) {
                $actions = ' <a href="' . url("SubCategories/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i>' . __("lang.SubCategory") .'  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','is_popular', 'is_active' ,'subCategory'])
            ->make();

    }

    public function store(Request $request){


        $data = new Category();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->is_active=$request->is_active;
        $data->slug=$request->slug;
        $data->image=$request->image;
        $data->is_popular=$request->is_popular;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Category::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->is_active=$request->is_active;
        $data->slug=$request->slug;
        $data->image=$request->image;
        $data->is_popular=$request->is_popular;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('Categories')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Category::findOrFail($id);
        return view('admin.Category.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Category::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
