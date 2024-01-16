@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-sm-6">
                                <div class="card">
                                    <a class="navbar-brand" href="products/{{$product->id}}">
                                        <img class="card-img-top" src="img/{{$product->photo}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <p class="card-text">{{$product->description}}</p>  
                                    
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Nenhum produto cadastrado.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
