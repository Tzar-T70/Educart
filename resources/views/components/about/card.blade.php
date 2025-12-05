@props(['title'])

<div class="bg-white rounded-lg shadow-lg p-10 h-full">
    <h2 class="text-3xl font-bold text-brand-dark">{{ $title }}</h2>
    <div class="mt-4 text-lg leading-relaxed text-brand-dark">
        {{ $slot }}
    </div>
</div>
