<?php 

namespace App\Repositories;

use App\Repositories\SuporteRepositorioInterface;
use App\DTO\{CriarSuporteDTo, AtualizarSuporteDTO};
use App\Models\Suporte;
use stdClass;

class SuporteEloquentORM implements SuporteRepositorioInterface
{

    public function __construct(
        protected Suporte $model
    ){}

    public function getAll(string $filter = null): array
    {
        return $this->model
                            ->where(function ($query) use ($filter){
                                    if($filter){
                                        $query->where('assunto', $filter->assunto);
                                        $query->orWhere('conteudo','like', "%{$filter->conteudo}%");
                                    }
                            })
                            ->get()
                            ->toArray();
    }

    public function get(string $id): stdClass|null
    {
        $suporte = $this->model->find($id);
        
        if(!$suporte){
            return null;
        }

        return (object) $suporte->toArray();
    }

    public function deletar(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function criar(CriarSuporteDTO $dto): stdClass
    {
        $suporte = $this->model->create(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }

    public function atualizar(AtualizarSuporteDTO $dto): stdClass|null
    {
        if(!$suporte = $this->model->find($dto->id)){
            return null;
        }

        $suporte->update(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }
}
?>