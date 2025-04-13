import axios from 'axios';

import './services/network/index';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Dependencies Injection

window.instanceNames = window.instanceNames || {
    BookService: 'BookService',
    CartService: 'CartService',
};

window.instances = window.instances || {
    [instanceNames.BookService]: null,
    [instanceNames.CartService]: null,
};

window.locator = {
    register: (className, instance) => (window[className] = window.instances[className] = instance),
    make: (className) => window.instances[className] ? window.instances[className] : window[className](),
}


locator.register(instanceNames.BookService, new BookService());
locator.register(instanceNames.CartService, new CartService());
