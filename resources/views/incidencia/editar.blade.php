@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            <div class="card">
                <div class="card-header">Editar Incidencia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('incidencia_editar_update', ['id' => $incidencia->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="fecha_incidencia" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_incidencia" type="text" class="form-control{{ $errors->has('fecha_incidencia') ? ' is-invalid' : '' }}" name="fecha_incidencia" value="{{ $incidencia->fecha_incidencia }}">

                                @if ($errors->has('fecha_incidencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_incidencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prioridad" class="col-md-4 col-form-label text-md-right">{{ __('Prioridad') }}</label>

                            <div class="col-md-6">
                                <select id="prioridad" type="text" class="form-control{{ $errors->has('prioridad') ? ' is-invalid' : '' }}" name="prioridad" value="{{ old('prioridad') }}">
									<option selected="true" disabled>Seleccione la Prioridad</option>
									<option value="alta">Alta</option>
									<option value="media">Media</option>
									<option value="baja">Baja</option>
								</select>

                                @if ($errors->has('prioridad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prioridad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aula" class="col-md-4 col-form-label text-md-right">{{ __('Aula') }}</label>

                            <div class="col-md-6">
                                <select id="aula" type="text" class="form-control{{ $errors->has('aula') ? ' is-invalid' : '' }}" name="aula" value="{{ old('aula') }}">
									<option selected="true" disabled>Seleccione el Aula</option>
									<option value="aula 1">Aula 1</option>
									<option value="aula 2">Aula 2</option>
                                    <option value="aula 3">Aula 3</option>
                                    <option value="aula 4">Aula 4</option>
                                    <option value="aula 5">Aula 5</option>
                                    <option value="aula 6">Aula 6</option>
                                    <option value="aula 7">Aula 7</option>
                                    <option value="aula 8">Aula 8</option>
								</select>

                                @if ($errors->has('aula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('aula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asunto" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

                            <div class="col-md-6">
                                <input id="asunto" type="text" class="form-control{{ $errors->has('asunto') ? ' is-invalid' : '' }}" name="asunto" value="{{ $incidencia->asunto }}">

                                @if ($errors->has('asunto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('asunto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $incidencia->descripcion }}"></textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a class="btn btn-danger" href="{{ route('users_ver') }}">Atras</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
