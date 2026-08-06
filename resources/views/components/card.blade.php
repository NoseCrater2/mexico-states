@props([
    'title' => null,
    'icon' => null,
    'bg_color' => 'white',
    'icon_color' => 'primary',
])

<div class="card h-auto w-100 shadow-sm border-0 card-kpi bg-{{$bg_color}}">
    <div class="card-body d-flex flex-column justify-content-between">
        <div class="d-flex justify-content-between align-items-start">
            <span class=" text-uppercase small fw-bold {{$bg_color == 'white' ? 'text-muted':'text-white'}}"> {{$title }}</span>
            @if ($icon)
             <span class="material-symbols-outlined text-{{$icon_color}}">{{$icon}}</span>
            @endif

        </div>
        {{ $content ?? '' }}

    </div>
</div>
