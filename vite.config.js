import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command }) => {
    return {
        plugins: [
            laravel({
                input: [
                    'resources/css/index.css',
                    'resources/sass/app.scss',
                    'resources/js/app.js',
                    'resources/js/site.js',
                    'resources/css/style.css',
                    'resources/js/script.js',
                    'resources/css/app.css',

                ],
                refresh: true,
            }),
        ],
        server: {
            host: 'localhost',
            port: 5173, // Or any other available port
            strictPort: true,
            hmr: {
                host: 'localhost',
            },
        },
        build: {
            outDir: 'public/build', // Ensure the build output directory is correct
        },
    };
});
