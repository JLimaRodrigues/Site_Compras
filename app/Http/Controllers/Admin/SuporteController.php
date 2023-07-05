<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suporte;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function index(){

        $suportes = Suporte::all();
        //dd($suportes);

        return view('admin.suporte.index', [
            'suportes' => $suportes
        ]);
    }

    public function criar()
    {
        return view('admin.suporte.criar');
    }

    public function registrar(Request $request, Suporte $suporte)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $suporte->create($data);

        return redirect()->route('suporte.index');
    }
}
