@extends('layouts.app')

@section('content')
    <h2>📈 Progress Kamu</h2>
    <div class="alert alert-info">
        Total XP yang kamu kumpulkan: <strong>{{ $xp_total }}</strong>
    </div>
<div class="alert alert-success">
    Level: <strong>{{ session('level', 1) }}</strong>  
    (XP Saat Ini: {{ $xp_total }})
</div>

    <h4 class="mt-4">Riwayat Tugas Selesai</h4>
    <ul class="list-group">
        @forelse($histories as $history)
            <li class="list-group-item">
                <strong>{{ $history->task->nama }}</strong> ({{ $history->task->kategori ?? 'Umum' }})  
                <br>
                <small>Selesai pada: {{ $history->selesai_pada }}</small>
            </li>
        @empty
            <li class="list-group-item">Belum ada tugas yang diselesaikan.</li>
        @endforelse
    </ul>
@endsection
