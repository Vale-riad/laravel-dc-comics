@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Crea un nuovo fumetto</h1>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select" id="type" name="type">
                    <option value="comic-book">Comic Book</option>
                    <option value="graphic-novel">Graphic Novel</option>
                </select>
            </div>''
            <div class="mb-3">
                <label for="series" class="form-label">Serie*</label>
                <input type="text" class="form-control" id="series" name="series" min="1" max="20" required>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Serie*</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date"  required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo*</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection