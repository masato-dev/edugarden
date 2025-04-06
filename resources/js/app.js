import './bootstrap';

// Third Party Libraries
import 'bootstrap';
import 'virtual-select-plugin/dist/virtual-select.min.js';
import toastr from 'toastr';
import $ from 'jquery';
import 'jquery-validation';


window.toastr = toastr;
window.$ = window.jQuery = $;

// Prototype
import './prototype/validator';

// Local modules
import './utils/auth';
import './utils/notification';
import './utils/k-validator';
import './common/index';
import './models/index';
import './services/network/index';
