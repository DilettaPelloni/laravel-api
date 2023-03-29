@extends('layouts.admin')

@section('page_name') | {{ $type->name }}  @endsection

@section('content')
<div class="container-fluid mt-4">

    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="btn-box py-3">
        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning text-light">
            <i class="fa-solid fa-pencil"></i>
        </a>
        <form
            action="{{ route('admin.types.destroy', $type->id) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Do you really want to delete this type? You won\'t be able to recover it later')"
        >
            @csrf
            @method('DELETE')
            <button class="btn btn-danger text-light">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </form>
    </div>
    <div class="card p-5">
        <div class="row">
            <div class="col">
                <h2>{{ $type->name }}</h2>
                <p> <strong>Slug:</strong> {{ $type->slug }}</p>

                <h5>Associated projects ({{ $type->projects()->count() }})</h5>
                @if ( $type->projects()->count() > 0)
                <ul>
                    @foreach ($type->projects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show',$project->id ) }}">{{ $project->title }}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No project associated</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection