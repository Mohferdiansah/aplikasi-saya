@extends('layouts.app')

@section('content')
    <h2>➕ Tambah Tugas Baru</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Tugas</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control">
        </div>
        <div class="mb-3">
    <label class="form-label">Hari</label>
    <select name="hari" class="form-control">
        <option value="">-- Pilih Hari --</option>
        <option>Senin</option>
        <option>Selasa</option>
        <option>Rabu</option>
        <option>Kamis</option>
        <option>Jumat</option>
        <option>Sabtu</option>
        <option>Minggu</option>
    </select>
</div>

        <div class="mb-3">
            <label class="form-label">Waktu (jam:menit)</label>
            <input type="time" name="waktu" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">XP (Poin)</label>
            <input type="number" name="xp" class="form-control" value="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
