/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//
// require("./bootstrap");
// import { createPinia } from "pinia";
// window.Vue = require("vue").default;
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// Vue.component(
//     "custom-button",
//     require("./components/CustomButton.vue").default
// );
// Vue.component(
//     "prospect-list",
//     require("./components/ProspectList.vue").default
// );
// Vue.component(
//     "prospect-card",
//     require("./components/ProspectCard.vue").default
// );
// Vue.component(
//     "custom-message",
//     require("./components/CustomMessage.vue").default
// );
// Vue.component("custom-modal", require("./components/CustomModal.vue").default);
// Vue.component("side-bar", require("./components/layout/Sidebar.vue").default);
// Vue.component(
//     "checkbox-filter",
//     require("./components/filters/CheckBoxFilter.vue").default
// );
// Vue.component(
//     "search-filter",
//     require("./components/filters/SearchFilter.vue").default
// );
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// const app = new Vue({
//     el: "#app",
// });
// app.use(createPinia());

import { createApp } from "vue";
import App from "./App.vue";

import { createPinia } from "pinia";
import router from './router'
console.log(router)
const app = createApp(App).use(router).use(createPinia());

app.mount('#app');

// router.isReady().then(() => {
//     app.mount("#app");
// });
