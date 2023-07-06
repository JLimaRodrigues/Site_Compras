<?php 

namespace App\Services;

use stdClass;

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

    public function novo(
        string $assunto,
        string $status,
        string $conteudo
    ): stdClass
    {
        return $this->repositorio->novo(
            $assunto,
            $status,
            $conteudo 
        );
    }

    public function atualiza(
        string $id,
        string $assunto,
        string $status,
        string $conteudo
    ): stdClass|null
    {
        return $this->repositorio->atualiza(
            $id,
            $assunto,
            $status,
            $conteudo 
        );
    }

    public function deletar(string $id): void
    {
        $this->repositorio->deletar($id);
    }
}

?>