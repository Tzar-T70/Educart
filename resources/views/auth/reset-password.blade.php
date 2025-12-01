<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-20">

        <div class="bg-brand-cream p-6 sm:p-8 shadow-xl rounded-lg text-gray-900">

            <h2 class="text-xl font-semibold mb-6 text-center text-brand-dark-blue">
                Please enter your new password
            </h2>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <input type="hidden" name="email" value="{{ $request->email ?? old('email') }}">

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                
                <div class="mt-4" x-data="{ show: false }">
                    <x-input-label for="password" :value="__('Password')" />
                    
                    <div class="relative">
                        <x-text-input id="password" 
                                      class="block mt-1 w-full pr-10" 
                                      x-bind:type="show ? 'text' : 'password'"
                                      name="password" required autocomplete="new-password" />
                        
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 .946-3.001 3.49-5.32 6.57-6.118M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.773 4.773L19.227 19.227M17.34 14.66A9.957 9.957 0 0119.542 12c-1.274-4.057-5.064-7-9.542-7-1.74 0-3.37.52-4.773 1.409l1.54 1.54m-2.286 2.286L3 3"></path></svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4" x-data="{ show: false }">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <div class="relative">
                        <x-text-input id="password_confirmation" 
                                      class="block mt-1 w-full pr-10"
                                      x-bind:type="show ? 'text' : 'password'"
                                      name="password_confirmation" required autocomplete="new-password" />

                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 .946-3.001 3.49-5.32 6.57-6.118M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.773 4.773L19.227 19.227M17.34 14.66A9.957 9.957 0 0119.542 12c-1.274-4.057-5.064-7-9.542-7-1.74 0-3.37.52-4.773 1.409l1.54 1.54m-2.286 2.286L3 3"></path></svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button>
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>