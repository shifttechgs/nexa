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
                sans: ['"IBM Plex Sans"', ...defaultTheme.fontFamily.sans],
                display: ['Archivo', ...defaultTheme.fontFamily.sans],
                label: ['Oswald', ...defaultTheme.fontFamily.sans],
                mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                // 60 / 20 / 10 brand system, taken from the Nexa logo:
                // paper (white) is dominant, navy is structural/secondary, green is the sole accent.
                nexa: {
                    paper: '#FFFFFF',
                    ink: '#0B2340',
                    navy: '#0B2340',
                    'navy-dark': '#071A30',
                    green: '#1E7A3C',
                    'green-dark': '#155A2C',
                    red: '#B3241C',
                },
            },
            backgroundImage: {
                'brand-stripes': 'repeating-linear-gradient(135deg, #1E7A3C 0, #1E7A3C 14px, #0B2340 14px, #0B2340 28px)',
            },
        },
    },

    plugins: [forms],
};
