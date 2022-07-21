<!-- 
|/*
|--------------------------------------------------------------------------
| Plantilla de gerente de Adminlte
|--------------------------------------------------------------------------
|
| Plantilla de la que se heredan las demás vistas del gerente.
|
|*/ -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2>Bienvenido gerente</h2>
@stop

@section('content')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop