/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});

$(".alert.flash")
    .fadeTo(3000, 500)
    .slideUp(500, function() {
        $(".alert.flash").slideUp(1000);
    });

$(document).ready(function() {
    $("#content").summernote();
    // slect2
    $("#tags_id").select2({
        tags: true,
        placeholder: "Select a tags"
    });
    // add class active to the sidebar
    $("a.my-list").click(function() {
        // remove classes from all
        $("a.my-list").removeClass("active");
        // add class to the one we clicked
        $(this).addClass("active");
    });
});
