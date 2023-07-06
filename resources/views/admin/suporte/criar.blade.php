<h1>Nova dúvida</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('suporte.registrar') }}" method="POST">
    <!-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> -->
    @csrf()
    <input type="text" name="assunto" placeholder="Assunto" value="{{ old('assunto') }}">
    <textarea name="conteudo" cols="30" rows="5" placeholder="Descrição">{{ old('conteudo') }}</textarea>
    <button type="submit">Enviar</button>
    <a href="{{ route('suporte.index') }}">Cancelar</a>
</form>