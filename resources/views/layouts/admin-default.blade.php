<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link href="/css/bootstrap.css" rel="stylesheet">
      <!--external css-->
      <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="/css/zabuto_calendar.css">
      <link rel="stylesheet" type="text/css" href="/js/gritter/css/jquery.gritter.css" />
      <link rel="stylesheet" type="text/css" href="/lineicons/style.css">    

      <!-- Custom styles for this template -->
      <link href="/css/style.css" rel="stylesheet">
      <link href="/css/style-responsive.css" rel="stylesheet">

      <script src="/js/chart-master/Chart.js"></script>
      <title>Admin Panel</title>
   </head>
   <body>

      <section id="container">

         @include('includes.admin-navbar')


         @include('includes.admin-sidebar')

<section id="main-content">
   <section class="wrapper">
         @yield('admin-content')

</section>
</section>


      </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="/js/jquery.js"></script>
      <script src="/js/jquery-1.8.3.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="/js/jquery.scrollTo.min.js"></script>
      <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="/js/jquery.sparkline.js"></script>


      <!--common script for all pages-->
      <script src="/js/common-scripts.js"></script>

      <script type="text/javascript" src="/js/gritter/js/jquery.gritter.js"></script>
      <script type="text/javascript" src="/js/gritter-conf.js"></script>

      <!--script for this page-->
      <script src="/js/sparkline-chart.js"></script>    
      <script src="/js/zabuto_calendar.js"></script>	

      <!--<script type="text/javascript">-->
         <!--$(document).ready(function () {-->
            <!--var unique_id = $.gritter.add({-->
               <!--// (string | mandatory) the heading of the notification-->
               <!--title: 'Welcome to Dashgum!',-->
               <!--// (string | mandatory) the text inside the notification-->
               <!--text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',-->
               <!--// (string | optional) the image to display on the left-->
               <!--image: '/img/ui-sam.jpg',-->
               <!--// (bool | optional) if you want it to fade out on its own or just sit there-->
               <!--sticky: true,-->
               <!--// (int | optional) the time you want it to be alive for before fading out-->
               <!--time: '',-->
               <!--// (string | optional) the class name you want to apply to that specific message-->
               <!--class_name: 'my-sticky-class'-->
            <!--});-->

            <!--return false;-->
         <!--});-->
      <!--</script>-->

      <script type="application/javascript">
         $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
               $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
               action: function () {
                  return myDateFunction(this.id, false);
               },
               action_nav: function () {
                  return myNavFunction(this.id);
               },
               ajax: {
                  url: "show_data.php?action=1",
                  modal: true
               },
               legend: [
                  {type: "text", label: "Special event", badge: "00"},
                  {type: "block", label: "Regular event", }
               ]
            });
         });


function myNavFunction(id) {
   $("#date-popover").hide();
   var nav = $("#" + id).data("navigation");
   var to = $("#" + id).data("to");
   console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
</script>
   </body>
</html>
