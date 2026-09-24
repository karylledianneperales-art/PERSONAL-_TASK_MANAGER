@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')
<div class="card-dark p-4 mx-auto" style="max-width:600px">
  <h4 class="mb-3">Edit Task</h4>
  <form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf @method('PUT')
    @include('tasks._form')
    <button class="btn btn-pink">Update</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
  </form>
</div>
@endsection