<h1>Nova dúvida</h1>

<x-alert/>

<form action="{{ route('suporte.registrar') }}" method="POST">
    <!-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> -->
    @include('admin.suporte.partials.form')
</form>