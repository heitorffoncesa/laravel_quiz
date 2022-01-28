@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Usuários</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success float-sm-right">
                <i class="fa fa-plus"></i>
                Criar usuário
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Permissão</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->role->name }}</td>
                                    <td class="text-center">
                                        @if(is_null($user->deleted_at))
                                            <span class="badge bg-success">Ativo</span>
                                        @else
                                            <span class="badge bg-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.show', $user->uuid) }}"
                                           class="btn btn-sm btn-secondary"
                                           title="Visualizar"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ url('assets/admin/css/app.css') }}">
@endsection

@section('js')
    <script type="text/javascript">
        $('table').DataTable({
            ordering: true,
            info: false,
            lengthChange: false,
            pageLength: 10,
            language: {
                sProcessing: "Processando...",
                sLengthMenu: "Exibir _MENU_ registros por página",
                sZeroRecords: "Nenhum resultado encontrado",
                sEmptyTable: "Nenhum resultado encontrado",
                sInfo: "Exibindo do _START_ até _END_ de um total de _TOTAL_ registros",
                sInfoEmpty: "Exibindo do 0 até 0 de um total de 0 registros",
                sInfoFiltered: "(Filtrado de um total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Carregando...",
                oPaginate: {
                    sFirst: "Primeiro",
                    sLast: "Último",
                    sNext: "Próximo",
                    sPrevious: "Anterior"
                },
                oAria: {
                    sSortAscending: ": Ativar para ordenar a coluna de maneira ascendente",
                    sSortDescending: ": Ativar para ordenar a coluna de maneira descendente"
                }
            }
        });
    </script>
@endsection
