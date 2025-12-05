@props(['id', 'item'])

<div class="flex items-center justify-between py-6 border-b border-brand-gray">

    {{-- Product Image --}}
    <img 
        src="{{ $item->product->image_url }}" 
        alt="{{ $item->product->name }}"
        class="w-20 h-20 object-cover rounded-lg shadow-md"
    >

    {{-- Product Info --}}
    <div class="flex-1 ml-4">
        <h3 class="text-lg font-semibold text-brand-dark">{{ $item->product->name }}</h3>
        <p class="text-brand-dark-blue font-medium">
            £{{ number_format($item->price, 2) }}
        </p>
    </div>

    {{-- Quantity --}}
    <form action="{{ route('basket.update', $id) }}" method="POST" class="mr-4">
        @csrf
        <input 
            type="number" 
            name="quantity" 
            value="{{ $item->quantity }}"
            min="1"
            class="w-16 border-brand-gray focus:border-brand-dark-blue rounded-lg"
        >
        <button class="text-sm text-brand-dark-blue hover:underline ml-1">
            Update
        </button>
    </form>

    {{-- Total Price --}}
    <div class="w-20 text-right font-semibold text-brand-dark">
        £{{ number_format($item->price * $item->quantity, 2) }}
    </div>

    {{-- Remove --}}
    <form action="{{ route('basket.remove', $id) }}" method="POST" class="ml-4">
        @csrf
        <button class="text-red-600 hover:underline text-sm">
            Remove
        </button>
    </form>

</div>
