import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/fetchData.js',
                'resources/js/dashboard.js',
                'resources/js/states.js',
                'resources/js/municipalities.js',
            ],
            refresh: true,
        }),
    ],
});
