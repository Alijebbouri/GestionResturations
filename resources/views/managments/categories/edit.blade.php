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
                                        <i class="fas fa-edit fa-x2"></i> Modifier Categories {{$category->title}}
                                    </h3>
                                </div>
                                <form action={{ route('categories.update', $category->slug) }} method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title : </label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}" placeholder="le titre de categorie">
                                        @error('title')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="slug">Slug : </label>
                                        <input type="text" class="form-control" name="slug" id="slug" value="{{$category->slug}}" placeholder="le slug de categorie" >
                                        @error('slug')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div> --}}
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
