import './bootstrap';

import 'flowbite';

import { createApp } from 'vue';
import StatsComponent from './components/StatsComponent.vue';

createApp({})
    .component('stats-component', StatsComponent)
    .mount('#app')
