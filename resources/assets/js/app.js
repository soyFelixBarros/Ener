require('./bootstrap');

$( document ).ready(function() {
  $('#input-tags').selectize({
      delimiter: ', ',
      persist: false,
      create: function(input) {
          return {
              value: input,
              text: input
          }
      }
  });
  $('time.timeago').timeago();
});

jQuery.timeago.settings.strings = {
   prefixAgo: "hace",
   prefixFromNow: "dentro de",
   suffixAgo: "",
   suffixFromNow: "",
   seconds: "menos de un minuto",
   minute: "un minuto",
   minutes: "unos %d minutos",
   hour: "una hora",
   hours: "%d horas",
   day: "un día",
   days: "%d días",
   month: "un mes",
   months: "%d meses",
   year: "un año",
   years: "%d años"
};

Vue.component('posts', require('./components/Posts.vue'));

const app = new Vue({
    el: '#app'
});
