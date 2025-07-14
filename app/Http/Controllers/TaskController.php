<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\History;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{

    public function destroy($id)
{
    $task = \App\Models\Task::findOrFail($id);
    $task->delete();

    return redirect()->route('dashboard')->with('success', 'Tugas berhasil dihapus.');
}

    public function calendar()
{
    $tasks = Task::all();
    return view('tasks.calendar', compact('tasks'));
}

    public function index()
    {
        $hariIni = now()->translatedFormat('l'); // Contoh: "Senin", "Selasa"
        $tasks = Task::where('hari', $hariIni)->orWhereNull('hari')->orderBy('waktu')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'waktu' => 'nullable|date_format:H:i',
            'xp' => 'required|integer|min:0',
            'status' => 'nullable|boolean',
            'catatan' => 'nullable|string',
            'hari' => 'nullable|string',
        ]);

        Task::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function selesaikan($id)
    {
        $task = Task::findOrFail($id);
        $task->status = true;
        $task->save();

        // Tambahkan ke riwayat
        History::create([
            'task_id' => $task->id,
            'selesai_pada' => now(),
            'catatan' => 'Diselesaikan oleh user',
        ]);

        // Tambah XP ke session
        $currentXp = session('xp_total', 0);
        $newXp = $currentXp + $task->xp;
        session(['xp_total' => $newXp]);

        // Hitung level berdasarkan XP (tiap 100 XP naik level)
        $level = floor($newXp / 100) + 1;
        session(['level' => $level]);

        return redirect()->route('dashboard')->with('success', 'Tugas selesai! XP +' . $task->xp);
    }
    public function edit($id)
{
    $task = \App\Models\Task::findOrFail($id);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, $id)
{
    $task = \App\Models\Task::findOrFail($id);
    $task->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Tugas berhasil diperbarui!');
}

}
