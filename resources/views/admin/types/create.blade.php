@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <h2 class="mb-3">Aggiungi nuovo tipo</h2>
    <form action="{{ route('admin.type.store')}}" method="post" class="text-center">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control ms_form-control" id="name" placeholder="name" name="name"
                value="{{ old('name')}}"
                required>
            <label for="name">Nome tipo</label>
        </div>
        @error('name')
            <div class="alert alert-danger">
                {{ $errors->get('name')[0] }}
            </div>
        @enderror


        <button type="submit" class="btn btn-outline-success">Aggiungi</button>
    </form>
</div>
@endsection