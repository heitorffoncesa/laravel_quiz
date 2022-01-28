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
                                <strong>ID:</strong> {{ $user->id }}
                            </p>

                            <p>
                                <strong>UUID:</strong> {{ $user->uuid }}
                            </p>

                            <p>
                                <strong>Nome:</strong> {{ $user->name }}
                            </p>

                            <p>
                                <strong>E-mail:</strong> {{ $user->email }}
                            </p>

                            <p>
                                <strong>Permissão:</strong> {{ $user->role->name }}
                            </p>

                            <p>
                                <strong>Status:</strong> {{ $user->isActive() ? 'Ativo' : 'Inativo' }}
                            </p>

                            <p>
                                <strong>Criado em:</strong> {{ $user->created_at }}
                            </p>

                            <p>
                                <strong>Atualizado em:</strong> {{ $user->updated_at }}
                            </p>

                            @if(!$user->isActive())
                                <p>
                                    <strong>Inativado em:</strong> {{ $user->deleted_at }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css', '')

@section('js', '')
