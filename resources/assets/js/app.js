/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import VueSkycons from 'vue-skycons';

Vue.use(Vuetify);
Vue.use(VueSkycons, { color: 'black' });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    "dashboard-count",
    require("./components/Dashboard/DashboardCount.vue")
);
Vue.component(
    "dashboard-count-page",
    require("./components/Dashboard/DashboardCountPage.vue")
);
Vue.component(
    "dashboard-news",
    require("./components/Dashboard/DashboardNews.vue")
);
Vue.component(
    "dashboard-news-list",
    require("./components/Dashboard/DashboardNewsList.vue")
);
Vue.component(
    "dashboard-user-list",
    require("./components/Dashboard/DashboardUserList.vue")
);
Vue.component(
    "weather-page",
    require("./components/Weather/WeatherPage")
);

new Vue({
    el: "#admin",
    props: {
        source: String
    },
    data: () => ({
        drawer: null
    }),
    methods: {
        logout(logoutUrl, url) {
            axios.post(logoutUrl).then(() => {
                window.location.href = url;
            });
        }
    }
});
