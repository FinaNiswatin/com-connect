<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function show(){
        $reward = reward::all();
        return view('rewards', compact('reward'));
    }
    public function store(Request $request){
        reward::create([
            'nama_reward' => $request->nama_reward,
            'jumlah_point' => $request->jumlah_point,
        ]);
        return  back()->with('success', ' Reward berhasil dibuat');
    }
    public function delete($id){
        $reward = reward::find($id);
        $reward->delete();
        return  back()->with('success', ' Reward sudah dihapus');
    }
    public function update(Request $request, $id){
        $reward = reward::findOrFail($id);
        $reward->nama_reward = $request->nama_reward;
        $reward->jumlah_point = $request->jumlah_point;
        $reward->update();
        return  back()->with('success', ' Reward sudah diperbaharui');
    }
}
