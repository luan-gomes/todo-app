require("./bootstrap");

window.Vue = require("vue").default;

import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);

Vue.use(IconsPlugin);

Vue.component("app", require("./components/App.vue").default);
Vue.component("type-form", require("./components/TypeForm.vue").default);
Vue.component("type-list", require("./components/TypeList.vue").default);
Vue.component(
    "type-list-item",
    require("./components/TypeListItem.vue").default
);
Vue.component("task-form", require("./components/TaskForm.vue").default);
Vue.component("task-list", require("./components/TaskList.vue").default);
Vue.component(
    "task-list-item",
    require("./components/TaskListItem.vue").default
);

const app = new Vue({
    el: "#app"
});
