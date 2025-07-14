@extends('layouts.app')

@section('content')
    <h2>📅 Kalender Tugas</h2>
    <div id="calendar"></div>
@endsection

@push('scripts')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            @foreach($tasks as $task)
                {
                    title: '{{ $task->nama }}',
                    startRecur: '{{ $task->hari }}', // perlu mapping lebih lanjut ke tanggal jika mau fix
                    color: '{{ $task->status ? "#6bcf63" : "#f56565" }}'
                },
            @endforeach
        ]
    });

    calendar.render();
});
</script>
@endpush
