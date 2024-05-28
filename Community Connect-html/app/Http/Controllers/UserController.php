<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\reward;
use App\Models\voucher;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function store (Request $request){
        User::create([
            'name' => $request->name,
            'usia' => $request->usia,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('/');
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $path = $request->file('profile_img')->store('user_image', 'public');
            $user->name = $request->name;
            $user->password = Hash::make($request->passwordnew);
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->usia = $request->usia;
            $user->profile_img = $path;
            $user->save();
        return redirect('/profile');
    }
    public function login (Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' =>'required'
        ]);
        if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->isAdmin == 1) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        } else {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
    } 
    session()->flash('error', ' Your Email/Password is wrong.');
    return back()->withInput(); 
    }
    public function Logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
    public function profile (){
        $user = Auth::user();
        $rewardHistory = User::with('reward')->find($user->id_users);
        return view('myprofile', compact('user','rewardHistory'));
    }
    public function claim( Request $request){
        $user = Auth::user();
        $Kegiatan = Kegiatan::where('kode_unik', $request->kode_unik)->first();
        $claimed = $user->kegiatan()
                ->where('kegiatan_id', $Kegiatan->id_kegiatan)
                ->where('claim', 1)
                ->exists();
        if ($claimed) {
            session()->flash('error', ' You have already claimed this Code.');
            return back()->withInput(); 
        }
        $user->point =  $user->point + $Kegiatan->jumlah_point;
        $user->save();
        $user->kegiatan()->updateExistingPivot($Kegiatan->id_kegiatan,['claim' => 1]);
        session()->flash('error', ' You  claimed this Code.');
        return back()->withInput();
    }
    public function poin (){
        $user = Auth::user();
        $pointHistory = $user->kegiatan()->where('claim', 1)->get();
        return view('poin', compact('user','pointHistory'));
    }
    public function claimReward($id){
        $user = Auth::user();
        $reward = reward::find($id);
        if ($user->point >= $reward->jumlah_point){
            $user->point -= $reward->jumlah_point;
            $user->save();
            $user->reward()->attach($reward->id_reward);
            session()->flash('error', ' Voucher berhasil di-claim!');
            return back();
        } else {
            session()->flash('error', ' Poin Anda tidak cukup untuk claim voucher ini.');
            return back()->withInput(); 
        }

    }
    public function history (){
        $user = Auth::user();
        $kegiatan = Kegiatan::all();
        return view('history', compact('user','kegiatan'));
    }
    public function JoinActivity ($id){
        $user = Auth::user();
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->user()->count() < $kegiatan->jumlah_relawan){
            $user->kegiatan()->attach($kegiatan->id_kegiatan);
            return  back()->with('success', ' Berhasil Daftar Kegiatan');
        } else {
            return  back()->with('success', ' Kegiatan sudah penuh');
        }

    }
}
