<div
    x-data
    x-show="$store.toast.open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="fixed top-8 z-[100] p-4 rounded-lg shadow-lg w-full max-w-md mx-auto left-0 right-0"
    x-bind:class="{ 
        'bg-green-600 text-white': $store.toast.type === 'success', 
        'bg-red-600 text-white': $store.toast.type === 'error' 
    }"
    @click.outside="$store.toast.hide()"
    x-cloak
    style="display: none;"
>
    <div class="flex items-center justify-between">
        <span x-text="$store.toast.message"></span>
        <button @click="$store.toast.hide()" class="ml-3 -mr-1 p-1 rounded-full text-white opacity-70 hover:opacity-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
</div>