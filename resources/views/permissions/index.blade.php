@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">Tabla Permisos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Permisos</li>
                </ol>
            </div>
        <div class="col-sm-2 d-flex align-items-center">
            <a href="{{ route('permissions.create') }}" class="btn btn-block btn-primary btn-lg text-white">
                <i class="fas fa-plus"></i>
                Crear Permiso
            </a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('permissions.datatables.table')
        </div>
    </div>
@stop
