<nav x-data="{ open: false }" class="bg-brand-beige border-b border-brand-gray">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center-x-2">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src ="/images/Logo_transparent.png" alt= "Educart Logo" class="h-8 w-auto">
                        <span class="text-2xl font-bold text-brand-dark-blue">Educart</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center">
                    @foreach($categories as $category)
                        <div class="relative group h-full flex items-center">
                            <x-nav-link :href="route('categories.show', $category)" :active="request()->is('categories/' . $category->slug . '*')">
                                {{ $category->name }}
                            </x-nav-link>
                            
                            @if($category->subCategories->count() > 0)
                                <div class="absolute left-0 top-full hidden group-hover:block bg-white shadow-xl rounded-md z-50 min-w-[220px] border border-gray-100 overflow-hidden transition-all duration-200 ease-out">
                                    <div class="py-1">
                                        @foreach($category->subCategories as $subCategory)
                                            <a href="{{ route('subcategories.show', [$category, $subCategory]) }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-brand-beige hover:text-brand-dark-blue transition-colors duration-150">
                                                {{ $subCategory->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a href="{{ route('basket.index') }}" 
                class="text-sm font-medium text-brand-dark hover:text-brand-dark-blue mr-4">
                    Basket
                </a>

                <a href="/checkout" 
                class="text-sm font-medium text-white bg-brand-dark-blue hover:bg-opacity-90 px-4 py-2 rounded-md mr-6">
                    Checkout
                </a>

                @guest
                    <button @click.prevent="$dispatch('open-auth-modal', { view: 'login' })" class="text-sm font-medium text-brand-dark hover:text-brand-dark-blue underline">
                        {{ __('Log in') }}
                    </button>
                    <button @click.prevent="$dispatch('open-auth-modal', { view: 'register' })" class="ml-4 text-sm font-medium text-white bg-brand-dark-blue hover:bg-opacity-90 px-4 py-2 rounded-md">
                        {{ __('Register') }}
                    </button>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-brand-dark bg-brand-beige hover:text-brand-dark-blue focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-brand-dark hover:text-brand-dark-blue focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach($categories as $category)
                <x-responsive-nav-link :href="route('categories.show', $category)" :active="request()->is('categories/' . $category->slug . '*')">
                    {{ $category->name }}
                </x-responsive-nav-link>
                @foreach($category->subCategories as $subCategory)
                    <x-responsive-nav-link :href="route('subcategories.show', [$category, $subCategory])" class="pl-8 text-sm text-gray-600">
                        - {{ $subCategory->name }}
                    </x-responsive-nav-link>
                @endforeach
            @endforeach
            <x-responsive-nav-link :href="route('basket.index')">
                Basket
            </x-responsive-nav-link>

            <x-responsive-nav-link href="/checkout">
                Checkout
            </x-responsive-nav-link>

        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-brand-gray">
            @guest
                <div class="px-4">
                     <x-responsive-nav-link href="#" @click.prevent="$dispatch('open-auth-modal', { view: 'login' })">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                     <x-responsive-nav-link href="#" @click.prevent="$dispatch('open-auth-modal', { view: 'register' })">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endguest
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-brand-dark">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>