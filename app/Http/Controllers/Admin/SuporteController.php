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

        return view('site.admin.suporte.index', [
            'suportes' => $suportes
        ]);
    }
}
