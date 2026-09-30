<div class="mb-3">

    <label for="title" class="form-label">
        Título
    </label>

    <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $movie->title ?? '') }}"
        class="form-control @error('title') is-invalid @enderror"
    >

    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="mb-3">

    <label for="director" class="form-label">
        Realizador
    </label>

    <input
        type="text"
        name="director"
        id="director"
        value="{{ old('director', $movie->director ?? '') }}"
        class="form-control @error('director') is-invalid @enderror"
    >

    @error('director')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="row">

    <div class="col-md-4 mb-3">

        <label for="year" class="form-label">
            Ano
        </label>

        <input
            type="number"
            name="year"
            id="year"
            value="{{ old('year', $movie->year ?? '') }}"
            class="form-control @error('year') is-invalid @enderror"
        >

        @error('year')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    <div class="col-md-4 mb-3">

        <label for="duration" class="form-label">
            Duração (minutos)
        </label>

        <input
            type="number"
            name="duration"
            id="duration"
            value="{{ old('duration', $movie->duration ?? '') }}"
            class="form-control @error('duration') is-invalid @enderror"
        >

        @error('duration')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    <div class="col-md-4 mb-3">

        <label for="genre_id" class="form-label">
            Género
        </label>

        <select
            name="genre_id"
            id="genre_id"
            class="form-select @error('genre_id') is-invalid @enderror"
        >

            <option value="">
                Selecione um género
            </option>

            @foreach($genres as $genre)

                <option
                    value="{{ $genre->id }}"
                    @selected(
                        old('genre_id', $movie->genre_id ?? '') == $genre->id
                    )
                >
                    {{ $genre->name }}
                </option>

            @endforeach

        </select>

        @error('genre_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>


<div class="mb-3">

    <label for="actors" class="form-label">
        Atores
    </label>

    <select
        name="actors[]"
        id="actors"
        multiple
        class="form-select @error('actors') is-invalid @enderror"
    >

        @foreach($actors as $actor)

            <option
                value="{{ $actor->id }}"
                @selected(
                    in_array(
                        $actor->id,
                        old(
                            'actors',
                            isset($movie)
                                ? $movie->actors->pluck('id')->toArray()
                                : []
                        )
                    )
                )
            >
                {{ $actor->name }}
            </option>

        @endforeach

    </select>

    @error('actors')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    @error('actors.*')
    <div class="text-danger">
        {{ $message }}
    </div>
    @enderror

</div>
