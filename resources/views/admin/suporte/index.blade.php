<h1>Listagem de Solicitações</h1>

<a href="{{ route('suporte.criar') }}">Criar Dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach($suportes as $suporte)
            <tr>
                <td>{{ $suporte->assunto }}</td>
                <td>{{ $suporte->status }}</td>
                <td>{{ $suporte->conteudo }}</td>
                <td>  
                    <a href="{{ route('suporte.mostrar', $suporte->id) }}">Ir</a>
                    <a href="{{ route('suporte.editar', $suporte->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>