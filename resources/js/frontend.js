require('./bootstrap');
import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

import Vue from 'vue'


Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.mixin({
    methods: {
        error(field, errorBag = 'default') {

            if(this.$page.errors.hasOwnProperty(field)) {
                return this.$page.errors[field][0];
            }

            return null;
        }
    }
});


const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Frontend/Pages/${name}`).default,
            },
        }),
}).$mount(app);
