@extends('layouts.admin')

@section('page_name') | New Technology  @endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create new technology</h1>
            <form
                action="{{ route('admin.technologies.store') }}"
                method="POST"
                class="mt-5"
            >
                @csrf

                <div class="mb-3 row">
                    <label for="name" class="col-form-label col-2">
                        Name*
                    </label>
                    <div class="col-10">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error ('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            max="255"
                            required
                        >
                        @error('name')
                            <span class="d-block mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                

                <div class="btn-box mt-5">
                    <a href="{{ route('admin.technologies.index') }}" class="btn btn-warning text-light">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection