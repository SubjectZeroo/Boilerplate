@extends('adminlte::page')

@section('title', 'Crear Permiso')

@section('content_header')
    <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">Crear nuevo Permiso</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Crear Permiso</li>
                </ol>
            </div>
    </div>
@stop

@section('content')
    </div><div class="card">
         <div class="card-header">
            <strong>Información Básica Permiso</strong>
        </div>
        <x-form method="POST" action="{{ route('permissions.store') }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre Permiso</label>
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
                    Crear Permiso
                </button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-lg  float-sm-right text-white mr-2">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>
        </x-form>
    </div>
@stop
