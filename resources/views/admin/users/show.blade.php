@extends('adminlte::page')

@section('title', 'Visualizar usuário')

@section('content_header')
    <h1>Visualizar usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-7 mx-auto">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#main" data-toggle="tab">Dados gerais</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="main">
                            <p>
                                <strong>ID:</strong>
                                {{ $user->id }}
                            </p>

                            <p>
                                <strong>UUID:</strong>
                                {{ $user->uuid }}
                            </p>

                            <p>
                                <strong>Nome:</strong>
                                {{ $user->name }}
                            </p>

                            <p>
                                <strong>E-mail:</strong>
                                {{ $user->email }}
                            </p>

                            <p>
                                <strong>Permissão:</strong>
                                {{ $user->role->name }}
                            </p>

                            <p>
                                <strong>Status:</strong>
                                {{ $user->isActive() ? 'Ativo' : 'Inativo' }}
                            </p>

                            <p>
                                <strong>Criado em:</strong>
                                {{ (new \Illuminate\Support\Carbon($user->created_at))->format('d/m/Y H:i') }}
                            </p>

                            <p>
                                <strong>Atualizado em:</strong>
                                {{ (new \Illuminate\Support\Carbon($user->updated_at))->format('d/m/Y H:i') }}
                            </p>

                            @if(!$user->isActive())
                                <p>
                                    <strong>Inativado em:</strong>
                                    {{ (new \Illuminate\Support\Carbon($user->deleted_at))->format('d/m/Y H:i') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    @if((!$user->isAdmin() && $user->isActive()) || $user->isLoggedInUser())
                        <a href="{{ route('admin.users.edit', $user->uuid) }}" class="btn btn-secondary">Editar</a>
                    @endif

                    @if(!$user->isAdmin())
                        @if($user->isActive())
                            <a href="#" onclick="document.getElementById('delete-form').submit(); return;"
                               class="btn btn-danger">Inativar</a>

                            <form id="delete-form" action="{{ route('admin.users.destroy', $user->uuid) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        @else
                            <a href="#" onclick="document.getElementById('activate-form').submit(); return;"
                               class="btn btn-success">Ativar</a>

                            <form id="activate-form" action="{{ route('admin.users.activate', $user->uuid) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ url('assets/admin/css/app.css') }}">
@endsection

@section('js', '')
