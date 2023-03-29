@extends('layouts.admin')

@section('page_name') | {{ $project->title }}  @endsection

@section('content')
<div class="container-fluid mt-4">

    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="btn-box py-3">
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
    <div class="card p-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @if (str_contains($project->img, 'https') )
                    <img src="{{ $project->img }}" alt="{{ $project->title }}" class="w-100">

                    @else
                        <img src="{{ asset('storage/'.$project->img) }}" alt="{{ $project->title }}" class="w-100">
                @endif
            </div>
            <div class="col-md-7">
                <h2>{{ $project->title }}</h2>
                <p><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
                <p>{{ $project->description }}</p>

                @if ($project->type)
                    <strong>Type:</strong>
                    <a href="{{ route('admin.types.show', $project->type->id)}}">{{ $project->type->name }}</a>
                @endif
                <div>
                    @if (count($project->technologies) > 0)
                        <strong>Technologies:</strong>
                        @foreach ($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', $technology->id) }}">#{{$technology->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection