<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function register()
    {
        $user = User::where('email', auth()->user()->email)->first();
        return view('pages.member.member.register', compact('user'));
    }

    public function registerStore(Request $request)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'guardian_phone' => 'required',
            'photo' => 'required|image|file|mimes:jpg,jpeg,png|max:5120',
            'birth_certificate' => 'required|file|mimes:jpg,jpeg,pdf|max:5120',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['photo'] = $request->file('photo')->store('member/photo');
        $validatedData['birth_certificate'] = $request->file('birth_certificate')->store('member/birth-certificate');
        $validatedData['status'] = 1;
        $validatedData['user_id'] = auth()->user()->id;
        $store = Member::create($validatedData);
        if ($store) {
            return redirect()->route('anggota.personalData')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('anggota.personalData');
        }
    }

    public function personalData()
    {
        $member = Member::where('email', auth()->user()->email)->first();
        return view('pages.member.member.personal-data', compact('member'));
    }

    public function profile()
    {
        $member = Member::where('email', auth()->user()->email)->first();
        return view('pages.member.member.profile', compact('member'));
    }
}
