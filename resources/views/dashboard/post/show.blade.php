@extends('dashboard.master')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Volver</a>
        <h2>Nombre del Post: {{ $post->name }}</h2>
        <p>Descripción: {{ $post->description }}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>text</td>
                    <td>Fecha de Creacion</td>
                    <td>Fecha de Modificacion</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                    <tr>
                        <td>{{ $reply->text }}</td>
                        <td>{{ $reply->created_at->format('d-m-Y') }}</td>
                        <td>{{ $reply->updated_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
