import './bootstrap';

// Third Party Libraries
import 'bootstrap';

import toastr from 'toastr';
import 'virtual-select-plugin/dist/virtual-select.min.js';

window.toastr = toastr;
// Local modules
import './utils/auth';
import './utils/notification';
import './common/index';
