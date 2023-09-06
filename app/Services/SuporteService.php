<?php 

namespace App\Services;

use stdClass;
use App\DTO\{CriarSuporteDTO, AtualizarSuporteDTO};
use App\Repositories\SuporteRepositorioInterface;

/**
 * classe SuporteService
 * @author Jefferson Lima Rodrigues
*/
class SuporteService 
{

    public function __construct(
        protected SuporteRepositorioInterface $repositorio
    )
    {}

    public function paginate(
        int $page = 1,
        int $totalPerPage = 10,
        string $filter = null
    )
    {
        return $this->repositorio->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repositorio->getAll($filter);
    }

    public function get(string $id): stdClass|null
    {
        return $this->repositorio->get($id);
    }

    public function criar(CriarSuporteDTO $dto): stdClass
    {
        return $this->repositorio->criar($dto);
    }

    public function atualizar(AtualizarSuporteDTO $dto): stdClass|null
    {
        return $this->repositorio->atualizar($dto);
    }

    public function deletar(string $id): void
    {
        $this->repositorio->deletar($id);
    }
}

?>