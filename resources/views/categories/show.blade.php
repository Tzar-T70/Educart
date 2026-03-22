<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base leading-tight text-brand-dark-blue">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-center">

                        <!-- Search input -->
                        <input
                            type="text"
                            name="search"
                            placeholder="Search products..."
                            value="{{ request('search') }}"
                            class="rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue"
                        >

                        <!-- Minimum price -->
                        <input
                            type="number"
                            name="min_price"
                            placeholder="Min £"
                            min="1"
                            max="1000"
                            step="0.01"
                            value="{{ request('min_price') }}"
                            class="w-28 rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue"
                        >

                        <!-- Maximum price -->
                        <input
                            type="number"
                            name="max_price"
                            placeholder="Max £"
                            min="1"
                            max="1000"
                            step="0.01"
                            value="{{ request('max_price') }}"
                            class="w-28 rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue"
                        >

                        @if($category->slug === 'fashion')
                            <select name="gender" class="rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue">
                                <option value="">All</option>
                                <option value="mens" {{ request('gender') === 'mens' ? 'selected' : '' }}>Mens</option>
                                <option value="womens" {{ request('gender') === 'womens' ? 'selected' : '' }}>Womens</option>
                            </select>
                        @endif

                        <!-- Sort dropdown -->
                        <select name="sort" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue">
                            <option value="">Sort By</option>

                            <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>
                                Most Popular
                            </option>

                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                                Price: Low to High
                            </option>

                            <option value="created_desc" {{ request('sort') === 'created_desc' ? 'selected' : '' }}>
                                Last Added: Newest First
                            </option>

                            <option value="created_asc" {{ request('sort') === 'created_asc' ? 'selected' : '' }}>
                                Last Added: Oldest First
                            </option>

                            <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>
                                Name: A → Z
                            </option>

                            <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>
                                Name: Z → A
                            </option>
                        </select>

                        <!-- Apply button -->
                        <button type="submit" class="bg-brand-dark-blue text-white px-4 py-2 rounded-md">
                            Apply
                        </button>
                    </form>

                    @foreach($category->subCategories as $subCategory)
                        @if($subCategory->products->count())
                            <section class="mb-12">
                                <div class="flex justify-between items-center mb-6">
                                    <h3 class="text-2xl font-bold text-brand-dark-blue">{{ $subCategory->name }}</h3>
                                    <a href="{{ route('subcategories.show', [$category, $subCategory]) }}" class="text-sm font-semibold text-gray-500 hover:text-brand-dark-blue transition">
                                        View All →
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                    @foreach($subCategory->products as $product)
                                        <x-product-card :product="$product" :category="$category" :subCategory="$subCategory" />
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    @endforeach

                    @if($category->subCategories->every(fn($subCategory) => $subCategory->products->isEmpty()))
                        <div class="text-center py-12 text-gray-500">
                            No products found in this category.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
