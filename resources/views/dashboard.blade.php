<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-brand-dark-blue leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, Admin!</h3>
                    <p class="mb-6">You have access to manage the shop.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Placeholder for future admin modules -->
                        <div class="p-6 border border-gray-200 rounded-lg bg-brand-cream">
                            <h4 class="font-bold text-brand-dark-blue mb-2">Manage Products</h4>
                            <p class="text-sm text-gray-600 mb-4">Add, edit, or remove products.</p>
                            <button class="bg-brand-dark-blue text-white px-4 py-2 rounded hover:bg-opacity-90 transition w-full">Go to Products</button>
                        </div>
                        
                        <div class="p-6 border border-gray-200 rounded-lg bg-brand-cream">
                            <h4 class="font-bold text-brand-dark-blue mb-2">Manage Categories</h4>
                            <p class="text-sm text-gray-600 mb-4">Organize shop categories.</p>
                            <button class="bg-brand-dark-blue text-white px-4 py-2 rounded hover:bg-opacity-90 transition w-full">Go to Categories</button>
                        </div>

                        <div class="p-6 border border-gray-200 rounded-lg bg-brand-cream">
                            <h4 class="font-bold text-brand-dark-blue mb-2">User Management</h4>
                            <p class="text-sm text-gray-600 mb-4">View and manage users.</p>
                            <button class="bg-brand-dark-blue text-white px-4 py-2 rounded hover:bg-opacity-90 transition w-full">Go to Users</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
