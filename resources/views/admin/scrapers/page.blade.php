@extends('layouts.admin')
@section('title', 'Scraper page')
@section('content.admin')
@if (isset($results))
<pre>
{{ var_dump($results) }}
</pre>
@endif
<form class="panel panel-default" role="form" method="POST">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3>Scraper page</h3>
            </div>
            <div class="col-md-2 text-right">
            </div>
        </div>
    </div><!-- .panel-heading -->
    <div class="panel-body">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label>Url</label>
            <input type="text" name="url" class="form-control" value="{{ $url ? $url : old('url') }}">
        </div>
        <div class="form-group{{ $errors->has('filter') ? ' has-error' : '' }}">
            <label>Filter</label>
            <input type="text" name="filter" class="form-control" value="{{ isset($filter) ? $filter : old('filter') }}">
        </div>
    </div><!-- .panel-body -->
    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 text-right">
                <button type="submit" class="btn btn-primary">Evaluate</button>
            </div>
    </div><!-- .panel-footer -->
</div><!-- .panel -->
@endsection