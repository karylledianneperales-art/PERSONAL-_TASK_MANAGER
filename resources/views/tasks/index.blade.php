@extends('layouts.app')
@section('title', 'My Tasks')
@section('content')

<div class="row g-3 mb-4">
  <div class="col-4"><div class="card-dark stat p-3"><div class="muted small">Total</div><div class="fs-3">{{ $tasks->count() }}</div></div></div>
  <div class="col-4"><div class="card-dark stat p-3"><div class="muted small">Pending</div><div class="fs-3">{{ $tasks->where('status','Pending')->count() }}</div></div></div>
  <div class="col-4"><div class="card-dark stat p-3"><div class="muted small">Done</div><div class="fs-3">{{ $tasks->where('status','Completed')->count() }}</div></div></div>
</div>

<div class="card-dark p-3">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr class="muted"><th>Task</th><th>Due</th><th>Status</th><th class="text-end">Actions</th></tr>
      </thead>
      <tbody>
      @forelse($tasks as $task)
        <tr>
          <td>
            <div class="{{ $task->status === 'Completed' ? 'text-decoration-line-through muted' : 'fw-semibold' }}">{{ $task->task_name }}</div>
            <div class="muted small">{{ $task->description }}</div>
          </td>
          <td class="text-nowrap">
            @if($task->due_date)
              @if($task->status === 'Pending' && $task->due_date->isPast())
                <span style="color:var(--pink)"><i class="bi bi-exclamation-circle"></i> {{ $task->due_date->format('M d, Y') }}</span>
              @else
                {{ $task->due_date->format('M d, Y') }}
              @endif
            @else
              <span class="muted">-</span>
            @endif
          </td>
          <td>
            <form method="POST" action="{{ route('tasks.status', $task) }}">
              @csrf @method('PATCH')
              <button class="badge rounded-pill {{ $task->status === 'Completed' ? 'badge-done' : 'badge-pending' }}">{{ $task->status }}</button>
            </form>
          </td>
          <td class="text-end text-nowrap">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-pink btn-sm"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline"
                  onsubmit="return confirm('Delete this task?')">
              @csrf @method('DELETE')
              <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center muted py-4">No tasks yet. Add your first one.</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection