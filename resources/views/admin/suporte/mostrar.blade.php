<h1>Detalhes da dúvida {{ $suporte->id }}</h1>

<a href="{{ route('suporte.index') }}">Voltar</a>

<ul>
    <li>Assunto: {{ $suporte->assunto }}</li>
    <li>Status: {{ getStatusSuporte($suporte->status) }}</li>
    <li>Descrição: {{ $suporte->conteudo }}</li>
</ul>

<form action="{{ route('suporte.deletar', $suporte->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>