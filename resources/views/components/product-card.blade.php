@props(['product', 'category', 'subCategory'])

<div class="border border-[var(--border)] dark:border-gray-600 rounded-lg overflow-hidden hover:shadow-lg transition group bg-[var(--card)] dark:bg-gray-800 flex flex-col h-full">
    
    <a href="{{ route('products.show', $product) }}" class="block w-full h-48 bg-[var(--bg)] dark:bg-gray-700 flex items-center justify-center overflow-hidden">
        @if($product->image_url)
            <img 
                src="{{ $product->image_url }}" 
                alt="{{ $product->name }}" 
                class="max-h-full max-w-full object-contain p-2 group-hover:scale-105 transition duration-300"
            >
        @else
            <div class="flex items-center justify-center h-full text-[var(--text)] dark:text-gray-400">No Image</div>
        @endif
    </a>

    <div class="p-4 flex flex-col flex-grow">
        
        @if($product->brand)
            <p class="text-xs text-[var(--text)] dark:text-gray-400 mb-1 uppercase tracking-wide">
                {{ $product->brand }}
            </p>
        @endif

        <h4 class="text-lg font-bold text-[var(--brand)] dark:text-blue-400 mb-1 truncate">
            <a href="{{ route('products.show', $product) }}" class="hover:underline">
                {{ $product->name }}
            </a>
        </h4>

        <p class="text-[var(--text)] dark:text-gray-300 text-sm mb-2 line-clamp-2 h-10">
            {{ $product->description }}
        </p>

        <div class="mt-auto flex justify-between items-center pt-2">
            <span class="text-lg font-bold text-[var(--brand)] dark:text-blue-400">
                £{{ number_format($product->price, 2) }}
            </span>

            <form action="{{ route('basket.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">

                <button type="submit" class="text-sm bg-[var(--brand)] dark:bg-blue-600 text-white px-3 py-1 rounded hover:bg-opacity-90 dark:hover:bg-blue-500 transition shadow-sm">
                    Add to Cart
                </button>
            </form>
        </div>

    </div>
</div>
