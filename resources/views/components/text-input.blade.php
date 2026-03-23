@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[var(--border)] dark:border-gray-600 bg-[var(--bg)] dark:bg-gray-700 text-[var(--text)] dark:text-white focus:border-[var(--brand)] dark:focus:border-blue-400 focus:ring-[var(--brand)] dark:focus:ring-blue-400 rounded-md shadow-sm']) !!}>