@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="my-3">Lista progetti</h2>
        <div class="container-table mb-3">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Immagine</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Sito</th>
                        <th scope="col">Data inizio</th>
                        <th scope="col">Data fine</th>
                        <th scope="col">Azioni</th>
    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projectList as $project)
                    <tr>
                        <td class="align-middle"><img src="{{asset('storage/'.$project->image)}}" alt=""></td>
                        <td class="align-middle fw-bolder">{{$project->type_id}}</td>
                        <td class="align-middle fw-bolder">{{$project->title}}</td>
                        <td class="site align-middle""><a href="{{$project->site_url}}" target="blank">{{$project->site_url}}</a></td>
                        <td class="align-middle">{{$project->start_date}}</td> 
                        <td class="align-middle">{{$project->finish_date}}</td>
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{route('admin.project.show', ['project' => $project->slug])}}"><i class="fa-solid fa-info"></i></a>
                            <a class="btn btn-success" href="{{route('admin.project.edit', ['project' => $project->slug])}}"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{route('admin.project.destroy', ['project' => $project->slug])}}" method="post" class="d-inline-block ">
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
