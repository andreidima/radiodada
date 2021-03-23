/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// if (document.querySelector('#app')) {
//     const app = new Vue({
//         el: '#app',
//     });
// }


if (document.querySelector('#app1')) {
    const app1 = new Vue({
        el: '#app1',
        data: {
            international_piesa: '',
            international_trupa: '',
            international_titlu: '',
            international_imagine: '',
            international_descriere: '',
            international_link_youtube: '',
            international_link_interviu: '',
            international_magazin_virtual: '',
            romanesc_piesa: '',
            romanesc_trupa: '',
            romanesc_titlu: '',
            romanesc_imagine: '',
            romanesc_descriere: '',
            romanesc_link_youtube: '',
            romanesc_link_interviu: '',
            romanesc_magazin_virtual: ''
        },
        // methods: {
        //     trupa_func(trupa) {
        //         this.trupa = trupa;
        //     },
        //     titlu_func: function (titlu) {
        //         this.titlu = titlu;
        //     }
        // }
    });
}
