import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';


const styleModules = [
    'resources/css/modules/pages/clients/home.scss',
    'resources/css/modules/pages/clients/cart.scss',

    'resources/css/libraries/jquery-pagination.min.css',
]

const styles = [
    'resources/css/app.scss',
    ...styleModules,
]


const scripts = [
    'resources/js/app.js',
    'resources/js/pages/book-detail.js',
    'resources/js/pages/cart-listing.js',
    'resources/js/pages/order.js',
    'resources/js/pages/contact.js',

    'resources/js/libraries/jquery-pagination.min.js',
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
