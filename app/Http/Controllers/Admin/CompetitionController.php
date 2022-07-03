<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $model = Competition::all();
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
        return view('pages.admin.competition.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'place' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        Competition::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'place' => $request->place,
                'date' => $request->date,
                'description' => $request->description,
            ]
        );
        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $competition = Competition::find($id);
        return response()->json($competition);
    }

    public function destroy($id)
    {
        Competition::find($id)->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
