<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\reward;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index (){
        $user = User::all();
        $kegiatan = Kegiatan::all();
        return view('dashboard_admin', compact('user', 'kegiatan'));
    }
    public function user (){
        $user = User::all();
        return view('admin_user', compact('user'));
    }
    public function reward(){
        $reward = reward::all();
        return view('admin_reward', compact('reward'));
    }
    public function deleteUser ($id){
        $user = User::findOrFail($id);
        $user->delete();
        return  back()->with('success', ' User sudah dihapus');
    }
    public function editUser( Request $request ,$id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->usia = $request->usia;
        $user->isAdmin = $request->isAdmin;
        $user->update();
        return  back()->with('success', ' User sudah diperbaharui');

    }
}
