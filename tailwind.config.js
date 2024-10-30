import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                h1: '2rem',
                h2: '1.5rem',
                h3: '1.17rem',
                h4: '1rem',
                h5: '0.83rem',
                h6: '0.67rem',
            }
        },
    },
    plugins: [],
    safelist: [
        'w-1/5',
        'w-2/5',
        'w-3/5',
        'w-4/5',
        'w-5/5',
        'mb-8',
        'pb-8'
    ]
};
