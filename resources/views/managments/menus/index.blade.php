@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($menus) <= 0)
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
                                        <i class="fas fa-clipboard-list"></i> Menu
                                    </h3>
                                    <a href="{{ route('menus.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>category_id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->id }}</td>
                                                <td>{{ $menu->title }}</td>
                                                <td>{{ $menu->description }}</td>
                                                <td>{{ $menu->price }}</td>
                                                <td>
                                                    <img src="{{ asset('images/menus/'.$menu->image) }}" alt="{{ $menu->image }}" class="img-fluid" width="60" height="60">                                                    
                                                </td>
                                                <td>{{ $menu->category_id }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('menus.edit', $menu->slug) }}" class="btn btn-primary mr-2">
                                                            <i class="fas fa-edit fa-x2"></i> Edit
                                                        </a>
                                                        <form id="{{ $menu->id }}" action="{{ route('menus.destroy', $menu->slug) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="event.preventDefault();
                                                                if (confirm('Vous voulez vraiment supprimer menu?'))
                                                                    document.getElementById('{{ $menu->id }}').submit();
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
