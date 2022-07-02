<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoachController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $model = Coach::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    $btn = '<button type="button" id="edit" class="btn btn-warning btn-sm" value="' . $model->id . '"><i class="fas fa-pencil-alt"></i></button>';
                    $btn = $btn . '<button type="button" id="delete" class="btn btn-danger btn-sm" value="' . $model->id . '"><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.coach.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        Coach::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );
        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $coach = Coach::find($id);
        return response()->json($coach);
    }

    public function destroy($id)
    {
        Coach::find($id)->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
