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
                                        <i class="fas fa-edit fa-x2"></i> Modifier Serveurs {{$servants->name}}
                                    </h3>
                                </div>
                                <form action={{ route('serveurs.update',['serveur' => $servants->idserv])}} method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">name : </label>
                                        <input type="text" class="form-control" value={{$servants->name}} name="name" id="name" placeholder="name de serveurs">
                                        @error('name')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address : </label>
                                        <input type="text" class="form-control" value={{$servants->address}} name="address" id="address" placeholder="Address ..." >
                                        @error('address')
                                            <span class='text-danger'>{{$message}}</span>
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
