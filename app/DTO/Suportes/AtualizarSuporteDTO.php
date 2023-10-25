<?php 

namespace App\DTO\Suportes;

use App\Http\Requests\SuporteRequest;

class AtualizarSuporteDTO 
{

    public function __construct(
        public string $id,
        public string $assunto,
        public string $status,
        public string $conteudo
    ){}

    public static function makeFromRequest(SuporteRequest $request): self
    {
        return new self(
            $request->id,
            $request->assunto,
            'a',
            $request->conteudo
        );
    }
}

?>