@props(['subtotal'])

<div class="bg-white rounded-xl shadow p-6 space-y-6">

    <h3 class="text-xl font-semibold text-brand-dark-blue">
        Order Summary
    </h3>

    {{-- Promo Code --}}
    <div>
        <label class="block font-medium text-brand-dark mb-2">Promo Code</label>
        <input 
            type="text"
            placeholder="Enter promo code"
            class="w-full border-brand-gray rounded-lg px-4 py-2 focus:border-brand-dark-blue"
        >
    </div>

    {{-- Subtotal / Delivery --}}
    <div class="border-t border-brand-gray pt-4 space-y-2">
        <p class="flex justify-between text-lg text-brand-dark">
            <span>Subtotal:</span>
            <span>£{{ number_format($subtotal, 2) }}</span>
        </p>

        <p class="flex justify-between text-lg text-brand-dark">
            <span>Delivery:</span>
            <span>£2.99</span>
        </p>
    </div>

    {{-- Checkout Button --}}
    <a
        href="/checkout"
        class="block text-center bg-brand-dark-blue text-white py-3 rounded-lg font-semibold hover:bg-opacity-90"
    >
        Proceed to Checkout
    </a>

</div>
