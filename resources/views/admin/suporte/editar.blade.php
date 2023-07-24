<h1>Editar Dúvida: {{ $suporte->id }}</h1>

<x-alert/>

<form action="{{ route('suporte.atualizar', $suporte->id) }}" method="POST">
    @method('PUT')
    @include('admin.suporte.partials.form', [
        'suporte' => $suporte
        ])
</form>