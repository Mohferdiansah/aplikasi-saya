<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // ⏰ Kirim reminder otomatis setiap hari jam 07:00
        $schedule->command('reminder:daily')->dailyAt('07:00');

        // 🔁 Reset semua tugas berulang setiap hari Senin jam 06:00
        $schedule->command('tasks:reset-weekly')->weeklyOn(1, '06:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
