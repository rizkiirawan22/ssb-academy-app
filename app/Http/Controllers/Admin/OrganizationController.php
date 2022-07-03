<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $model = Organization::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('logo', function ($model) {
                    if (empty($model->logo)) {
                        return 'Belum Ada Logo';
                    }
                    return '<img class="img-circle" src="' . asset('storage/' . $model->logo) . '" width="40" height="40" alt="Logo">';
                })
                ->addColumn('vision', function ($model) {
                    return $model->vision;
                })
                ->addColumn('mission', function ($model) {
                    return $model->mission;
                })
                ->addColumn('action', function ($model) {
                    return '<a href="' . route('admin.organisasi.edit', $model->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->rawColumns(['logo', 'vision', 'mission', 'action'])
                ->make(true);
        }
        return view('pages.admin.organization.index');
    }

    public function edit($id)
    {
        $org = Organization::find($id);
        return view('pages.admin.organization.edit', compact('org'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'address' => 'required',
            'about' => 'required',
            'logo' => 'image|file|mimes:jpg,jpeg,png|max:5120',
        ];
        $validatedData = $request->validate($rules);
        $org = Organization::find($id);
        if ($request->file('logo')) {
            if ($request->logoOld) {
                Storage::delete($request->logoOld);
            }
            $validatedData['logo'] = $request->file('logo')->store('organization');
        }
        $update = $org->update($validatedData);
        if ($update) {
            return redirect()->route('admin.organisasi.index')->with('status', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('admin.organisasi.index');
        }
    }
}
