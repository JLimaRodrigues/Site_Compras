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
        @foreach($suportes->items() as $suporte)
            <tr>
                <td>{{ $suporte->assunto }}</td>
                <td>{{ getStatusSuporte($suporte->status) }}</td>
                <td>{{ $suporte->conteudo }}</td>
                <td>  
                    <a href="{{ route('suporte.mostrar', $suporte->id) }}">Ir</a>
                    <a href="{{ route('suporte.editar', $suporte->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination :paginator="$suportes" :appends="$filters" />