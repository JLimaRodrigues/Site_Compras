<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuporteRequest;
use App\Models\Suporte;
use App\Services\SuporteService;
use Illuminate\Http\Request;

class SuporteController extends Controller
{

    public function __construct(
        protected SuporteService $service
    ){}

    public function index(Request $request)
    {

        $suportes = $this->service->getAll($request->filter);
        //dd($suportes);

        return view('admin.suporte.index', compact('suportes'));
    }

    public function mostrar(string $id)
    {
        //Suporte::find($id);
        //Suporte::where('id', $id)->first();
        //Suporte::where('id', '!=', $id)->first();
        if(!$suporte = $this->service->get($id)){
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
        $data = $request->validated();
        $data['status'] = 'a';

        $suporte->create($data);

        return redirect()->route('suporte.index');
    }

    public function editar(string $id)
    {
        //if(!$suporte = Suporte::find($id)){
        if(!$suporte = $this->service->get($id)){
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

        $suporte->update($request->validated());

        return redirect()->route('suporte.index');
    }

    public function deletar(string|int $id)
    {
        $this->service->deletar($id);

        return redirect()->route('suporte.index');
    }
}
