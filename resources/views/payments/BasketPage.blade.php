<x-app-layout>
    <x-app-layout>

    @php
        
        if(session()->has('basket') && !session()->has('basket_expires_at')) {
            session(['basket_expires_at' => now()->addMinutes(15)]);
        }

        
        if(session()->has('basket_expires_at') && now()->greaterThan(session('basket_expires_at'))) {
            session()->forget(['basket', 'basket_expires_at']);
            $basket = [];
        }
    @endphp

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-brand-dark-blue">
            Your Basket
        </h2>
    </x-slot>
   
        
     

<x-slot name="header">
        <h2 class="text-3xl font-bold text-[var(--text)]">
            Your Basket
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Basket Items --}}
            <div class="md:col-span-2 bg-[var(--card-bg)] rounded-xl shadow p-6">
                @if($cart && $cart->items->count() > 0)
                    @foreach($cart->items as $item)
                        <x-basket-item :id="$item->cart_item_id" :item="$item" />
                    @endforeach
                @else
                    <p class="text-[var(--text)] text-lg">Your basket is empty.</p>
                @endif
            </div>

            {{-- Summary --}}
            <x-basket-summary :subtotal="$subtotal" />

        </div>

    </div>

</x-app-layout>
