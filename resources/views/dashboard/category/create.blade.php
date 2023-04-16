@extends('dashboard.master')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.category._form')
    </form>
@endsection