@extends('dashboard.master')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <form action="{{ route("reply.update",$reply->id) }}" method="post">
        @method('PUT')
        @include('dashboard.reply._form')
    </form>
@endsection