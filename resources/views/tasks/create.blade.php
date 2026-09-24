@extends('layouts.app')
@section('title', 'Add Task')
@section('content')
<div class="card-dark p-4 mx-auto" style="max-width:600px">
  <h4 class="mb-3">Add Task</h4>
  <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    @include('tasks._form')
    <button class="btn btn-pink">Save</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
  </form>
</div>
@endsection