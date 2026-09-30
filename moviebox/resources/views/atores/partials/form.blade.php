<div class="mb-3">
    <label for="name" class="form-label">Nome</label>

    <input
        type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $actor->name ?? '') }}"
    >

    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label for="birth_date" class="form-label">
        Data de nascimento
    </label>

    <input
        type="date"
        name="birth_date"
        id="birth_date"
        class="form-control @error('birth_date') is-invalid @enderror"
        value="{{ old(
            'birth_date',
            isset($actor) ? $actor->birth_date?->format('Y-m-d') : ''
        ) }}"
    >

    @error('birth_date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label for="nationality" class="form-label">
        Nacionalidade
    </label>

    <input
        type="text"
        name="nationality"
        id="nationality"
        class="form-control @error('nationality') is-invalid @enderror"
        value="{{ old('nationality', $actor->nationality ?? '') }}"
    >

    @error('nationality')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label for="biography" class="form-label">
        Biografia
    </label>

    <textarea
        name="biography"
        id="biography"
        rows="5"
        class="form-control @error('biography') is-invalid @enderror"
    >{{ old('biography', $actor->biography ?? '') }}</textarea>

    @error('biography')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label for="movies" class="form-label">
        Filmes
    </label>

    <select
        name="movies[]"
        id="movies"
        class="form-select @error('movies') is-invalid @enderror"
        multiple
    >
        @foreach($movies as $movie)
            <option
                value="{{ $movie->id }}"
                @selected(
                    in_array(
                        $movie->id,
                        old(
                            'movies',
                            isset($actor)
                                ? $actor->movies->pluck('id')->toArray()
                                : []
                        )
                    )
                )
            >
                {{ $movie->title }}
            </option>
        @endforeach
    </select>

    @error('movies')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
