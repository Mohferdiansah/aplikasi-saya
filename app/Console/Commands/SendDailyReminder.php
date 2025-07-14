<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class SendDailyReminder extends Command
{
    protected $signature = 'reminder:daily';
    protected $description = 'Kirim reminder otomatis setiap pagi berdasarkan hari';

    public function handle()
    {
        $hariIni = now()->translatedFormat('l');

        $tasks = Task::where('hari', $hariIni)->get();

        foreach ($tasks as $task) {
            Log::info("🔔 Reminder Tugas: {$task->nama} pada jam {$task->waktu}");
        }

        return Command::SUCCESS;
    }
}

