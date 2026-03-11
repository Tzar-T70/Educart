<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-[var(--card-bg)] border border-[var(--brand-beige)] rounded-md font-semibold text-xs text-[var(--text)] uppercase tracking-widest shadow-sm hover:bg-[var(--bg)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-dark-blue)] focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
