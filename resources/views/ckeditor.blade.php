@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

           

            <div class="card text-center">
                <div class="card-header h1">Curriculum Vitae</div>
                <div class="card-body">
                    <form action="{{ route('curriculum_update') }}" method="POST">
                        @csrf
                        <textarea name="content">{{ Auth::user()->curriculum }}</textarea>
                        <br>
                        <div class="{{-- form-group row mb-0 --}}">
                            <div class="{{-- col-md-6 offset-md-0 --}}">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            <br>
                            <a class="btn btn-success text-center" href="{{ route('curriculum_pdf')}}">Generar PDF</a>
                         </div>
                    </form>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection