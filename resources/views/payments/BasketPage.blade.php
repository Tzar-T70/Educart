<x-app-layout>

    {{-- Optional page header (matches your site's style) --}}
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-brand-dark-blue">
            Your Basket
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Basket Items --}}
            <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                @if(count($basket) > 0)
                    @foreach($basket as $id => $item)
                        <x-basket-item :id="$id" :item="$item" />
                    @endforeach
                @else
                    <p class="text-brand-dark text-lg">Your basket is empty.</p>
                @endif
            </div>

            {{-- Summary --}}
            <x-basket-summary :subtotal="$subtotal" />

        </div>

    </div>

</x-app-layout>
