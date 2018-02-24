        <footer class="page-footer grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Creator</h5>
                <p class="grey-text text-lighten-4">Mauricio Eduardo Garcia Mardones.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Licences</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://codeigniter.com/">Codeigniter</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://jquery.com/">Jquery</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright
            </div>
          </div>
        </footer>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
<!-- tablesorter plugin -->
<script src="js/jquery.tablesorter.js"></script>
<!-- tablesorter widget file - loaded after the plugin -->
<script src="js/jquery.tablesorter.widgets.js"></script>

<!-- pager plugin -->
<link rel="stylesheet" href="css/jquery.tablesorter.pager.css">
<script src="js/jquery.tablesorter.pager.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
      <script type="text/javascript" src="js/funciones.js"></script>
      <script>
          $(function() {

  $("table").tablesorter({
    theme : "materialize",

    widthFixed: true,
    // widget code contained in the jquery.tablesorter.widgets.js file
    // use the zebra stripe widget if you plan on hiding any rows (filter widget)
    widgets : [ "filter", "zebra" ],

    widgetOptions : {
      // using the default zebra striping class name, so it actually isn't included in the theme variable above
      // this is ONLY needed for materialize theming if you are using the filter widget, because rows are hidden
      zebra : ["even", "odd"],

      // reset filters button
      filter_reset : ".reset",

      // extra css class name (string or array) added to the filter element (input or select)
      // select needs a "browser-default" class or it gets hidden
      filter_cssFilter: ["", "", "browser-default"]
    }
  })
  .tablesorterPager({

    // target the pager markup - see the HTML block below
    container: $(".ts-pager"),

    // target the pager page select dropdown - choose a page
    cssGoto  : ".pagenum",

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // output string - default is '{page}/{totalPages}';
    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

  });

});
      </script>
</body>
</html>