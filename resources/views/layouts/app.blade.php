<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DailyQuest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="{{ route('dashboard') }}" class="navbar-brand">📘 DailyQuest</a>
            <a href="{{ route('progress.index') }}" class="btn btn-outline-light">📈 Progress</a>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
