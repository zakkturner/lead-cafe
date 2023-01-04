

import { createApp } from "vue";
import App from "./App.vue";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faAngleDown, faAngleUp } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faAngleUp, faAngleDown)

import { createPinia } from "pinia";
import router from './router';
console.log(router);
const app = createApp(App).use(router).component('font-awesome-icon', FontAwesomeIcon).use(createPinia());

app.mount('#app');

// router.isReady().then(() => {
//     app.mount("#app");
// });
