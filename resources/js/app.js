import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import collapse from '@alpinejs/collapse'
import intersect from '@alpinejs/intersect'
import Swal from 'sweetalert2';


window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(collapse);
Alpine.plugin(intersect);

Alpine.start();
