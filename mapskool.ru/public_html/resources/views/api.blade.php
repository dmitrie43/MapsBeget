@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content')
    @foreach($org as $orgs)
        <h1>JSON</h1>
            {{ json_encode($orgs, JSON_UNESCAPED_UNICODE) }}<br>
        <h1>Нужная инфа</h1>
            {{ $orgs->nameOrganization }}<br>
    @endforeach
        <h1></h1>
@stop