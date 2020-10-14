@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @include('includes.message')
        
            <div class="card text-center">
                <div class="card-header">Tablon Principal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == 'administrador')
                    <h2>Bienvenido Administrador</h2>
                        <br>
                    @elseif(Auth::user()->role == 'profesor')
                    <h2>Bienvenido Profesor</h2>
                        <br>
                    @endif                     
                    <br>
                    <br>
                    <a class="btn btn-lg btn-success text-center" href="{{ route('CKEditor') }}">Mi Curriculum</a>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
