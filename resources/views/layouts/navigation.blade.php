<nav class="bg-brand-beige border-b border-brand-gray z-50">    
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

                <!-- Navigation Links  -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="#" :active="false">
                        {{ __('Technology') }}
                    </x-nav-link>
                    <x-nav-link href="#" :active="false">
                        {{ __('Mens') }}
                    </x-nav-link>
                    <x-nav-link href="#" :active="false">
                        {{ __('Womens') }}
                    </x-nav-link>
                    <x-nav-link href="#" :active="false">
                        {{ __('Accessories') }}
                    </x-nav-link>
                    <x-nav-link href="#" :active="false">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Auth Links -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
            @guest
            <button @click="openModal('login')" 
                class="text-sm font-medium text-brand-dark hover:text-brand-dark-blue underline">
                {{ __('Log in') }}
            </button>
            <button @click="openModal('register')" 
                class="ml-4 text-sm font-medium text-white bg-brand-dark-blue hover:bg-opacity-90 px-4 py-2 rounded-md">
                {{ __('Register') }}
            </button>
            @endguest

                @auth
                <!-- This is the logged-in user dropdown -->
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

            <!-- Hamburger -->
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link href="/categories/technology">{{ __('Technology') }}</x-responsive-nav-link>
        <x-responsive-nav-link href="/categories/mens">{{ __('Mens') }}</x-responsive-nav-link>
        <x-responsive-nav-link href="/categories/womens">{{ __('Womens') }}</x-responsive-nav-link>
        <x-responsive-nav-link href="/categories/accessories">{{ __('Accessories') }}</x-responsive-nav-link>
        <x-responsive-nav-link href="/categories/home">{{ __('Home') }}</x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-brand-gray">
            @guest
            <div class="px-4">
                <x-responsive-nav-link href="#" @click="openModal('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#" @click="openModal('register')">
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