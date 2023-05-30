@extends('layouts.app')
@section('content')
    <div class="container">
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
                                        <i class="fas fa-plus fa-x2"></i> Modofier Menu {{$menu->title}}
                                    </h3>
                                </div>
                                <form action={{route('menus.update',$menu->slug)}} method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Titre : </label>
                                        <input type="text" class="form-control" name="title" value={{$menu->title}} id="title" placeholder="le titre de menus">
                                        @error('title')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description : </label>
                                        <textarea name="description" id="description" class="form-control" cols="10" rows="" placeholder="Description de menus">{{$menu->description}}</textarea>
                                        @error('description')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div><br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" name="price" id="price" value={{$menu->price}} placeholder="Prix ..." >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                        @error('price')
                                                <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="my-2">
                                        <img src={{asset("images/menus/".$menu->image)}} alt={{$menu->title}} width='200' height='200' class='img-fluid'>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled>choisir une catégorie</option>
                                            @foreach ($categories as $categorie)
                                                <option {{$categorie->id === $menu->category_id ? "selected":""}}
                                                value={{$categorie->idCat}}>{{$categorie->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group mt-2">
                                        <input type="submit" name='send' class="btn btn-primary" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
