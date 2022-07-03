<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Finance::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('type', function ($model) {
                    if ($model->type == 'income') {
                        return 'Pemasukan';
                    } else if ($model->type == 'expense') {
                        return "Pengeluaran";
                    }
                })
                ->addColumn('action', function ($model) {
                    $btn = '<button type="button" id="edit" class="btn btn-warning btn-sm" value="' . $model->id . '"><i class="fas fa-pencil-alt"></i></button>';
                    $btn = $btn . '<button type="button" id="delete" class="btn btn-danger btn-sm" value="' . $model->id . '"><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.finance.index');
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
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        Finance::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'type' => $request->type,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
            ]
        );
        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finance = Finance::find($id);
        return response()->json($finance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Finance::find($id)->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
