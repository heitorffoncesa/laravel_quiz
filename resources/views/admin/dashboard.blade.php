@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visão Geral</h1>
@stop

@section('content')
    <div class="row">
        <!-- USERS -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countUsers ?? 0 }}</h3>

                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                    Ver mais <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- END USERS -->

        <!-- GAMES -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countGames ?? 0 }}</h3>

                    <p>Jogos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ver mais <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- END GAMES -->

        <!-- QUESTIONS -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countQuestions ?? 0 }}</h3>

                    <p>Perguntas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-question"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ver mais <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- END QUESTIONS -->

        <!-- CATEGORIES -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countCategories ?? 0 }}</h3>

                    <p>Categorias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-th-list"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ver mais <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- END CATEGORIES -->
    </div>
@stop

@section('css', '')

@section('js', '')
