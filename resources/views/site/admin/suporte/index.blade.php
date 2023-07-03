<h1>Listagem de Solicitações</h1>

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
                    >
                </td>
            </tr>
        @endforeach
    </tbody>
</table>