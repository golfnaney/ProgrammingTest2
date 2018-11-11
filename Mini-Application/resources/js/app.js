require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
Vue.use(VueRouter);

Vue.component(
    "manage-component",
    require("./components/ManageLoanComponent.vue")
);
Vue.component("add-component", require("./components/AddLoanComponent.vue"));
Vue.component(
    "detail-component",
    require("./components/DetailLoanComponent.vue")
);
//Vue.http.headers.common["X-CSRF-TOKEN"] = Laravel.csrfToken;

// Vue.component("formInput", {
//     props: ["comFor", "comText", "comId", "comSimbol", "comBlind"],
//     template: `<div class="row form-group">
//         <label :for= "comFor" class= "col-4 control-label" > {{ comText }}  : </label>
//             <div class="col-8">
//                 <div class="input-group">
//                     <input type="text" class="form-control"   v-model="comBlind"  :id="comId" placeholder="Enter" required>
//                         <div class="input-group-prepend">
//                             <span class="input-group-text">{{ comSimbol }}</span>
//                         </div>
//                     </div>
//                 </div>
//             </div>`
// });
import ManageLoanComponent from "./components/ManageLoanComponent.vue";
import AddLoanComponent from "./components/AddLoanComponent.vue";
import DetailLoanComponent from "./components/DetailLoanComponent.vue";

const router = new VueRouter({
    mode: "history",
    base: __dirname,
    routes: [
        { path: "/", name: "manage", component: ManageLoanComponent },
        { path: "/add", name: "add", component: AddLoanComponent },
        {
            path: "/detail/:id",
            name: "detail",
            component: DetailLoanComponent
        }
    ],
    props: true
});

const app = new Vue({ router }).$mount("#app");

// const app = new Vue({
//     el: '#app'
// });
