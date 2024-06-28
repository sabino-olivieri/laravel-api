@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <h2 class="my-3">Lista tecnologie</h2>
        <div class="container-table mb-3">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Colore</th>
                        <th scope="col">Azioni</th>
    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologiesList as $technology)
                    <tr>
                        <td class="align-middle fw-bolder">{{ $technology->name }}</td>
                        <td class="align-middle">
                            <span class="tag-bg" style="background-color: {{$technology->color}} "></span>
                        </td>
                            
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{route('admin.technology.show', ['technology' => $technology->slug])}}"><i class="fa-solid fa-info"></i></a>
                            <a class="btn btn-success" href="{{route('admin.technology.edit', ['technology' => $technology->slug])}}"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{route('admin.technology.destroy', ['technology' => $technology->slug])}}" method="post" class="d-inline-block ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
    
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.partials.toast')
    
@endsection