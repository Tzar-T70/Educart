<x-guest-layout>
    <main class="flex-grow bg-[var(--bg)] text-[var(--text)]">

        <!-- Header -->
        <section class="py-16 bg-[var(--card-bg)] text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[var(--text)]">
                Contact <span class="text-[var(--brand-dark-blue)]">Us</span>
            </h1>
            <p class="mt-4 text-lg md:text-xl max-w-2xl mx-auto text-[var(--text)]">
                If you have any issues, questions, or concerns, feel free to get in touch using the form below.
            </p>
        </section>

        <!-- Contact Form -->
        <section class="py-16 bg-[var(--card-bg)]">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <div class="bg-[var(--bg)] shadow-lg rounded-lg p-10">

                    <h2 class="text-2xl font-bold text-[var(--text)] mb-6">
                        Send Us a Message
                    </h2>

                    <!-- Success message -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text)]">Your Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                required
                                class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-brand-dark-blue focus:border-brand-dark-blue"
                            >
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text)]">Your Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                required
                                class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-brand-dark-blue focus:border-brand-dark-blue"
                            >
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text)]">Message</label>
                            <textarea 
                                name="message" 
                                rows="5" 
                                required
                                class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-brand-dark-blue focus:border-brand-dark-blue"
                            ></textarea>
                            @error('message')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div>
                            <button 
                                type="submit"
                                class="bg-[var(--accent)] text-white px-6 py-3 rounded-md hover:bg-opacity-90 transition"
                            >
                                Send Message
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>

        <!-- Email list (optional below form) -->
        <section class="pb-16 bg-[var(--bg)]">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-[var(--text)] mb-5">Support Emails</h2>

                <div class="bg-[var(--card-bg)] shadow-lg rounded-lg p-10">
                    <ul class="space-y-4 text-lg text-[var(--text)]">
                        <li><span class="font-semibold">Email 1:</span> 240066404@aston.ac.uk</li>
                        <li><span class="font-semibold">Email 2:</span> …</li>
                        <li><span class="font-semibold">Email 3:</span> …</li>
                        <li><span class="font-semibold">Email 4:</span> …</li>
                        <li><span class="font-semibold">Email 5:</span> …</li>
                        <li><span class="font-semibold">Email 6:</span> …</li>
                    </ul>
                </div>
            </div>
        </section>

    </main>
</x-guest-layout>
