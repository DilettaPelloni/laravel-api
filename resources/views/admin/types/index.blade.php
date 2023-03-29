@extends('layouts.admin')

@section('page_name') | Types  @endsection

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
                <a href="{{ route('admin.types.create') }}" class="btn btn-primary text-light">
                    New type
                </a>
            </div>
            <div class="card">
                <div class="card-header">Type list</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($types as $type)
                            <li class="list-group-item p-4">
                                <strong>Name:</strong> {{ $type->name }}
                                <br>
                                <strong>Slug:</strong> {{ $type->slug }}

                                <div class="mt-3">
                                    <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-info text-light">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
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
                            </li>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection