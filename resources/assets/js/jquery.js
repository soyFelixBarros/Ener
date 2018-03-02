$(document).ready(function () {
    $(function () {
        $("time.timeago").timeago();
    });
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});

// Spanish
jQuery.timeago.settings.strings = {
   prefixAgo: "Hace",
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

// Spanish shortened
// jQuery.timeago.settings.strings = {
//   prefixAgo: null,
//   prefixFromNow: null,
//   suffixAgo: "",
//   suffixFromNow: "",
//   seconds: "1m",
//   minute: "1m",
//   minutes: "%dm",
//   hour: "1h",
//   hours: "%dh",
//   day: "1d",
//   days: "%dd",
//   month: "1me",
//   months: "%dme",
//   year: "1a",
//   years: "%da",
//   wordSeparator: " ",
//   numbers: []
// };