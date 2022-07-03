<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Achievement::all();
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
        return view('pages.admin.achievement.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'champion' => 'required',
            'name' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        Achievement::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'champion' => $request->champion,
                'name' => $request->name,
                'date' => $request->date,
            ]
        );
        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::find($id);
        return response()->json($achievement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Achievement::find($id)->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
