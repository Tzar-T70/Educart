@props(['bg' => 'bg-white'])

<section class="py-16 {{ $bg }}">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">
        {{ $slot }}
    </div>
</section>
