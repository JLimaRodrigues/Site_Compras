<?php 

namespace App\DTO;

use App\Http\Request\SuporteRequest;

class CriarSuporteDTO 
{

    public function __construct(
        public string $assunto,
        public string $status,
        public string $conteudo
    ){}

    public static function makeFromRequest(SuporteRequest $request): self
    {
        return new self(
            $request->assunto,
            'a',
            $request->conteudo
        );
    }
}

?>