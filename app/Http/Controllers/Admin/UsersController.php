<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.Users.index');
    }

    public function datatable(Request $request)
    {
        $data = User::orderBy('id', 'asc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })


            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder"> '. __("lang.active") .'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'. __("lang.active") .'</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("client-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:users',
            'code' => 'required',
            'address' => 'required',
            'is_active' => 'nullable|string',

        ]);


        $data = new User();
        $data->name=$request->name;
        $data->code=$request->code;
        $data->phone=$request->phone;
        $data->password=Hash::make($request->password);
        $data->email=$request->email;
        $data->is_active=$request->is_active;
        $data->address=$request->address;
        $data->image=$request->image;
        $data->save();

        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.Users.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $b = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => '',
            'phone' => 'required',
            'address' => 'required|string',
            'is_active' => 'nullable|string',

        ]);

        $data = User::find($request->id);

        if($request->password){
            $data->password=Hash::make($request->password);
        }
        $data->name=$request->name;
        $data->code=$request->code;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->is_active=$request->is_active;
        $data->address=$request->address;
        if($request->image) {
            $data->image = $request->image;
        }
        $data->save();

        return redirect('Students')->with('message', 'تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            User::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}
