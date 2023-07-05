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

        return view('admin.suporte.index', compact('suportes'));
    }

    public function mostrar(string|int $id)
    {
        //Suporte::find($id);
        //Suporte::where('id', $id)->first();
        //Suporte::where('id', '!=', $id)->first();
        if(!$suporte = Suporte::find($id)){
            return back();
        }
        
        return view('admin.suporte.mostrar', compact('suporte'));
    }

    public function criar()
    {
        return view('admin.suporte.criar');
    }

    public function registrar(SuporteRequest $request, Suporte $suporte)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $suporte->create($data);

        return redirect()->route('suporte.index');
    }

    public function editar(Suporte $suporte, string|int $id)
    {
        if(!$suporte = Suporte::find($id)){
            return back();
        }

        return view('admin.suporte.editar', compact('suporte'));
    }

    public function atualizar(Request $request, Suporte $suporte, string|int $id)
    {
        if(!$suporte = $suporte->find($id)){
            return back();
        }

        // $suporte->assunto = $request->assunto;
        // $suporte->conteudo = $request->conteudo;
        // $suporte->save();

        $suporte->update($request->only([
            'assunto', 'conteudo'
        ]));

        return redirect()->route('suporte.index');
    }

    public function deletar(string|int $id)
    {
        if(!$suporte = Suporte::find($id)){
            return back();
        }

        $suporte->delete();

        return redirect()->route('suporte.index');
    }
}
