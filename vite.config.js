import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/bootstrap/dist/css/bootstrap.css'
            ],
            refresh: true,
            output: 'public/css',
        }),
    ],
    optimizeDeps: {
        include: ['jquery'],
    },
});
