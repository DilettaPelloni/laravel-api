@extends('layouts.admin')

@section('page_name') | New Project  @endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create new project</h1>
            <form
                action="{{ route('admin.projects.store') }}"
                method="POST"
                class="mt-5"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="mb-3 row">
                    <label for="title" class="col-form-label col-2">
                        Title*
                    </label>
                    <div class="col-10">
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control @error ('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            max="255"
                            required
                        >
                        @error('title')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="col-form-label col-2">
                        Description*
                    </label>
                    <div class="col-10">
                        <textarea
                            name="description"
                            id="description"
                            class="form-control @error ('description') is-invalid @enderror"
                            rows="6"
                            maxlength="3000"
                            required
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="link" class="col-form-label col-2">
                        Link*
                    </label>
                    <div class="col-10">
                        <input
                            type="text"
                            id="link"
                            name="link"
                            class="form-control @error ('link') is-invalid @enderror"
                            value="{{ old('link') }}"
                            max="255"
                            required
                        >
                        @error('link')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="img" class="col-form-label col-2">
                        Preview image*
                    </label>
                    <div class="col-10">
                        <input
                            type="file"
                            id="img"
                            name="img"
                            class="form-control @error ('img') is-invalid @enderror"
                            required
                            accept="image/*"
                        >
                        @error('img')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="type_id" class="col-form-label col-2">
                        Type
                    </label>
                    <div class="col-10">
                        <select class="form-select" id="type_id" name="type_id">
                            <option>Select a type</option>
                            @foreach ($types as $type)
                                <option
                                    value="{{ $type->id }}"
                                    {{ old('type_id') == $type->id ? 'selected' : '' }}
                                >
                                    {{ $type->name }}
                                </option>
                            @endforeach
                          </select>
                        @error('type_id')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-form-label col-2">
                        Technologies
                    </label>
                    <div class="col-10 d-flex align-items-center">
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="technologies[]"
                                    id="technology-{{ $technology->id }}"
                                    value="{{ $technology->id }}"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                >
                                <label
                                    class="form-check-label"
                                    for="technology-{{ $technology->id }}"
                                >
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('technologies')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="btn-box mt-5">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-warning text-light">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection