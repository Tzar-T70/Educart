<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base leading-tight">
            <a href="{{ route('categories.show', $category) }}" class="hover:underline text-gray-500">{{ $category->name }}</a>
            <span class="text-gray-400 mx-2">/</span>
            <span class="text-brand-dark-blue">{{ $subCategory->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="p-6 text-gray-900">
    <form method="GET" class="mb-6 flex gap-4 items-center">

    <!-- Search input -->
    <input 
        type="text" 
        name="search" 
        placeholder="Search products..." 
        value="{{ request('search') }}"
        class="rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue"
    >

    <!-- Sort dropdown -->
    <select name="sort" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue">
        <option value="">Sort By</option>
        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
            Price: Low to High
        </option>
    </select>

    <!-- Search button -->
    <button type="submit" class="bg-brand-dark-blue text-white px-4 py-2 rounded-md">
        Search
    </button>

</form>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <x-product-card :product="$product" :category="$category" :subCategory="$subCategory" />
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                No products found in this category.
            </div>
        @endforelse
    </div>
</div> 
            </div>
        </div>
    </div>
</x-app-layout>
