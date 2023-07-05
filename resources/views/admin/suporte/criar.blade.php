<h1>Nova dúvida</h1>

<form action="{{ route('suporte.registrar') }}" method="POST">
    <!-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> -->
    @csrf()
    <input type="text" name="assunto" placeholder="Assunto">
    <textarea name="conteudo" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
    <a href="{{ route('suporte.index') }}">Cancelar</a>
</form>