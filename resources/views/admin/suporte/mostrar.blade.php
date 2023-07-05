<h1>Detalhes da dúvida {{ $suporte->id }}</h1>

<a href="{{ route('suporte.index') }}">Voltar</a>

<ul>
    <li>Assunto: {{ $suporte->assunto }}</li>
    <li>Status: {{ $suporte->status }}</li>
    <li>Descrição: {{ $suporte->conteudo }}</li>
</ul>