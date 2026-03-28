<div class="task-card border p-4 rounded shadow bg-white">
    <div class="task-title font-bold text-lg mb-2">
{{ $task['title'] }}
</div>

<div class="status mb-2">
    @if($task['completed'])
        <span class="text-green-600">✔ {{ __('app.finished_lbl') }}</span>
    @else
        <span class="text-yellow-600">❌ {{ __('app.progress_lbl') }}</span>
    @endif
</div>

@isset($slot)
    <div class="mt-2">
        {{ $slot }}
    </div>
    @endisset
    </div>
