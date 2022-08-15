<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Metode;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function get()
    {
        $metode = Metode::with([
            'aktivitas'=>function($query){
                return $query->whereYear('mulai', 2022);
            }
        ])->get()->toArray();
        $callback = function($a, $b){
            return $a['mulai'] > $b['mulai'];
        };
        foreach ($metode as $key => $value) {
            usort($value['aktivitas'], $callback);
            $metode[$key]['aktivitas'] = $value['aktivitas'];
        }
        return $metode;
    }

    public function create(Request $request)
    {
        Aktivitas::create([
            'aktivitas' => $request->post('aktivitas'),
            'mulai' => $request->post('mulai'),
            'selesai' => $request->post('selesai'),
            'id_metode' => $request->post('id_metode')
        ]);
        return response('Berhasil menambahkan data', 200);
    }
    
    public function find($id)
    {
        $find = Aktivitas::all()->find($id);
        return response($find, 200);
    }
    
    public function edit(Request $request)
    {
        // dd($request->all());
        Aktivitas::where('id', $request->post("id"))->update([
            'aktivitas' => $request->post('aktivitas'),
            'mulai' => $request->post('mulai'),
            'selesai' => $request->post('selesai'),
            'id_metode' => $request->post('id_metode')
        ]);
        return response('Berhasil mengubah data', 200);
    }
    
    public function delete(Request $request)
    {
        Aktivitas::where('id', $request->post("id"))->delete();
        return response('Berhasil menghapus data', 200);
    }
    
    public function setStatus(Request $request)
    {
        // dd($request->all());
        if ((int)$request->post('status') > 0) {
            Aktivitas::where('id', (int)$request->post("id"))->update([
                'status' => (int)$request->post('status')
            ]);
        }else{
            Aktivitas::where('id', (int)$request->post("id"))->update([
                'status' => 0
            ]);
        }
        return response('Berhasil mengubah status data', 200);
    }
}
