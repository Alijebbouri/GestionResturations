@extends('layouts.app')
@section('content')
<div class="container">
    @if(count($servants) <= 0)
        <div class="alert alert-danger" role="alert">
            <p>aucune catégorie dans la base de données</p>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-2">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-user-cog"></i> Serveurs
                                    </h3>
                                    <a href="{{ route('serveurs.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servants as $servant)
                                            <tr>
                                                <td>{{ $servant->idserv }}</td>
                                                <td>{{ $servant->name }}</td>
                                                <td>
                                                    @if ($servant->address)
                                                        {{ $servant->address }}
                                                    @else
                                                        <span class="text-danger">Not found</span>
                                                    @endif


                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('serveurs.edit', $servant->idserv) }}" class="btn btn-primary mr-2">
                                                            <i class="fas fa-edit fa-x2"></i> Edit
                                                        </a>
                                                        <form id="{{ $servant->idserv }}" action="{{ route('serveurs.destroy', $servant->idserv) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="event.preventDefault();
                                                                if (confirm('Vous voulez vraiment supprimer la catégorie?'))
                                                                    document.getElementById('{{ $servant->idserv }}').submit();
                                                                " class="btn btn-danger">
                                                                <i class="fas fa-trash fa-x2"></i> Supprimer
                                                            </button>
                                                        </form>
                                                    </div>
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
        </div>
    </div>
@endif
@endsection
