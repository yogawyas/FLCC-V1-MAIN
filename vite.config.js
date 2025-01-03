import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/about.css', 
                'resources/css/welcome.css', 
                'resources/css/dashboard.css', 
                'resources/css/ministry.css', 
                'resources/css/news.css', 
                'resources/css/event.css', 
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
