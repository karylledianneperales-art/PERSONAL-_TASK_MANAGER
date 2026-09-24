<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Task Manager')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root { --pink:#ff2d95; --pink-dark:#d81b7a; }
    body { background:#000; color:#f5f5f5; }
    .navbar { background:#0a0a0a; border-bottom:2px solid var(--pink); }
    .navbar-brand { color:var(--pink)!important; font-weight:700; }
    .card-dark { background:#141414; border:1px solid #2a2a2a; border-radius:14px; }
    .stat { border-left:4px solid var(--pink); }
    .btn-pink { background:var(--pink); border-color:var(--pink); color:#000; font-weight:600; }
    .btn-pink:hover { background:var(--pink-dark); border-color:var(--pink-dark); color:#fff; }
    .btn-outline-pink { border-color:var(--pink); color:var(--pink); }
    .btn-outline-pink:hover { background:var(--pink); color:#000; }
    .form-control { background:#0d0d0d; border:1px solid #333; color:#fff; color-scheme:dark; }
    .form-control:focus { background:#0d0d0d; color:#fff; border-color:var(--pink); box-shadow:0 0 0 .2rem rgba(255,45,149,.25); }
    ::placeholder { color:#777!important; }
    .badge-pending { background:transparent; border:1px solid var(--pink); color:var(--pink); }
    .badge-done { background:var(--pink); border:1px solid var(--pink); color:#000; }
    .table { --bs-table-bg:transparent; --bs-table-color:#f5f5f5; --bs-table-border-color:#2a2a2a; }
    .muted { color:#9a9a9a; }
  </style>
</head>
<body>
<nav class="navbar mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('tasks.index') }}"><i class="bi bi-check2-square"></i> TaskManager</a>
    <a href="{{ route('tasks.create') }}" class="btn btn-pink btn-sm"><i class="bi bi-plus-lg"></i> Add Task</a>
  </div>
</nav>
<main class="container pb-5">
  @if(session('success'))
    <div class="alert alert-dark border-0 mb-3" style="border-left:4px solid var(--pink)!important">
      {{ session('success') }}
    </div>
  @endif
  @yield('content')
</main>
</body>
</html>