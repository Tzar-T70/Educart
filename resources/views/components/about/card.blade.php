@props(['title'])

<div class="bg-[var(--card-bg)] rounded-lg shadow-lg p-10 h-full">
    <h2 class="text-3xl font-bold text-[var(--text)]">{{ $title }}</h2>
    <div class="mt-4 text-lg leading-relaxed text-[var(--text)]">
        {{ $slot }}
    </div>
</div>
