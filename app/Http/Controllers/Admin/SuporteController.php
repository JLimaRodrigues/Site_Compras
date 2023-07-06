<?php

namespace App\Http\Controllers\Admin;

use App\DTO\{CriarSuporteDTO, AtualizarSuporteDTO};
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

        return view('admin.suporte.index', compact('suportes'));
    }

    public function mostrar(string $id)
    {
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
        $this->service->novo(
            CriarSuporteDTO::makeFromRequest($request)
        );

        return redirect()->route('suporte.index');
    }

    public function editar(string $id)
    {
        if(!$suporte = $this->service->get($id)){
            return back();
        }

        return view('admin.suporte.editar', compact('suporte'));
    }

    public function atualizar(SuporteRequest $request)
    {

        $suporte = $this->service->atualiza(
            AtualizarSuporteDTO::makeFromRequest($request)
        );

        if(!$suporte){
            return back();
        }

        return redirect()->route('suporte.index');
    }

    public function deletar(string|int $id)
    {
        $this->service->deletar($id);

        return redirect()->route('suporte.index');
    }
}
