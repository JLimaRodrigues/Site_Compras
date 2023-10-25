<?php 

namespace App\DTO\Suportes;

use App\Http\Requests\SuporteRequest;
use App\Enums\SuporteStatus;

class CriarSuporteDTO 
{

    public function __construct(
        public string $assunto,
        public SuporteStatus $status,
        public string $conteudo
    ){}

    public static function makeFromRequest(SuporteRequest $request): self
    {
        return new self(
            $request->assunto,
            SuporteStatus::A,
            $request->conteudo
        );
    }
}

?>