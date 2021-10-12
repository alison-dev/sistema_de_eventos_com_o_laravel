@extends("layouts.main")

@section("title", "Produtos")

@section("content")

<h1>Tela de Produtos.</h1>

@if(!empty($busca))
    <p>O usuário pesquisou por: {{$busca}}.</p>
@endif

@endsection