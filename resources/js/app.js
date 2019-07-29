
require('./bootstrap');


import VueRouter from 'vue-router'
import UserComponent from './components/Admin/Users.vue'
import ProfileComponent from './components/Admin/Profile.vue'
import DashboardComponent from './components/Dashboard.vue'
import GroupComponent from './components/Admin/Group.vue'
import CategoryComponent from './components/Admin/Category.vue'
import AuthorComponent from './components/Admin/Author.vue'
import PublicationComponent from './components/Admin/Publication.vue'
import ProductComponent from './components/Admin/Product.vue'


// Date format
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform'
import VueProgressBar from 'vue-progressbar'
// ES6 Modules or TypeScript
import swal from 'sweetalert2'

window.Vue = require('vue');
window.Form = Form;
window.Fire = new Vue();
window.swal = swal;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'))
Vue.use(VueRouter)
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
})
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;


Vue.filter('upText', function(text) {
  return text.toUpperCase()
});

Vue.filter('myDate', function(text) {
  return moment(text).format("MMM / DD / YYYY");
});
// window.Fire = new Vue();




Vue.component('example-component', require('./components/Dashboard.vue').default);


const user = new Vue({
    el: '#vue-user',
    data: {
      
    },

    components: {
      'user-component': UserComponent,
      'profile-component': ProfileComponent,
      'dashboard-component': DashboardComponent,
      'group-component': GroupComponent,
      'category-component': CategoryComponent,
      'author-component': AuthorComponent,
      'publication-component': PublicationComponent,
      'product-component': ProductComponent,

    }
});
