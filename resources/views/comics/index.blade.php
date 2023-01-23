@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Lista Fumetti</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Serie</th>
                <th scope="col">Data Vendita</th>
                <th scope="col">Tipo</th>
                <th scope="col" class="text-center">Azione</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{$comic->id}}</th>
                    <td>{{$comic->title}}</td>
                    <td>{{$comic->series}}</td>
                    <td>{{$comic->sale_date}}</td>
                    <td>{{$comic->type}}</td>
                    <td >
                    <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary">Vedi</a>
                    <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-warning">Modifica</a>
                    <td>
                    <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                        onclick="ConfirmDelete()">Cancella</button>
                    </form>
                </td>
                </tr>
        
                @endforeach
            </tbody>
        </table>
        <a href="{{route('comics.create', $comic->id)}}" class="btn btn-primary">Crea un nuovo fumetto</a>
                
    </div>
@endsection  