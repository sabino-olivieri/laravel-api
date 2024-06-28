@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <h2 class="mb-3">Aggiungi nuova tecnologia</h2>

        <form action="{{route('admin.technology.store')}}" method="post" class="text-center">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control ms_form-control" id="name" placeholder="name" name="name"
                    value="{{ old('name') }}" required>
                <label for="name">Nome</label>
            </div>
            @error('name')
                <div class="alert alert-danger">
                    {{ $errors->get('name')[0] }}
                </div>
            @enderror
            
            <div class="input-group mb-3">
                <input type="text" class="form-control ms_form-control" placeholder="Scegli un colore" aria-label="Scegli un colore" value="{{ old('color') ? 'Colore scelto: '.old('color') : 'Scegli un colore: #ff0000' }}" id="inputPicker" disabled>
                
                <input type="color" class="form-control form-control-color input-group-text ms_input-group-text" id="picker" value="{{old('color', '#ff0000')}}" name="color">
            </div>

            <button class="btn btn-outline-success" type="submit">Aggiungi</button>

        </form>

        <script>

        </script>

@endsection
