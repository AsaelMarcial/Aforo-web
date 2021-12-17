@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.commerces.create')}}">Nuevo Comercio</a>
    <h1>Lista de Comercios</h1>
@stop

@section('content')
    @livewire('admin.commerces-index')
@stop

