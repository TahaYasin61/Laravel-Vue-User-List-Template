require('./bootstrap');

window.Vue = require('vue');

import App from './components/App';

import router from './router/index';

const app = new Vue({
    el: '#app',
    template : '<App/>',
    components : { App },
    router : router // import edilen router'ı kullanabilmek için
});
