<h1>Editar Dúvida: {{ $suporte->id }}</h1>

<form action="{{ route('suporte.atualizar', $suporte->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" name="assunto" value="{{ $suporte->assunto }}">
    <textarea name="conteudo" cols="30" rows="5" placeholder="Descrição">{{ $suporte->conteudo }}</textarea>
    <button type="submit">Enviar</button>
    <a href="{{ route('suporte.index') }}">Cancelar</a>
</form>