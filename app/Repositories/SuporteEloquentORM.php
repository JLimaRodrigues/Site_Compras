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

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $result = $this->model
                            ->where(function ($query) use ($filter){
                                    if($filter){
                                        $query->where('assunto', $filter->assunto);
                                        $query->orWhere('conteudo','like', "%{$filter->conteudo}%");
                                    }
                            })
                            ->paginate($totalPerPage, ['*'], 'page', $page);
       dd((new PaginationPresenter($result))->items());
                            return new PaginationPresenter($result);
    }

    /**
     * Método responsável por retornar registros referente a Model
     * @param string $filter
     * @return array
    */
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

    /**
     * Método responsável por retornar um único registro do banco
     * @param string $id
     * @return stdClass|null
    */
    public function get(string $id): stdClass|null
    {
        $suporte = $this->model->find($id);
        
        if(!$suporte){
            return null;
        }

        return (object) $suporte->toArray();
    }

    /**
     * Método responsável por deletar um registro no banco
     * @param string $id
     * @return void
    */
    public function deletar(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    /**
     * Método responsável por criar um registro no banco
     * @param object $dto
     * @return stdClass
    */
    public function criar(CriarSuporteDTO $dto): stdClass
    {
        $suporte = $this->model->create(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }

    /**
     * Método responsável por atualizar um registro no banco
     * @param object $dto
     * @return stdClass|null
    */
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