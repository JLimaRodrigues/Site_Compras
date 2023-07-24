@csrf()
<input type="text" name="assunto" placeholder="Assunto" value="{{ $suporte->assunto ?? old('assunto') }}">
<textarea name="conteudo" cols="30" rows="5" placeholder="Descrição">{{ $suporte->conteudo ?? old('conteudo') }}</textarea>
<button type="submit">Enviar</button>
<a href="{{ route('suporte.index') }}">Cancelar</a>