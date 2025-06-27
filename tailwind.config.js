import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/**/*.php',
        './app/Forms/**/*.php',
        './app/Infolists/**/*.php',
        './app/Livewire/**/*.php',
    ],
    theme: {
        container: ({ theme }) => ({
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '1.5rem',
                lg: '2rem',
            },
        }),
        extend: {
            //
        },
    },
    plugins: [],
};
