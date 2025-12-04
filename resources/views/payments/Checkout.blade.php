<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-brand-dark-blue">
            Checkout
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

           
            <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold mb-4">Billing Information</h3>

                <form method="POST" action="{{ route('checkout.process') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">First Name</label>
                            <input type="text" name="first_name" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Last Name</label>
                            <input type="text" name="last_name" class="w-full border rounded p-2" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Email</label>
                            <input type="email" name="email" class="w-full border rounded p-2" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Address</label>
                            <input type="text" name="address" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium">City</label>
                            <input type="text" name="city" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Postal Code</label>
                            <input type="text" name="postal_code" class="w-full border rounded p-2" required>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mt-8 mb-4">Payment Details</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium">Card Number</label>
                            <input type="text" name="card_number" class="w-full border rounded p-2" placeholder="1234 5678 9012 3456" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium">Expiry Date</label>
                                <input type="text" name="expiry" class="w-full border rounded p-2" placeholder="MM/YY" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">CVC</label>
                                <input type="text" name="cvc" class="w-full border rounded p-2" placeholder="123" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="mt-6 w-full bg-brand-dark-blue text-white py-3 rounded-xl">Place Order</button>
                </form>
            </div>

            
            <div>
                <x-basket-summary :subtotal="$subtotal" />
            </div>
        </div>
    </div>
</x-app-layout>
