<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base leading-tight">
            <a href="{{ route('categories.show', $product->subCategory->category) }}" class="hover:underline text-[var(--text)]">{{ $product->subCategory->category->name }}</a>
            <span class="text-[var(--text)] mx-2">/</span>
            <a href="{{ route('subcategories.show', [$product->subCategory->category, $product->subCategory]) }}" class="hover:underline text-[var(--text)]">{{ $product->subCategory->name }}</a>
            <span class="text-[var(--text)] mx-2">/</span>
            <span class="text-[var(--text)]">{{ $product->name }}</span>
        </h2>
    </x-slot>

    <div class="bg-[var(--bg)] dark:bg-[var(--bg)] py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[var(--card)] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Product Image -->
                        <div class="space-y-4">
                            <div class="aspect-w-4 aspect-h-3 bg-[var(--bg)] dark:bg-gray-700 rounded-lg overflow-hidden border border-[var(--border)] dark:border-gray-600">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-full">
                                @else
                                    <div class="flex items-center justify-center h-full text-[var(--text)] dark:text-gray-400">No Image Available</div>
                                @endif
                            </div>

                            <!-- Thumbnail placeholders -->
                            <div class="grid grid-cols-4 gap-4">
                                @for($i = 0; $i < 4; $i++)
                                    <div class="aspect-w-1 aspect-h-1 bg-[var(--bg)] dark:bg-gray-700 rounded-md overflow-hidden border border-[var(--border)] dark:border-gray-600 cursor-pointer hover:border-[var(--brand)] dark:hover:border-blue-400">
                                        @if($product->image_url)
                                            <img src="{{ $product->image_url }}" class="object-cover w-full h-full opacity-75 hover:opacity-100">
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="flex flex-col">
                            @if($product->brand)
                                <h2 class="text-sm font-semibold text-[var(--brand)] dark:text-blue-400 uppercase tracking-wide mb-2">{{ $product->brand }}</h2>
                            @endif
                            <h1 class="text-3xl font-bold text-[var(--text)] dark:text-white mb-4">{{ $product->name }}</h1>

                            <!-- Ratings -->
                            <div class="flex items-center mb-6">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-[var(--text)] dark:text-gray-300 text-sm">(128 reviews)</span>
                            </div>

                            <div class="text-2xl font-bold text-[var(--text)] dark:text-white mb-6">£{{ number_format($product->price, 2) }}</div>

                            <div class="prose prose-sm text-[var(--text)] dark:text-gray-300 mb-8">
                                <p>{{ $product->description }}</p>
                                <ul>
                                    <li>Premium quality materials</li>
                                    <li>Designed for durability</li>
                                    <li>1-year warranty included</li>
                                </ul>
                            </div>

                            <!-- Actions -->
                            <div class="mt-auto space-y-4 pt-6 border-t border-[var(--border)] dark:border-gray-600">
                                @if($product->sizes->count())
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-[var(--text)] dark:text-gray-300 mb-2">Available Sizes</label>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($product->sizes as $size)
                                                <button type="button" class="px-4 py-2 border rounded-md text-sm text-[var(--text)] dark:text-gray-300 border-[var(--border)] dark:border-gray-600 hover:bg-[var(--brand)] dark:hover:bg-blue-600 hover:text-white dark:hover:text-white transition">
                                                    {{ $size->size }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <form action="{{ route('basket.add') }}" method="POST" class="flex items-center space-x-4">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="w-32">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <select id="quantity" name="quantity" class="block w-full rounded-md border-[var(--border)] dark:border-gray-600 shadow-sm focus:border-[var(--brand)] dark:focus:border-blue-400 focus:ring-[var(--brand)] dark:focus:ring-blue-400 sm:text-sm">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="flex-1 bg-[var(--brand)] dark:bg-blue-600 text-white px-6 py-3 rounded-md font-medium hover:bg-opacity-90 dark:hover:bg-blue-500 transition shadow-sm">
                                        Add to Cart
                                    </button>
                                </form>

                                <button class="w-full bg-[var(--beige)] dark:bg-gray-700 text-[var(--brand)] dark:text-blue-400 px-6 py-3 rounded-md font-medium hover:bg-[var(--gray)] dark:hover:bg-gray-600 transition">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="mt-16 border-t border-[var(--brand-beige)] pt-12">
                        <h3 class="text-2xl font-bold text-[var(--text)] mb-8">Customer Reviews</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                            <!-- Rating Breakdown -->
                            <div class="col-span-1">
                                <div class="flex items-center mb-4">
                                    <span class="text-4xl font-bold text-[var(--text)] mr-4">4.8</span>
                                    <div class="flex text-yellow-400">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-[var(--text)] text-sm mb-6">Based on 128 reviews</p>

                                <div class="space-y-2">
                                    @foreach([5, 4, 3, 2, 1] as $star)
                                        <div class="flex items-center text-sm">
                                            <span class="w-12 text-[var(--text)]">{{ $star }} star</span>
                                            <div class="flex-1 h-2 bg-gray-200 rounded-full mx-4 overflow-hidden">
                                                <div class="h-full bg-yellow-400" style="width: {{ $star === 5 ? '70%' : ($star === 4 ? '20%' : '5%') }}"></div>
                                            </div>
                                            <span class="w-8 text-right text-[var(--text)]">{{ $star === 5 ? '70%' : ($star === 4 ? '20%' : '5%') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Review List -->
                            <div class="col-span-2 space-y-8">
                                <!-- Dummy Review 1 -->
                                <div class="border-b border-gray-100 pb-8">
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400 mr-2">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                            @endfor
                                        </div>
                                        <span class="font-bold text-[var(--text)]">Excellent product!</span>
                                    </div>
                                    <p class="text-[var(--text)] mb-2">I absolutely love this item. The quality is top-notch and it arrived faster than expected. Highly recommended!</p>
                                    <div class="text-sm text-[var(--text)]">
                                        <span>John Doe</span> &bull; <span>Verified Purchase</span> &bull; <span>2 days ago</span>
                                    </div>
                                </div>

                                <!-- Dummy Review 2 -->
                                <div>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400 mr-2">
                                            @for($i = 0; $i < 4; $i++)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                            @endfor
                                            <svg class="w-4 h-4 text-[var(--text)] fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        </div>
                                        <span class="font-bold text-[var(--text)]">Good value</span>
                                    </div>
                                    <p class="text-[var(--text)] mb-2">Great value for the price. It does exactly what it says. The packaging could be better though.</p>
                                    <div class="text-sm text-[var(--text)]">
                                        <span>Jane Smith</span> &bull; <span>Verified Purchase</span> &bull; <span>1 week ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>