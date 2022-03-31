@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">Crear nuevo usuario</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Crear Usuario</li>
                </ol>
            </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Información Básica del Usuario</strong>
        </div>
        <x-form method="POST" action="{{ route('users.store') }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre Usuario</label>
                            <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email Usuario</label>
                            <input id="email" name="email" type="mail" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm">Confirmar Password</label>
                            <input id="password-confirm" name="password-confirm" class="form-control  {{ $errors->has('password-confirm') ? 'is-invalid' : '' }}" type="password">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">
                            Roles
                        </h6>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            @foreach ($roles as $role)
                                <div>
                                    <input type="checkbox" class="form-check-input mr-1" name="roles[]" value="{{ $role->id }}">
                                    <label>{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-lg float-sm-right text-white" type="submit">
                    <i class="far fa-save"></i>
                    Crear Usuario
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg  float-sm-right text-white mr-2">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
            </div>
        </x-form>
    </div>
@stop
