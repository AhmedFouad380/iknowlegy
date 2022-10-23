<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Careers;
use App\Models\CareersCity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CareersController extends Controller
{
    public function index(){

        return view('admin.Careers.index');
    }
    public function datatable(Request $request)
    {
        $data = Careers::orderBy('id', 'asc');

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
                $actions = ' <a href="' . url("Careers-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                $actions .= ' <a href="' . url("Careers-applications/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> '.__('lang.applications').' </a>';

                return $actions;

            })


            ->rawColumns(['actions', 'checkbox', 'is_active' ])
            ->make();

    }

    public function store(Request $request){


        $data = new Careers();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_company=$request->ar_company;
        $data->en_company=$request->en_company;
        $data->is_active=$request->is_active;
        $data->city_id=$request->city_id;
        $data->category_id=$request->category_id;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Careers::find($request->id);
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->ar_company=$request->ar_company;
        $data->en_company=$request->en_company;
        $data->is_active=$request->is_active;
        $data->city_id=$request->city_id;
        $data->category_id=$request->category_id;
        $data->ar_description=$request->ar_description;
        $data->en_description=$request->en_description;
        $data->image=$request->image;
        $data->save();

        return redirect('Careers_setting')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Careers::findOrFail($id);
        return view('admin.Careers.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Careers::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
