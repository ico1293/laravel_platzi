@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        </ul>
    </nav>
</div>

<div class="row">
    <form action="/messages/create" method="post">
        <!-- add this always you send a form in laravel  -->
        {{ csrf_field() }}
        <div class="form-group col-xs-12">
            <input type="text" name="message" class="form-control" placeholder="Qué estás pensando?">
        </div>
    </form>
</div>

<div class="row">
    @forelse($messages as $message)
        <div class="col-xs-6">
            <!-- we dont use $message like an array, else like an object  -->
            <img class="img-thumbnail" src="{{ $message->image }}">
            <p class="card-text">
                {{ $message->content }}
                <a href="/messages/{{ $message->id }}">Leer más</a>
            </p>
        </div>
    @empty
        <p>No hay mensajes destacados.</p>
    @endforelse
</div>

@endsection
