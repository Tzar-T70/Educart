@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-brand-dark-blue focus:ring-brand-dark-blue rounded-md shadow-sm']) !!}>