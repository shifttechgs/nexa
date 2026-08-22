import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
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
                nexa: {
                    navy: '#0B2340',
                    'navy-dark': '#071A30',
                    green: '#1E7A3C',
                    'green-dark': '#155A2C',
                    gold: '#C89B3C',
                    red: '#B3261E',
                    slate: '#4A5A6A',
                },
            },
        },
    },

    plugins: [forms],
};
