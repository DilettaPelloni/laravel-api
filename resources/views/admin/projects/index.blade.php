@extends('layouts.admin')

@section('page_name') | Projects  @endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-3">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary text-light">
                    New project
                </a>
            </div>

            <form action="{{ route('admin.projects.index') }}" method="GET">
                <div class="row mb-4">
                    <div class="col-5">
                        <input
                            type="text"
                            name="title"
                            placeholder="Find a project by title..."
                            class="form-control"
                            value="{{ request()->input('title') }}"
                        >
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">Project list ({{ count($projects) }})</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($projects as $project)
                            <li class="list-group-item p-4">
                                <strong>Title:</strong> {{ $project->title }}
                                <br>
                                <strong>Link:</strong>
                                <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
                                
                                <br>
                                <strong>Type:</strong>
                                @if ($project->type)
                                    <a href="{{ route('admin.types.show', $project->type->id) }}">{{ $project->type->name }}</a>
                                @else
                                    none
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info text-light">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning text-light">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.projects.destroy', $project->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Do you really want to delete this project? You won\'t be able to recover it later')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-light">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection