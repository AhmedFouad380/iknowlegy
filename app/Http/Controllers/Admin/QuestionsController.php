<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Careers;
use App\Models\Internship;
use App\Models\Questions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class QuestionsController extends Controller
{
    public function index(){

        return view('admin.Questions.index');
    }
    public function datatable(Request $request)
    {
        $data = Questions::orderBy('id', 'asc');

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
                $actions = ' <a href="' . url("Questions-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> '.__('lang.edit').' </a>';
                $actions .= ' <a href="' . url("Questions-Answers/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> '.__('lang.Answers').' </a>';
                return $actions;

            })


            ->rawColumns(['actions', 'checkbox', 'is_active' ])
            ->make();

    }

    public function store(Request $request){


        $data = new Questions();
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


        $data =  Questions::find($request->id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->is_active=$request->is_active;
        $data->save();

        return redirect('Questions_setting')->with('message', 'تم التعديل بنجاح ');
    }


    public function edit($id)
    {
        $employee = Questions::findOrFail($id);
        return view('admin.Questions.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Questions::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
