<x-guest-layout>
    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <div class=" bg-brand-beige ">
            <div class="max-w-7xl mx-auto">
              <div class="grid grid-cols-1 lg:grid-cols-2 items-start gap-8 py-16">    
                <div class="relative z-10 pb-8 bg-brand-beige sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-16 xl:pb-20">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-brand-beige transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>
                    <!-- Main hero content -->
                     <div class="mt-6 px-4 sm:mt-8 sm:px-6 md:mt-10 lg:mt-20 lg:px-8 xl:mt-16">   
                           <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-brand-dark sm:text-5xl md:text-6xl">
                                @auth
                                    <span class="block xl:inline">Welcome back,</span>
                                    <span class="block text-brand-dark-blue xl:inline"> {{ Auth::user()->name }}</span>
                                @else
                                    <span class="block xl:inline">Smart shopping for</span>
                                    <span class="block text-brand-dark-blue xl:inline"> the academic life</span>
                                @endauth 
                            </h1>
                            <p class="mt-3 text-base text-brand-dark sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-l lg:mx-0">
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
                                        <a href="#shop-section" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brand-dark-blue hover:bg-opacity-90 md:py-4 md:text-lg md:px-10">
                                            Shop Now
                                        </a>
                                    </div>
                                    @if(Auth::user()->is_admin)
                                        <div class="mt-3 sm:mt-0 sm:ml-3 rounded-md shadow">
                                            <a href="{{ route('dashboard') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-brand-dark-blue bg-brand-beige hover:bg-brand-gray md:py-4 md:text-lg md:px-10">
                                                Dashboard
                                            </a>
                                        </div>
                                    @endif
                                @else
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
                                @endauth
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 flex items-center justify-center">
                     <img src="/images/Logo_transparent.png" alt="E-shop products" class="h-80 w-auto object-contain">
                </div>
         </div>
        <!-- Product Grid -->
        <div class="py-12 bg-brand-cream">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <h2 class="text-3xl font-extrabold text-brand-dark text-center">Shop by Category</h2>
             <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <!-- Technology -->
                <a href="/categories/technology" class ="card bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform"> 
                <img src="https://placehold.co/400x300/285570/faf7f6?text=Technology" alt="Tech" class="w-full h-48 object-cover">
                     <div class="p-6">
                         <h3 class="text-xl font-semibold text-brand-dark">Technology</h3>
                         <p class="mt-2 text-brand-dark">Laptops, headphones, and more.</p>
                    </div>
                </a>
                <!-- Mens -->
                <a href="/categories/mens" class ="card bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform"> 
                  <img src="https://placehold.co/400x300/285570/faf7f6?text=Mens" alt="mens" class="w-full h-48 object-cover">
                  <div class="p-6">
                    <h3 class="text-xl font-semibold text-brand-dark">Mens</h3>
                    <p class="mt-2 text-brand-dark">Jumpers, Trousers, Jackets and more!</p>
                  </div>
                 </a>
                 <!-- Womens -->
                    <a href="/categories/womens" class ="card bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform"> 
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Womens" alt="womens" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-brand-dark">Womens</h3>
                            <p class="mt-2 text-brand-dark">Dresses, Shirts, Trousers and more!.</p>
                        </div>
                    </a>
                <!-- Accessories -->
                     <a href="/categories/accessories" class="card bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Accessories" alt="Accessories" class="w-full h-48 object-cover">
                        <div class="p-6">
                             <h3 class="text-xl font-semibold text-brand-dark">Accessories</h3>
                             <p class="mt-2 text-brand-dark">Watches, Bags, Jewellery and more!</p>
                        </div>
                    </a>

                <!-- Home -->
                    <a href="/categories/home" class="card bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform">
                        <img src="https://placehold.co/400x300/285570/faf7f6?text=Home" alt="Home" class="w-full h-48 object-cover">
                        <div class="p-6">
                           <h3 class="text-xl font-semibold text-brand-dark">Home</h3>
                           <p class="mt-2 text-brand-dark">Storage, cleaning, and cozy extras.</p>
                        </div>
                    </a>
                </div>
             </div>
        </div>
    </main>
</x-guest-layout>
