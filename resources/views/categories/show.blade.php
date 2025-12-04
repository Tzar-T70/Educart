<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-brand-dark-blue leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @foreach($category->subCategories as $subCategory)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-brand-dark-blue">{{ $subCategory->name }}</h3>
                            <a href="{{ route('subcategories.show', [$category, $subCategory]) }}" class="text-brand-dark hover:text-brand-dark-blue font-medium hover:underline">
                                View All &rarr;
                            </a>
                        </div>
                        
                        @if($subCategory->products->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                @foreach($subCategory->products as $product)
                                    <x-product-card :product="$product" :category="$category" :subCategory="$subCategory" />
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">No products featured yet.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
