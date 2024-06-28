@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="my-3">Modifica progetto: {{$project->title}}</h2>
        @include('admin.projects.partials.form')
    </div>
</div>
@endsection