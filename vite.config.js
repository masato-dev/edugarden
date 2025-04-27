import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';


const styleModules = [
    'resources/css/modules/pages/clients/home.scss',
]

const styles = [
    'resources/css/app.scss',
    ...styleModules,
]


const scripts = [
    'resources/js/app.js',
    'resources/js/pages/book-detail.js',
    'resources/js/pages/cart-listing.js',
]

const resources = [...styles, ...scripts]

export default defineConfig({
    plugins: [
        laravel({
            input: resources,
            refresh: true,
        }),
        tailwindcss(),
    ],
});
