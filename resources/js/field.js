Nova.booting((Vue, router) => {
    Vue.component('index-froala-editor', require('./components/IndexField'));
    Vue.component('detail-froala-editor', require('./components/DetailField'));
    Vue.component('form-froala-editor', require('./components/FormField'));
})
