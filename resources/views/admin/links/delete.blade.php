@extends('layouts.admin')

@section('title', 'Delete link')

@section('content.admin')
<div class="posts panel panel-default">
    <div class="panel-heading">¿Estás seguro de que quieres eliminar éste enlace?</div>
    <div class="panel-body">
        <a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a>
    </div>
    <form class="panel-footer" role="form" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-4">
                <a href="{{ route('admin_links_edit', ['id' => $link->id]) }}" type="submit" class="btn btn-primary">Edit</a>
            </div>
            <div class="col-xs-8 text-right">
                <a href="{{ route('admin_links') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
</div><!-- .panel -->
@endsection