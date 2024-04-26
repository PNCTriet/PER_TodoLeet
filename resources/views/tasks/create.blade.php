{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Task</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/tasks">
            @csrf
            <div class="form-group mb-3">
                <label for="description">Task Description</label>
                <input class="form-control" name="description" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Task</button>
            </div>
        </form>
    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">New Task</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/tasks">
        @csrf
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Create Task</button>
        </div>
    </form>
</div>
@endsection
