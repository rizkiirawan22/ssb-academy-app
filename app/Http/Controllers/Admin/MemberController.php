<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $model = Member::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('photo', function ($model) {
                    return '<img class="img-circle" src="' . asset('storage/' . $model->photo) . '" width="40" height="40" alt="Foto">';
                })
                ->addColumn('status', function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge badge-pill badge-warning">Menunggu Keputusan</span>';
                    } elseif ($model->status == 2) {
                        return '<span class="badge badge-pill badge-success">Anggota</span>';
                    }
                })
                ->addColumn('action', function ($model) {
                    $btn = '<a href="' . route('admin.anggota.accept', $model->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-check"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.anggota.show', $model->id) . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['photo', 'status', 'action'])
                ->make(true);
        }
        return view('pages.admin.member.index');
    }

    public function show($id)
    {
        $member = Member::find($id);
        return view('pages.admin.member.show', compact('member'));
    }

    public function memberAccept($id)
    {
        $member = Member::find($id);
        $member->update([
            'status' => 2
        ]);
        return redirect()->route('admin.anggota.index')->with('success', 'Data Telah Diperbaharui');
    }
}
