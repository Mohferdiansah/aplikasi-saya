@extends('layouts.app')

@section('content')
    <h2>✏️ Edit Tugas</h2>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Tugas</label>
            <input type="text" name="nama" class="form-control" value="{{ $task->nama }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $task->kategori }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu</label>
            <input type="time" name="waktu" class="form-control" value="{{ $task->waktu }}">
        </div>
        <div class="mb-3">
            <label class="form-label">XP</label>
            <input type="number" name="xp" class="form-control" value="{{ $task->xp }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hari</label>
            <select name="hari" class="form-control">
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                    <option value="{{ $hari }}" @if($task->hari == $hari) selected @endif>{{ $hari }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="repeat" class="form-check-input" value="1" @if($task->repeat) checked @endif>
            <label class="form-check-label">Tugas ini berulang setiap minggu</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
