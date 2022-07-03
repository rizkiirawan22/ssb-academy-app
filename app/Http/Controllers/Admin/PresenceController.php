<?php

namespace App\Http\Controllers\Admin;

use App\Models\Presence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\PresenceDetail;
use Symfony\Component\VarDumper\VarDumper;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Presence::all();
            return Datatables()
                ->of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    $btn = "<a href='" . route('admin.absensi.show', $model->id) . "' class='btn btn-primary btn-sm' value='$model->id'><i class='fas fa-eye'></i></a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.presence.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::where('status', '=', '2')->get();
        return view('pages.admin.presence.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $presence = Presence::create($request->only('name', 'date'));
        $members = Member::where('status', '=', '2')->get();

        $i = 1;
        foreach ($members as $member) {
            PresenceDetail::create([
                "member_id" => $member->id,
                'presence_id' => $presence->id,
                'status' => "$request->status$i"
            ]);
            $i++;
        }

        return redirect()->route('admin.absensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presence = Presence::find($id);
        $presenceDetail = PresenceDetail::where('presence_id', '=', $presence->id)->get();
        return view('pages.admin.presence.show', compact('presence', 'presenceDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
