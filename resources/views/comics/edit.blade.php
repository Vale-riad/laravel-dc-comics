@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Modifica:{{$comic->title}}</h1>

        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="50" value="{{old('title',$comic->title)}}"required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="comic-book"{{old('type', $comic->type) === 'comic-book' ? 'selected' :null }}>Comic Book</option>
                    <option value="graphic-novel" {{old('type', $comic->type) === 'graphic-novel' ? 'selected' :null }}>Graphic Novel</option>
                </select>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie*</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" min="1" max="20" value="{{old('series',$comic->series)}}" required>
                @error('series')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data d'uscita*</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{old('sale_date',$comic->sale_date)}}">
                @error('sale_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo*</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price',$comic->price)}}" required>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{old('description',$comic->description)}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection