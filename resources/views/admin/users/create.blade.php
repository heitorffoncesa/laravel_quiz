@extends('adminlte::page')

@section('title', 'Novo usuário')

@section('content_header')
    <h1>Novo usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-7 mx-auto">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        @include('admin.users.parts.form', ['new' => true])
                    </div>
                    <div class="card-footer text-center">
                        <input type="button"
                               class="btn btn-secondary"
                               value="Cancelar"
                               onclick="window.history.go(-1); return false;"
                        >
                        <input type="submit"
                               class="btn btn-success"
                               value="Salvar"
                        >
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ url('assets/admin/css/app.css') }}">
@endsection

@section('js', '')
