import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //
                'resources/css/filament/admin/theme.css',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [...refreshPaths, 'app/Livewire/**'],
        }),
    ],
});
