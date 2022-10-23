<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PagesController extends Controller
{
    public function index(){

        return view('admin.Pages.index');
    }
    public function datatable(Request $request)
    {
        $data = Page::orderBy('id', 'asc');

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
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Pages-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active'])
            ->make();

    }

    public function store(Request $request){


        $data = new Page();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->slug=$request->slug;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->is_active=$request->is_active;
        $data->type=$request->type;
        $data->created_by=Auth::guard('admin')->id();
        $data->image=$request->image;
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Page::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->slug=$request->slug;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->is_active=$request->is_active;
        $data->type=$request->type;        $data->updated_by=Auth::guard('admin')->id();
        $data->image=$request->image;
        $data->save();

        return redirect('Pages')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Page::findOrFail($id);
        return view('admin.Pages.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Page::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
