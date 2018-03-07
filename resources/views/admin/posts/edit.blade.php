@extends('layouts.admin')
@section('title', $title)
@section('content.admin')
<div class="card">
    <div class="card-header">
        {{ $title }}
    </div><!-- .card-heade -->
    <form role="form" method="POST">
        <div class="card-body">
            @csrf
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label>Título</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <label>Contenido</label>
                <textarea name="content" rows="20" class="form-control">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Provincias</label>
                @include('shared.select-location', ['provinces' => $provinces, 'selected' => $post->province_id])
            </div>

            <div class="form-group">
                <label>Categoría</label>
                <select name="category_id" class="form-control">
                    <option value="" selected="selected">Ninguna</option>
                    @if($post->category_id != null)
                    <option value="{{ $post->category->id }}" selected="selected">{{ $post->category->name }}</option>
                    @endif
                    @foreach ($categories as $category)
                        @if ($post->category_id != $category->id)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div><!-- .card-body -->
        <div class="card-footer clearfix">
            <div class="float-left">
                <a href="{{ route('admin_posts_delete', ['id' => $post->id]) }}" class="btn btn-danger" role="button">Borrar</a>
            </div>
            <div class="float-right">
                <a href="{{ route('admin_posts') }}" class="btn btn-outline-secondary" role="button">Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div><!-- .card-footer -->
    </form>
</div><!-- .card -->
@endsection