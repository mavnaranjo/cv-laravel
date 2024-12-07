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
                sans: ['Noto Sans', ...defaultTheme.fontFamily.sans]
            },
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
