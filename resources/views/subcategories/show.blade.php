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
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($subCategory->products as $product)
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
