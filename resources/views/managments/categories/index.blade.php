@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($categories) <= 0)
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
                                        <i class="fas fa-th-list"></i> Categories
                                    </h3>
                                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <td>{{ $categorie->idCat }}</td>
                                                <td>{{ $categorie->title }}</td>
                                                <td>{{ $categorie->slug }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('categories.edit', $categorie->slug) }}" class="btn btn-primary mr-2">
                                                            <i class="fas fa-edit fa-x2"></i> Edit
                                                        </a>
                                                        <form id="{{ $categorie->idCat }}" action="{{ route('categories.destroy', $categorie->slug) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="event.preventDefault();
                                                                if (confirm('Vous voulez vraiment supprimer la catégorie?'))
                                                                    document.getElementById('{{ $categorie->idCat }}').submit();
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
