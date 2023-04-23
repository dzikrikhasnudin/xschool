import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(collapse);

Alpine.start();
