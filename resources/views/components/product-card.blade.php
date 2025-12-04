@props(['product', 'category', 'subCategory'])

<div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition group bg-white flex flex-col h-full">
    <a href="{{ route('products.show', $product) }}" class="block aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200 relative">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-48 group-hover:scale-105 transition duration-300">
        @else
            <div class="flex items-center justify-center h-48 text-gray-400">No Image</div>
        @endif
    </a>
    <div class="p-4 flex flex-col flex-grow">
        @if($product->brand)
            <p class="text-xs text-gray-500 mb-1 uppercase tracking-wide">{{ $product->brand }}</p>
        @endif
        <h4 class="text-lg font-bold text-brand-dark-blue mb-1 truncate">
            <a href="{{ route('products.show', $product) }}" class="hover:underline">{{ $product->name }}</a>
        </h4>
        <p class="text-gray-600 text-sm mb-2 line-clamp-2 h-10">{{ $product->description }}</p>
        <div class="mt-auto flex justify-between items-center pt-2">
            <span class="text-lg font-bold text-brand-dark">£{{ number_format($product->price, 2) }}</span>
            <button class="text-sm bg-brand-dark-blue text-white px-3 py-1 rounded hover:bg-opacity-90 transition shadow-sm">
                Add to Cart
            </button>
        </div>
    </div>
</div>
