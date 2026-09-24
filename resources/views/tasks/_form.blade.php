<div class="mb-3">
  <label class="form-label">Task name</label>
  <input type="text" name="task_name" class="form-control @error('task_name') is-invalid @enderror"
         value="{{ old('task_name', $task->task_name ?? '') }}" placeholder="Finish Laravel project">
  @error('task_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea name="description" rows="3" class="form-control" placeholder="Details">{{ old('description', $task->description ?? '') }}</textarea>
</div>
<div class="mb-4">
  <label class="form-label">Due date</label>
  <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror"
         value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
  @error('due_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>