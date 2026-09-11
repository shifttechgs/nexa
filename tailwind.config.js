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
                // Satoshi (display) + Switzer (body) from Fontshare, IBM Plex Mono for labels/mono.
                sans: ['Switzer', 'Inter', ...defaultTheme.fontFamily.sans],
                display: ['Satoshi', 'Switzer', ...defaultTheme.fontFamily.sans],
                label: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
                mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                // 60 / 20 / 10 brand system, taken from the Nexa logo:
                // paper (warm off-white) is dominant, navy is structural/secondary, green is the sole accent.
                nexa: {
                    paper: '#F7F6F3',
                    bone: '#FFFFFF',
                    mist: '#EEEDE8',
                    line: 'rgba(11, 35, 64, 0.12)',
                    ink: '#0B2340',
                    navy: '#0B2340',
                    'navy-dark': '#071A30',
                    green: '#1E7A3C',
                    'green-dark': '#155A2C',
                    red: '#B3241C',
                },
            },
            letterSpacing: {
                tightest: '-0.03em',
            },
            // Square-edged, spec-sheet aesthetic — every rounded-* utility collapses to 0.
            borderRadius: {
                none: '0',
                sm: '0',
                DEFAULT: '0',
                md: '0',
                lg: '0',
                xl: '0',
                '2xl': '0',
                '3xl': '0',
                full: '0',
            },
            backgroundImage: {
                'brand-stripes': 'repeating-linear-gradient(135deg, #1E7A3C 0, #1E7A3C 14px, #0B2340 14px, #0B2340 28px)',
            },
        },
    },

    plugins: [forms],
};
