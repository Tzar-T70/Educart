<x-guest-layout>
    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <div class="relative bg-brand-beige overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-brand-beige sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-brand-beige transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>

                    <!-- Main hero content -->
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8"></div>
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-brand-dark sm:text-5xl md:text-6xl">
                                <span class="block xl:inline">Smart shopping for</span>
                                <span class="block text-brand-dark-blue xl:inline"> your academic life</span>
                            </h1>
                            <p class="mt-3 text-base text-brand-dark sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Welcome to Educart. Exclusive deals on everything you need, from tech and textbooks to dorm essentials and fashion. All in one place, all for students.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <button @click="openModal('register')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brand-dark-blue hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                        Get started
                                    </button>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <button @click="openModal('login')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-brand-dark-blue bg-brand-gray hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                        Log In
                                    </button>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://placehold.co/1000x700/e3ded7/285570?text=Educart+Products" alt="E-shop products">
            </div>
        </div>

        <!-- Placeholder Product Grid -->
        <div class="py-12 bg-brand-cream">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-brand-dark text-center">Shop by Category</h2>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Placeholder Card 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Technology" alt="Tech" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-brand-dark">Technology</h3>
                            <p class="mt-2 text-brand-dark">Laptops, headphones, and more.</p>
                        </div>
                    </div>
                    <!-- Placeholder Card 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Stationery" alt="Stationery" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-brand-dark">Stationery</h3>
                            <p class="mt-2 text-brand-dark">Notebooks, pens, and textbooks.</p>
                        </div>
                    </div>
                    <!-- Placeholder Card 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Dorm+Life" alt="Dorm Life" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-brand-dark">Dorm Life</h3>
                            <p class="mt-2 text-brand-dark">Bedding, decor, and kitchen kits.</p>
                        </div>
                    </div>
                    <!-- Placeholder Card 4 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Fashion" alt="Fashion" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-brand-dark">Fashion</h3>
                            <p class="mt-2 text-brand-dark">Jumpers, trousers, and shoes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>