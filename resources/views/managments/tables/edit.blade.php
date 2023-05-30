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
                                        <i class="fas fa-edit fa-x2"></i> Modifier table {{$table->name}}
                                    </h3>
                                </div>
                                <form action={{ route('tables.update', $table->slug) }} method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">name : </label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$table->name}}" placeholder="name de table">
                                        @error('name')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option value="" disabled>disponibilité</option>
                                            <option {{$table->status === 1 ? 'selected' : ''}} value="1">Oui</option>
                                            <option {{$table->status === 0 ? 'selected' : ''}}value="0">Non</option>
                                        </select>
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
