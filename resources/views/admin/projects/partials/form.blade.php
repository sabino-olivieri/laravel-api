<form
    action="{{ Request::route()->getName() === 'admin.project.create' ? route('admin.project.store') : route('admin.project.update', ['project' => $project->slug]) }}"
    method="post" class="text-center mb-3" enctype="multipart/form-data">
    @csrf

    @if (Request::route()->getName() === 'admin.project.edit')
        @method('PUT')
    @endif

    <div class="form-floating mb-3">
        <input type="text" class="form-control ms_form-control" id="title" placeholder="title" name="title"
            value="{{ old('title') ?: (Request::route()->getName() === 'admin.project.edit' ? $project->title : '') }}"
            required>
        <label for="title">Title</label>
    </div>
    @error('title')
        <div class="alert alert-danger">
            {{ $errors->get('title')[0] }}
        </div>
    @enderror

    <div class="form-floating mb-3">
        <select class="form-select ms_form-control" id="type_id" aria-label="Seleziona il tipo di progetto"
            name="type_id">
            <option value="">Seleziona</option>
            @foreach ($typeList as $type)
                <option value="{{ $type->id }}"
                    @if (Request::route()->getName() === 'admin.project.edit') @selected($type->id == $project->type_id) @endif>
                    {{ $type->name }}
                </option>
            @endforeach

        </select>
        <label for="floatingSelect">Seleziona il tipo di progetto</label>
    </div>
    @error('type_id')
        <div class="alert alert-danger">
            {{ $errors->get('type_id')[0] }}
        </div>
    @enderror

    <div class="form-floating mb-3">
        <input type="text" class="form-control ms_form-control" id="site_url" placeholder="site_url" name="site_url"
            value="{{ old('site_url') ?: (Request::route()->getName() === 'admin.project.edit' ? $project->site_url : '') }}">
        <label for="site_url">Link sito</label>
    </div>
    @error('site_url')
        <div class="alert alert-danger">
            {{ $errors->get('site_url')[0] }}
        </div>
    @enderror

    <div class="form-floating mb-3">
        <input type="date" class="form-control ms_form-control" id="start_date" placeholder="start_date"
            name="start_date"
            value="{{ old('start_date') ?: (Request::route()->getName() === 'admin.project.edit' ? $project->start_date : '') }}">
        <label for="start_date">Data inizio progetto</label>
    </div>
    @error('start_date')
        <div class="alert alert-danger">
            {{ $errors->get('start_date')[0] }}
        </div>
    @enderror

    <div class="form-floating mb-3">
        <input type="date" class="form-control ms_form-control" id="finish_date" placeholder="finish_date"
            name="finish_date"
            value="{{ old('finish_date') ?: (Request::route()->getName() === 'admin.project.edit' ? $project->finish_date : '') }}">
        <label for="finish_date">Data fine progetto</label>
    </div>
    @error('finish_date')
        <div class="alert alert-danger">
            {{ $errors->get('finish_date')[0] }}
        </div>
    @enderror

    <div class="form-floating mb-3">
        <textarea class="form-control ms_form-control" placeholder="description" id="floatingTextarea" name="description">{{ old('description') ?: (Request::route()->getName() === 'admin.project.edit' ? $project->description : '') }}</textarea>
        <label for="floatingTextarea">Descrizione</label>
    </div>
    @error('description')
        <div class="alert alert-danger">
            {{ $errors->get('description')[0] }}
        </div>
    @enderror

    <div class="text-start">

        <span>Scegli le tecnologie usate:</span>

        <ul class="list-group text-start w-100  my-3">
            @foreach ($technologiesList as $technology)
                <li class="list-group-item bg-transparent">

                    @if (Request::route()->getName() !== 'admin.project.edit')
                        <input class="form-check-input me-1" type="checkbox" value="{{ $technology->id }}"
                            id="checkbox-{{ $technology->id }}" name="technologies[]" @checked(in_array($technology->id, old('technologies', [])))>
                    @else
                        @if (old('technologies') !== null)
                            <input class="form-check-input me-1" type="checkbox" value="{{ $technology->id }}"
                                id="checkbox-{{ $technology->id }}" name="technologies[]" @checked(in_array($technology->id, old('technologies', [])))>
                        @else
                        <input class="form-check-input me-1" type="checkbox" value="{{ $technology->id }}"
                        id="checkbox-{{ $technology->id }}" name="technologies[]" @checked($project->technologies->contains($technology))>
                        @endif
                    @endif
                    <label class="form-check-label stretched-link text-white"
                        for="checkbox-{{ $technology->id }}">{{ $technology->name }}</label>
                </li>
            @endforeach

        </ul>
    </div>
    @error('technologies')
    <div class="alert alert-danger">
        {{ $errors->get('technologies')[0] }}
    </div>
@enderror

    <input type="file" class="form-control ms_form-control mb-3 ms_file" id="image" placeholder="image"
        name="image" value="{{ old('image') }}" id="ms_file" required>

    @error('image')
        <div class="alert alert-danger">
            {{ $errors->get('image')[0] }}
        </div>
    @enderror

    <img id="anteprimaImmagine" class="img-fluid d-block w-25 m-auto mb-3"
        src="{{ Request::route()->getName() === 'admin.project.edit' ? asset('storage/' . old('image', $project->image)) : '' }}">

    @if (Request::route()->getName() === 'admin.project.edit')
        <button type="reset" class="btn btn-outline-danger">Cancella</button>
    @endif

    <button type="submit" class="btn btn-outline-success">Salva</button>

</form>
