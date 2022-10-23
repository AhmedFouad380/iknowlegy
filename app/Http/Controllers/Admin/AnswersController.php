<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AnswersController extends Controller
{
    public function index($id){
        $data = Questions::findOrFail($id);
        return view('admin.Answers.index',compact('data'));
    }
    public function datatable(Request $request)
    {
        $data = Answer::orderBy('id', 'asc')->where('question_id',$request->id);

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

//            ->addColumn('actions', function ($row) {
//                $actions = ' <a href="' . url("Questions-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> '.__('lang.edit').' </a>';
//                $actions .= ' <a href="' . url("Questions-Answers/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> '.__('lang.Answers').' </a>';
//                return $actions;
//
//            })


            ->rawColumns([ 'checkbox', 'is_active' ,'description' ])
            ->make();

    }




    public function destroy(Request $request)
    {
        try {
            Answer::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
