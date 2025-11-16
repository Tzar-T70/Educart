<div
    x-show="open"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75"
    x-cloak
    style="display: none;"
    x-ref="modalWrapper"
    data-verify-url="{{ route('verification.code.verify') }}"
    data-resend-url="{{ route('verification.code.resend') }}"
    data-csrf="{{ csrf_token() }}"
>
    <div
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        @click.outside="closeModal()"
        class="relative w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden"
    >
        <button @click="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <div class="p-6">
            
            <div x-show="currentView === 'login'">
                 <h2 class="text-2xl font-bold text-brand-dark mb-4">{{ __('Log in') }}</h2>
                
                <form method="POST" action="{{ route('login') }}" @submit.prevent="handleLogin" x-ref="loginForm">
                    @csrf
                    <div x-show="loginError" class="mb-4">
                        <p class="text-sm text-red-600" x-text="loginError"></p>
                    </div>

                    <div>
                        <x-input-label for="login_email" :value="__('Email')" />
                        <x-text-input id="login_email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4" x-data="{ show: false }">
                        <x-input-label for="login_password" :value="__('Password')" />
                        <div class="relative">
                            <x-text-input id="login_password" 
                                          class="block mt-1 w-full pr-10"
                                          x-bind:type="show ? 'text' : 'password'"
                                          name="password" required autocomplete="current-password" />
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 .946-3.001 3.49-5.32 6.57-6.118M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.773 4.773L19.227 19.227M17.34 14.66A9.957 9.957 0 0119.542 12c-1.274-4.057-5.064-7-9.542-7-1.74 0-3.37.52-4.773 1.409l1.54 1.54m-2.286 2.286L3 3"></path></svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brand-dark-blue shadow-sm focus:ring-brand-dark-blue" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="button" @click="currentView = 'forgotPassword'" class="text-sm text-gray-600 hover:text-gray-900 underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Forgot your password?') }}
                        </button>
                        <x-primary-button class="ml-3 bg-brand-dark-blue hover:bg-opacity-90" x-bind:disabled="isVerifying">
                            <span x-show="!isVerifying">{{ __('Log in') }}</span>
                            <span x-show="isVerifying">Logging in...</span>
                        </x-primary-button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <button @click="currentView = 'register'" class="font-medium text-brand-dark-blue hover:underline">
                            Sign up
                        </button>
                    </p>
                </div>
            </div>

            <div x-show="currentView === 'register'">
                <h2 class="text-2xl font-bold text-brand-dark mb-4">{{ __('Sign up') }}</h2>
                <form method="POST" action="{{ route('register') }}" @submit.prevent="handleRegister">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

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

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="w-full justify-center bg-brand-dark-blue hover:bg-opacity-90" x-bind:disabled="isVerifying">
                            <span x-show="!isVerifying">{{ __('Register') }}</span>
                            <span x-show="isVerifying">Registering...</span>
                        </x-primary-button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <button @click="currentView = 'login'" class="font-medium text-brand-dark-blue hover:underline">
                            Log in
                        </button>
                    </p>
                </div>
            </div>

            <div x-show="currentView === 'forgotPassword'">
                <h2 class="text-2xl font-bold text-brand-dark mb-2">{{ __('Forgot Password?') }}</h2>
                <p class="text-sm text-gray-600 mb-4">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link.') }}
                </p>

                <form method="POST" action="{{ route('password.email') }}" @submit.prevent="handleForgotPassword">
                    @csrf
                    <div>
                        <x-input-label for="forgot_email" :value="__('Email')" />
                        <x-text-input id="forgot_email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <button type="button" @click="currentView = 'login'" class="text-sm text-brand-dark-blue hover:underline">
                            Back to login
                        </button>
                        <x-primary-button class="bg-brand-dark-blue hover:bg-opacity-90">
                            {{ __('Email Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div x-show="currentView === 'forgotPasswordSuccess'">
                 <h2 class="text-2xl font-bold text-brand-dark mb-2">{{ __('Check Your Email') }}</h2>
                <p class="text-sm text-gray-600 mb-4">
                    We've emailed you a password reset link. Please check your inbox (and spam folder) to continue.
                </p>
                <x-primary-button @click="closeModal()" class="w-full justify-center bg-brand-dark-blue hover:bg-opacity-90">
                    {{ __('Got it') }}
                </x-primary-button>
            </div>

            <div x-show="currentView === 'verifyCode'">
                <button @click.prevent="currentView = 'login'" class="absolute top-3 left-3 text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <h2 class="text-2xl font-bold text-brand-dark mb-2 text-center">{{ __('Check Your Email') }}</h2>
                <p class="text-sm text-gray-600 mb-4 text-center">
                    We've sent a 6-digit code to your email.
                </p>

                <div class="flex justify-center space-x-2" x-ref="codeInputs">
                    <template x-for="(digit, index) in code" :key="index">
                        <input
                            type="text"
                            maxlength="1"
                            pattern="[0-9]"
                            x-model="code[index]"
                            @input.prevent="handleCodeInput($event, index)"
                            @keydown.backspace.prevent="handleBackspace($event, index)"
                            @paste.prevent="handlePaste($event)"
                            x-bind:disabled="isVerifying"
                            class="w-12 h-14 text-center text-2xl font-bold rounded-md border border-gray-300 shadow-sm focus:border-brand-dark-blue focus:ring focus:ring-brand-dark-blue focus:ring-opacity-50"
                            x-bind:class="{ 
                                'border-red-500 text-red-600': verificationError,
                                'border-green-500 text-green-600': verificationSuccess
                            }"
                        >
                    </template>
                </div>

                <div class="text-center mt-2" x-show="verificationError">
                    <p class="text-sm text-red-600" x-text="verificationError"></p>
                </div>

                <div class="mt-4 flex items-center justify-center">
                    <button
                        type="button"
                        @click.prevent="resendCode"
                        x-bind:disabled="isResending || timerMessage !== ''"
                        class="text-sm text-brand-dark-blue hover:underline disabled:text-gray-400 disabled:no-underline"
                    >
                        Resend Code
                    </button>
                    <span x-show="timerMessage" x-text="timerMessage" class="ml-2 text-sm text-gray-500"></span>
                </div>
            </div>

        </div>
    </div>
</div>