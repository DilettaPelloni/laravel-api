@extends('layouts.admin')

@section('page_name') | Technologies  @endsection

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
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary text-light">
                    New technology
                </a>
            </div>
            <div class="card">
                <div class="card-header">Technologies list</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($technologies as $technology)
                            <li class="list-group-item p-4">
                                <strong>Name:</strong> {{ $technology->name }}
                                <br>
                                <strong>Slug:</strong> {{ $technology->slug }}

                                <div class="mt-3">
                                    <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info text-light">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning text-light">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Do you really want to delete this technology? You won\'t be able to recover it later')"
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