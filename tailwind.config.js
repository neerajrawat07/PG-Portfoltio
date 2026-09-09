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
            colors: {
                // Light editorial base
                paper: {
                    DEFAULT: '#F7F7F5',  // warm off-white page bg
                    soft:    '#F0F0ED',  // slightly deeper section bg
                    card:    '#FFFFFF',  // raised surface
                },
                ink: {
                    DEFAULT: '#17171B',  // near-black text
                    soft:    '#3A3A42',  // secondary text
                    muted:   '#6E6E78',  // muted text
                    faint:   '#9B9BA6',  // faint text
                    line:    'rgba(0,0,0,0.08)',
                },
                // Accents
                electric: {
                    blue:   '#5B5BFF',
                    violet: '#8B5CF6',
                    cyan:   '#06B6D4',
                    pink:   '#F43F8E',
                    gold:   '#E0B84A',
                },
            },

            fontFamily: {
                display: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
                body: ['"Manrope"', ...defaultTheme.fontFamily.sans],
            },

            fontSize: {
                'display-xl': 'clamp(4rem, 11vw, 9rem)',
                'display-lg': 'clamp(2.75rem, 8vw, 6.25rem)',
                'display-md': 'clamp(2rem, 5vw, 4rem)',
            },

            spacing: { '18': '4.5rem', '30': '7.5rem' },

            boxShadow: {
                card: '0 1px 2px rgba(0,0,0,0.04), 0 12px 34px -18px rgba(23,23,27,0.18)',
                lift: '0 2px 6px rgba(0,0,0,0.05), 0 26px 60px -22px rgba(23,23,27,0.28)',
                glow: '0 18px 60px -18px rgba(91,91,255,0.35)',
            },

            keyframes: {
                marquee: {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-50%)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-14px)' },
                },
                'pulse-soft': {
                    '0%, 100%': { opacity: '0.45' },
                    '50%': { opacity: '1' },
                },
                'spin-slow': {
                    from: { transform: 'rotate(0deg)' },
                    to: { transform: 'rotate(360deg)' },
                },
            },

            animation: {
                marquee: 'marquee 36s linear infinite',
                'marquee-rev': 'marquee-rev 46s linear infinite',
                float: 'float 6s ease-in-out infinite',
                'pulse-soft': 'pulse-soft 4s ease-in-out infinite',
                'spin-slow': 'spin-slow 24s linear infinite',
                'spin-slower': 'spin-slow 48s linear infinite',
            },
        },
    },

    plugins: [forms],
};
