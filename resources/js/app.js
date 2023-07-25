import './bootstrap';


import {createApp} from 'vue/dist/vue.esm-bundler';
import FormProperties from './components/formProperties.vue';

import { createI18n } from 'vue-i18n'
const translations = window.translations;

const i18n = createI18n({
    locale: window.locale,
    messages : {
        "ar" : translations,
        "en" : translations
    }
})

createApp({
    components: {
        'form-properties': FormProperties,
    }
}).use(i18n).mount("#app")


