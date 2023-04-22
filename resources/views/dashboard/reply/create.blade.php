@extends('dashboard.master')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('reply.store') }}" method="post">
        @include('dashboard.reply._form')
    </form>
@endsection