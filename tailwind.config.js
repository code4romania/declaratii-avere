import preset from './vendor/filament/support/tailwind.config.preset';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './app/Forms/**/*.php',
        './app/Infolists/**/*.php',
        './app/Livewire/**/*.php',
        './app/View/Components/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/js/**/*.js',
        './resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
        './vendor/filament/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/livewire/**/*.blade.php',
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
    plugins: [typography],
};
