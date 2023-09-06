<?php

namespace App\Http\Controllers\Admin;

use App\DTO\{CriarSuporteDTO, AtualizarSuporteDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\SuporteRequest;
use App\Models\Suporte;
use App\Services\SuporteService;
use Illuminate\Http\Request;

/**
 * classe SuporteController
 * @author Jefferson Lima Rodrigues
*/
class SuporteController extends Controller
{

    public function __construct(
        protected SuporteService $service
    ){}

    //Método responsável por retornar a página inicial dos suportes
    public function index(Request $request)
    {

        $suportes = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 10),
            filter: $request->filter
        );
        
        return view('admin.suporte.index', compact('suportes'));
    }

    //método resonsável por mostrar detalhes especificos de um suporte
    public function mostrar(string $id)
    {
        if(!$suporte = $this->service->get($id)){
            return back();
        }
        
        return view('admin.suporte.mostrar', compact('suporte'));
    }

    //método responsável por retornar a view de criação de um suporte
    public function criar()
    {
        return view('admin.suporte.criar');
    }

    //método responsável por registrar um suporte no banco
    public function registrar(SuporteRequest $request, Suporte $suporte)
    {
        $this->service->criar(
            CriarSuporteDTO::makeFromRequest($request)
        );

        return redirect()->route('suporte.index');
    }

    //método responsável por retornar a view de edição de um suporte
    public function editar(string $id)
    {
        if(!$suporte = $this->service->get($id)){
            return back();
        }

        return view('admin.suporte.editar', compact('suporte'));
    }

    //método responsável por atualizar o registro do suporte no banco
    public function atualizar(SuporteRequest $request)
    {

        $suporte = $this->service->atualizar(
            AtualizarSuporteDTO::makeFromRequest($request)
        );

        if(!$suporte){
            return back();
        }

        return redirect()->route('suporte.index');
    }

    //método responsável por deletar o registro de suporte no banco
    public function deletar(string|int $id)
    {
        $this->service->deletar($id);

        return redirect()->route('suporte.index');
    }
}
