<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PromoCodeController extends Controller
{
    public function index(){

        return view('admin.PromoCode.index');
    }
    public function datatable(Request $request)
    {
        $data = PromoCode::orderBy('id', 'asc');

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
                $actions = ' <a href="' . url("PromoCode-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active'])
            ->make();

    }

    public function store(Request $request){


        $data = new PromoCode();
        $data->code=$request->code;
        $data->price=$request->price;
        $data->start=$request->start;
        $data->end=$request->end;
        $data->max_used=$request->max_used;
        $data->is_active=$request->is_active;
        $data->type=$request->type;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  PromoCode::find($request->id);
        $data->code=$request->code;
        $data->price=$request->price;
        $data->start=$request->start;
        $data->end=$request->end;
        $data->max_used=$request->max_used;
        $data->is_active=$request->is_active;
        $data->type=$request->type;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('PromoCode')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = PromoCode::findOrFail($id);
        return view('admin.PromoCode.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            PromoCode::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
