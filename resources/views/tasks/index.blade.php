@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📋 Daftar Tugas Hari Ini</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">➕ Tambah Tugas</a>
    </div>
    @forelse($tasks as $task)
    
        <div class="card mb-2 @if($task->status) border-success @endif">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h5 class="mb-1">{{ $task->nama }} 
                        <small class="text-muted">({{ $task->kategori ?? 'Umum' }})</small>
                    </h5>
                    <p class="mb-0">🕒 {{ $task->waktu }} | XP: {{ $task->xp }}</p>
                </div>
                <div>
                    @if(!$task->status)
                        <form method="POST" action="{{ route('tasks.selesai', $task->id) }}">
                            @csrf
                            <button class="btn btn-success btn-sm">✔ Selesai</button>
                        </form>
                    @else
                        <span class="badge bg-success p-2">✅ Selesai</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex gap-2">
    @if(!$task->status)
        <form method="POST" action="{{ route('tasks.selesai', $task->id) }}">
            @csrf
            <button class="btn btn-success btn-sm">✔ Selesai</button>
        </form>
    @endif

    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">🗑 Hapus</button>
    </form>
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>

</div>
    @empty
    <p class="mb-0">
    🕒 {{ $task->waktu }} | XP: {{ $task->xp }} | Hari: {{ $task->hari ?? 'Setiap Hari' }}
</p>

        <p>Belum ada tugas hari ini.</p>
    @endforelse
@endsection
