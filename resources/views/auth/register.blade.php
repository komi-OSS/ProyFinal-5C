@extends('layouts.app')

@section('titulo', 'BiblioPlus - Registro')

@section('nav')
<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/">Inicio<br></a></li>
        <!-- <li><a href="#speakers">Speakers</a></li> -->
        <li><a href="">Iniciar sesión</a></li>
        <li><a href=" {{route('usuarios.create')}} " class="active">Registrarse</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
@endsection

@section('title-page', 'Registro de usuario')

@section('content')
<div class="container">
    <h2>Registrar Nuevo Usuario</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
            @error('usuario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena" required>
            @error('contrasena')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
            @error('apellido_paterno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}">
            @error('apellido_materno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="numero_celular">Número Celular</label>
            <input type="text" class="form-control @error('numero_celular') is-invalid @enderror" id="numero_celular" name="numero_celular" value="{{ old('numero_celular') }}">
            @error('numero_celular')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}">
            @error('correo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="tipo_usuario">Tipo de Usuario</label>
            <select class="form-control @error('tipo_usuario') is-invalid @enderror" id="tipo_usuario" name="tipo_usuario" required>
                <option value="">Seleccione un tipo</option>
                <option value="bibliotecario" {{ old('tipo_usuario') == 'bibliotecario' ? 'selected' : '' }}>Bibliotecario</option>
                <option value="estudiante" {{ old('tipo_usuario') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                <option value="docente" {{ old('tipo_usuario') == 'docente' ? 'selected' : '' }}>Docente</option>
                <option value="administrativo" {{ old('tipo_usuario') == 'administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="directivo" {{ old('tipo_usuario') == 'directivo' ? 'selected' : '' }}>Directivo</option>
                <option value="externo" {{ old('tipo_usuario') == 'externo' ? 'selected' : '' }}>Externo</option>
            </select>
            @error('tipo_usuario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="domicilio">Domicilio</label>
            <input type="text" class="form-control @error('domicilio') is-invalid @enderror" id="domicilio" name="domicilio" value="{{ old('domicilio') }}">
            @error('domicilio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="numero_control">Número de Control</label>
            <input type="text" class="form-control @error('numero_control') is-invalid @enderror" id="numero_control" name="numero_control" value="{{ old('numero_control') }}">
            @error('numero_control')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="{{ old('rfc') }}">
            @error('rfc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="ine">INE</label>
            <input type="text" class="form-control @error('ine') is-invalid @enderror" id="ine" name="ine" value="{{ old('ine') }}">
            @error('ine')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones">{{ old('observaciones') }}</textarea>
            @error('observaciones')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status_usuario">Status del Usuario</label>
            <select class="form-control @error('status_usuario') is-invalid @enderror" id="status_usuario" name="status_usuario" required>
                <option value="">Seleccione un status</option>
                <option value="activo" {{ old('status_usuario') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="sancionado" {{ old('status_usuario') == 'sancionado' ? 'selected' : '' }}>Sancionado</option>
                <option value="baja" {{ old('status_usuario') == 'baja' ? 'selected' : '' }}>Baja</option>
            </select>
            @error('status_usuario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
    </form>
</div>
@endsection