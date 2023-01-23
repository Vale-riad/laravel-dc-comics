@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Crea un nuovo fumetto</h1>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="50" alue="{{old('title')}}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="comic-book" {{old('type') == 'comic-book' ? 'selected' : null}} >Comic Book</option>
                    <option value="graphic-novel" {{old('type') == 'graphic-novel' ? 'selected' : null}}>Graphic Novel</option>
                </select>
                                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie*</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" min="1" max="20" value="{{old('series')}}" required>
                                    @error('series')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data d'uscita*</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{old('sale_date')}}">
                                @error('sale_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo*</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"alue="{{old('price')}}" required>
                                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description @error('description') is-invalid @enderror" name="description" rows="3">{{old('description')}}</textarea>
                                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection