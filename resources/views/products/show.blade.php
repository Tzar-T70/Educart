<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base leading-tight">
            <a href="{{ route('categories.show', $product->subCategory->category) }}" class="hover:underline text-gray-500">{{ $product->subCategory->category->name }}</a>
            <span class="text-gray-400 mx-2">/</span>
            <a href="{{ route('subcategories.show', [$product->subCategory->category, $product->subCategory]) }}" class="hover:underline text-gray-500">{{ $product->subCategory->name }}</a>
            <span class="text-gray-400 mx-2">/</span>
            <span class="text-brand-dark-blue">{{ $product->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Product Image -->
                        <div class="space-y-4">
                            <div class="aspect-w-4 aspect-h-3 bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-full">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400">No Image Available</div>
                                @endif
                            </div>
                            <!-- Thumbnail placeholders -->
                            <div class="grid grid-cols-4 gap-4">
                                @for($i = 0; $i < 4; $i++)
                                    <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-md overflow-hidden border border-gray-200 cursor-pointer hover:border-brand-dark-blue">
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
                                <h2 class="text-sm font-semibold text-brand-dark-blue uppercase tracking-wide mb-2">{{ $product->brand }}</h2>
                            @endif
                            <h1 class="text-3xl font-bold text-brand-dark mb-4">{{ $product->name }}</h1>
                            
                            <!-- Ratings -->
                            <div class="flex items-center mb-6">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600 text-sm">(128 reviews)</span>
                            </div>

                            <div class="text-2xl font-bold text-brand-dark mb-6">£{{ number_format($product->price, 2) }}</div>

                            <div class="prose prose-sm text-gray-600 mb-8">
                                <p>{{ $product->description }}</p>
                                <ul>
                                    <li>Premium quality materials</li>
                                    <li>Designed for durability</li>
                                    <li>1-year warranty included</li>
                                </ul>
                            </div>

                            <!-- Actions -->
                            <div class="mt-auto space-y-4 pt-6 border-t border-gray-200">
                                <div class="flex items-center space-x-4">
                                    <div class="w-32">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <select id="quantity" name="quantity" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring-brand-dark-blue sm:text-sm">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <button class="flex-1 bg-brand-dark-blue text-white px-6 py-3 rounded-md font-medium hover:bg-opacity-90 transition shadow-sm">
                                        Add to Cart
                                    </button>
                                </div>
                                <button class="w-full bg-brand-beige text-brand-dark-blue px-6 py-3 rounded-md font-medium hover:bg-brand-gray transition">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="mt-16 border-t border-gray-200 pt-12">
                        <h3 class="text-2xl font-bold text-brand-dark mb-8">Customer Reviews</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                            <!-- Rating Breakdown -->
                            <div class="col-span-1">
                                <div class="flex items-center mb-4">
                                    <span class="text-4xl font-bold text-brand-dark mr-4">4.8</span>
                                    <div class="flex text-yellow-400">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-6">Based on 128 reviews</p>
                                
                                <div class="space-y-2">
                                    @foreach([5, 4, 3, 2, 1] as $star)
                                        <div class="flex items-center text-sm">
                                            <span class="w-12 text-gray-600">{{ $star }} star</span>
                                            <div class="flex-1 h-2 bg-gray-200 rounded-full mx-4 overflow-hidden">
                                                <div class="h-full bg-yellow-400" style="width: {{ $star === 5 ? '70%' : ($star === 4 ? '20%' : '5%') }}"></div>
                                            </div>
                                            <span class="w-8 text-right text-gray-500">{{ $star === 5 ? '70%' : ($star === 4 ? '20%' : '5%') }}</span>
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
                                        <span class="font-bold text-gray-900">Excellent product!</span>
                                    </div>
                                    <p class="text-gray-600 mb-2">I absolutely love this item. The quality is top-notch and it arrived faster than expected. Highly recommended!</p>
                                    <div class="text-sm text-gray-500">
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
                                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        </div>
                                        <span class="font-bold text-gray-900">Good value</span>
                                    </div>
                                    <p class="text-gray-600 mb-2">Great value for the price. It does exactly what it says. The packaging could be better though.</p>
                                    <div class="text-sm text-gray-500">
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
