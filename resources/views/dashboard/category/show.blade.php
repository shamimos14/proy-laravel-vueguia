@extends('dashboard.master')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="name">Articulo</label><input readonly class="form-control" type="text" name="name"
                    id="name" value="{{ $category->name }}">
            </div>
        </div>

        <div class="row form-group">
            <label for="description">Contenido</label>
            <textarea readonly class="form-control" name="description" id="description" rows="10" rows="10"> {{ $category->description }}</textarea>
        </div>

    </form>
@endsection
