      /* START :Programme de désactivation du billet journée après 14heures */ 
      var now = Date.now();
      var date = new Date();
      date.getFullYear();
      date.getMonth();
      date.getDate();
      date.setHours(14,0,0);
     
      $(function(){
        if ( now > date ){
              $("#billetjournee").hide();
         }else{
             $("#billetjournee").show();    
        }});
      /* END */
      $(function(){
            $("#lp_reservationbundle_reservation_country").val('FR');
      });    

      $(function(){
      $('.js-datepicker').datepicker({
      format:'dd/mm/yy',
      language: 'fr',
      autoclose:true,
      startDate: 'd',
      endDate: '+365d' ,
      datesDisabled: ['01/01/2017','17/04/2017','01/05/2017','08/05/2017','25/05/2017','05/06/2017','14/07/2017','15/08/2017','01/11/2017','11/11/2017','25/12/2017',
      '01/01/2018','17/04/2018','01/05/2018','08/05/2018','25/05/2018','05/06/2018','14/07/2018','15/08/2018','01/11/2018','11/11/2018','25/12/2018'],
      daysOfWeekDisabled: [0,2]
          });
           });

     (function($){
    $.fn.datepicker.dates['fr'] = {
    days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
    daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
    daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
    months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
    monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
    today: "Aujourd'hui",
    monthsTitle: "Mois",
    clear: "Effacer",
    weekStart: 1,
    format: "dd/mm/yyyy"
    };
    }(jQuery));

   (function($){
    $('.datepicker-js').datepicker({
      format:'dd/mm/yy',
      language: 'fr',
      autoclose:true,
      startDate: '-70y',
      endDate: '-18y' 
          });
           }(jQuery));

   (function($){
    $('.datepicker-js-js').datepicker({
      format:'dd/mm/yy',
      language: 'fr',
      autoclose:true,
      startDate: '-70y',
      endDate: '-y' 
          });
           }(jQuery));
      
     
    

  

