<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        $Category = Category::findOrFail($id);
        return view('admin.SubCategory.index', compact('id', 'Category'));
    }

    public function datatable(Request $request)
    {
        $data = SubCategory::orderBy('id', 'asc');

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
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('updated_by', function ($row) {

                if ($row->updated_by) {
                    $data = $row->UpdatedBy->name;

                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">' . __("lang.active") . '</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">' . __("lang.inactive") . '</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("SubCategory-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active'])
            ->make();

    }

    public function store(Request $request)
    {


        $data = new SubCategory();
        $data->ar_title = $request->ar_title;
        $data->en_title = $request->en_title;
        $data->is_active = $request->is_active;
        $data->slug = $request->slug;
        $data->image = $request->image;
        $data->category_id = $request->category_id;
        $data->created_by = Auth::guard('admin')->id();
        $data->save();

        return back()->with('message', 'success');
    }


    public function update(Request $request)
    {

        $data = SubCategory::find($request->id);
        $data->ar_title = $request->ar_title;
        $data->en_title = $request->en_title;
        $data->is_active = $request->is_active;
        $data->slug = $request->slug;
        $data->image = $request->image;
        $data->updated_by = Auth::guard('admin')->id();
        $data->save();

        return redirect('SubCategories')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = SubCategory::findOrFail($id);
        return view('admin.SubCategory.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            SubCategory::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function GetSubCategory($id){
        $data = SubCategory::where('category_id',$id)->get();
        return view('admin.SubCategory.modelShow',compact('data'));
    }
    public function GetSubCategorySearch($id){
        $data = SubCategory::where('category_id',$id)->get();
        return view('admin.SubCategory.modelShow2',compact('data'));
    }

}
