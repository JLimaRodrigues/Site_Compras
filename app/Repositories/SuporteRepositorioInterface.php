<?php 

namespace App\Repositories;

use App\DTO\{CriarSuporteDTO, AtualizarSuporteDTO};
use stdClass;

/**
 * Interface SuporteRepositorioInterface
 * @author Jefferson Lima Rodrigues
*/
interface SuporteRepositorioInterface
{
    public function getAll(string $filter = null): array;
    public function get(string $id): stdClass|null;
    public function deletar(string $id): void;
    public function criar(CriarSuporteDTO $dto): stdClass;
    public function atualizar(AtualizarSuporteDTO $dto): stdClass|null;
}