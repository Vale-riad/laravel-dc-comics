@extends('layouts.main')

@section('page-content')
<div class="container">
<h2>Ecco il tuo nuovo fumetto:</h2>
    <h2>Titolo{{$comic->title}}</h2>
    <img src="{{$comic->image}}" alt="Fumetto">
    <p>Descrizione:{{$comic->description}}</p>
    <p>Data di uscita:{{$comic->sale_date}}</p>
    <p>Tipo:{{$comic->Type}}</p>
    <p>Prezzo:{{$comic->price}}$</p>


    <a href="{{route('comics.index', $comic->id)}}" class="btn btn-primary">Torna alla Home</a>
</div>
@endsection