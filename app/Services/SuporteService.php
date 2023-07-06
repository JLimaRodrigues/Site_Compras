<?php 

namespace App\Services;

use stdClass;
use App\DTO\CriarSuporteDTO;
use App\DTO\AtualizarSuporteDTO;

class SuporteService 
{

    protected $repositorio;

    public function __construct()
    {

    }

    public function getAll(string $filter = null): array
    {
        return $this->repositorio->getAll($filter);
    }

    public function get(string $id): stdClass|null
    {
        return $this->repositorio->get($id);
    }

    public function novo(CriarSuporteDTO $dto): stdClass
    {
        return $this->repositorio->novo($dto);
    }

    public function atualiza(AtualizarSuporteDTO $dto): stdClass|null
    {
        return $this->repositorio->atualiza($dto);
    }

    public function deletar(string $id): void
    {
        $this->repositorio->deletar($id);
    }
}

?>