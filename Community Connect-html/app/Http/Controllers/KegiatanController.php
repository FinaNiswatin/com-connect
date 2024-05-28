<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function store(Request $request){
        $path = $request->file('gambar_kegiatan')->store('kegiatan_image', 'public');
        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan, 
            'lokasi_kegiatan' => $request->lokasi_kegiatan,
            'gambar_kegiatan' => $path,
            'kategori' => $request->kategori,
            'kode_unik' => Str::random(5),
            'jumlah_point' => $request->jumlah_point,
            'jumlah_relawan' => $request->jumlah_relawan,
            'status' => $request->status,
        ]);
        
        return back();
    }
    public function update(Request $request, $id){
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->kategori = $request->kategori;
        $kegiatan->jumlah_relawan = $request->jumlah_relawan;
        $kegiatan->status = $request->status;
        $kegiatan->update();
        return  back()->with('success', ' Kegiatan sudah diperbaharui');
    }
    public function delete ($id){
        $Kegiatan = Kegiatan::findOrFail($id);
        Storage::delete('public/' . $Kegiatan->gambar_kegiatan);
        $Kegiatan->delete();
        return  back()->with('success', ' Kegiatan sudah dihapus');
    }
}
