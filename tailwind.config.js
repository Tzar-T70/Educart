const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
                        colors: {
                'brand-dark-blue': '#285570',
                'brand-beige': '#e3ded7',
                'brand-cream': '#faf7f6',
                'brand-gray': '#cbcac7',
                'brand-dark': '#333333',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
