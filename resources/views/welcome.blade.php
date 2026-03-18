<x-guest-layout>

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
         <div class="relative bg-[var(--bg)] overflow-hidden">
            <img src ="/images/Aesthetic Workspace.jpeg" class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Background">
            <div class="relative">
            <div class="max-w-7xl mx-auto">
                    <!-- Main hero content -->
                    <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-16 xl:pb-20">                    
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8"></div>
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-[var(--text)] dark:text-[var(--text)] sm:text-5xl md:text-6xl">
                                @auth
                                    <span class="block xl:inline">Welcome back,</span>
                                    <span class="block text-[var(--brand-dark-blue)] xl:inline"> {{ Auth::user()->name }}</span>
                                @else
                                    <span class="block xl:inline">Smart shopping for</span>
                                    <span class="block text-[var(--brand-dark-blue)] xl:inline"> your academic life</span>
                                @endauth
                            </h1>
                            <p class="mt-3 text-base text-[var(--text)] dark:text-[var(--text)] sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-l lg:mx-0">
                                @auth
                                    Ready to continue your shopping journey? Check out the latest deals and your personalized recommendations.
                                @else
                                    Welcome to Educart. Our vision is to empower students with a smarter, more affordable way to shop,                                 
                                    making everyday essentials, fashion, and lifestyle products accessible without the stress of overspending.
                                    We believe that student life should be supported by convenience, style, and savings.
                                @endauth
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                @auth
                                    <div class="rounded-md shadow">
                                        <a href="#shop-section" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[var(--brand-dark-blue)] hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                            Shop Now
                                        </a>
                                    </div>
                                    @if(Auth::user()->is_admin)
                                        <div class="mt-3 sm:mt-0 sm:ml-3 rounded-md shadow">
                                            <a href="{{ route('dashboard') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[var(--brand-dark-blue)] hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                                Dashboard
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="rounded-md shadow">
                                        <button @click="openModal('register')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[var(--brand-dark-blue)] hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                            Get started
                                        </button>
                                    </div>
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <button @click="openModal('login')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[var(--brand-dark-blue)] hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                            Log In
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
</div>
        <!-- Product Grid -->
         <div class="py-12 bg-[var(--bg)]">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <h2 class="text-3xl font-extrabold text-[var(--text)] text-center">Shop by Category</h2>
             <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <!-- Technology -->
                <a href="/categories/technology" class ="card bg-[var(--card)] text-[var(--text)] shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform"> 
                <img src="https://placehold.co/400x300/285570/faf7f6?text=Technology" alt="Tech" class="w-full h-48 object-cover">
                     <div class="p-6">
                         <h3 class="text-xl font-semibold text-[var(--text)]">Technology</h3>
                         <p class="mt-2 text-[var(--text)]">Laptops, headphones, and more.</p>
                    </div>
                </a>
                <!-- Mens -->
                <a href="/categories/fashion/mens" class ="card bg-[var(--card)] text-[var(--text)] shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform"> 
                  <img src="https://placehold.co/400x300/285570/faf7f6?text=Mens" alt="mens" class="w-full h-48 object-cover">
                  <div class="p-6">
                    <h3 class="text-xl font-semibold text-[var(--text)]">Mens</h3>
                    <p class="mt-2 text-[var(--text)]">Jumpers, Trousers, Jackets and more!</p>
                  </div>
                 </a>
                 <!-- Womens -->
                    <a href="/categories/fashion/womens" class ="card bg-[var(--card)] text-[var(--text)] shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform"> 
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Womens" alt="womens" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-[var(--text)]">Womens</h3>
                            <p class="mt-2 text-[var(--text)]">Dresses, Shirts, Trousers and more!.</p>
                        </div>
                    </a>
                <!-- Stationery -->
                     <a href="/categories/stationery" class="card bg-[var(--card)] text-[var(--text)] shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Stationery" alt="Stationery" class="w-full h-48 object-cover">
                        <div class="p-6">
                             <h3 class="text-xl font-semibold text-[var(--text)]">Stationery</h3>
                             <p class="mt-2 text-[var(--text)]">Notebooks, Pens, Whiteboards and more!</p>
                        </div>
                    </a>

                <!-- Home -->
                    <a href="/categories/dorm-life" class="card bg-[var(--card)] text-[var(--text)] shadow-lg rounded-lg overflow-hidden hover:scale-105 transition-transform">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Home" alt="Home" class="w-full h-48 object-cover">
                        <div class="p-6">
                           <h3 class="text-xl font-semibold text-[var(--text)]">Home</h3>
                           <p class="mt-2 text-[var(--text)]">Storage, cleaning, and cozy extras.</p>
                        </div>
                    </a>
                </div>
             </div>
        </div>
    </main>
</x-guest-layout>
