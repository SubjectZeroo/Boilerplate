@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">Crear nuevo Rol</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Crear Rol</li>
                </ol>
            </div>
    </div>
@stop

@section('content')
    <div class="card">
         <div class="card-header">
            <strong>Información Básica Rol</strong>
        </div>
        <x-form method="POST" action="{{ route('roles.store') }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre Rol</label>
                            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                            <input hidden name="guard_name" type="text" class="form-control" value="web">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-lg float-sm-right text-white" type="submit">
                    <i class="far fa-save"></i>
                    Crear Rol
                </button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-lg  float-sm-right text-white mr-2">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>
        </x-form>
    </div>
@stop
