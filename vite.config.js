import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
<<<<<<< HEAD
});
=======
});
>>>>>>> 1b3c415bc463075f2b32986037924370c25be7c8
