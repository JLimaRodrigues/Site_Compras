<?php 

namespace App\Repositories;

use App\DTO\{CriarSuporteDTo, AtualizarSuporteDTO};
use App\Repositories\SuporteRepositorioInterface;

class SuporteEloquentORM implements SuporteRepositorioInterface
{
    public function getAll(string $filter = null): array
    {

    }

    public function get(string $id): stdClass|null
    {

    }

    public function deletar(string $id): void
    {

    }

    public function criar(CriarSuporteDTO $dto): stdClass
    {

    }

    public function atualizar(AtualizarSuporteDTO $dto): stdClass|null
    {

    }
}
?>