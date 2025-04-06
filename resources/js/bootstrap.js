import axios from 'axios';
import './services/network/index';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.instances = window.instances || {
    BookService: null,
};

window.locator = {
    register: (className, instance) => (window[className] = window.instances[className] = instance),
    make: (className) => window.instances[className] ? window.instances[className] : window[className](),
}


// Dependencies Injection
locator.register(window.instances.BookService ?? 'BookService', new BookService());
