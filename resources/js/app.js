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
            international_imagine: internationalImagineInitiala,
            international_descriere: '',
            international_link_youtube: '',
            international_link_interviu: '',
            international_magazin_virtual: '',
            romanesc_piesa: '',
            romanesc_trupa: '',
            romanesc_titlu: '',
            romanesc_imagine: romanescImagineInitiala,
            romanesc_descriere: '',
            romanesc_link_youtube: '',
            romanesc_link_interviu: '',
            romanesc_magazin_virtual: '',

            top_incarcat: '',

            top_international_bg_color: 'bg-white',
            top_international_text_color: 'text-black',

            top_romanesc_bg_color: 'bg-white',
            top_romanesc_text_color: 'text-black'
        },


        methods: {
            schimbaCuloare: function (value) {
                if (value == "top_international_danger"){
                    this.top_international_bg_color = "bg-danger";
                    this.top_international_text_color= "text-white";
                } else if (value == "top_international_white") {
                    this.top_international_bg_color = "bg-white";
                    this.top_international_text_color = "text-black";
                } else if (value == "top_romanesc_danger") {
                    this.top_romanesc_bg_color = "bg-danger";
                    this.top_romanesc_text_color = "text-white";
                } else if (value == "top_romanesc_white") {
                    this.top_romanesc_bg_color = "bg-white";
                    this.top_romanesc_text_color = "text-black";
                }
            }
        }
    });
}
