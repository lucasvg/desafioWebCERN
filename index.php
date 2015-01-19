<!-- feito por Lucas Vieira -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <script type="text/JavaScript" src="js/utilFunctions.js"></script>
    <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/JavaScript" src="libs/jquery/jquery.cookie.js"></script>
    <script type="text/JavaScript" src="libs/tablesorter/jquery.tablesorter.min.js"></script>
  </head>
 <body class="container">
  <a href="configs.php" class="btn btn-primary">Edit Configs</a>
    <table class="table table-striped table-bordered table-condensed" id="myTable">
      <script type="text/javascript">
      /* GET ALL THE PROPERTIES FOUND ON PACIENTE AND PRINT ON HTML LIKE A JSON
      var x = xmlDoc.getElementsByTagName("paciente");
      var myObject = new Object();
      for (var i = 0; i < x.length; i++) {
        for(var k = 1; k < x[i].childNodes.length; k+=2 ){
          myObject[x[i].childNodes[k].nodeName] = true;
        }
      }
      document.write(JSON.stringify(myObject, null, "<br>"));*/


      document.write("<thead><tr>");

      var allowedKeys = [];

      // creates the columns of the table
      var configs = updateConfigNamesbyCookiePreferences(loadJSONFile("resource/configs.json"));
      for(var key in configs){
        if(configs[key]){
          allowedKeys.push(key);
          document.write("<th>" + key + "</th>");
        }
      }
      document.write("</tr></thead>");


      document.write("<tbody>");
      // populates the table with the patient
      xmlDoc = loadXMLFile("resource/paciente_doentesNovos_2011'02'04'12h58min_backup.xml");
      var x = xmlDoc.getElementsByTagName("paciente");
      for (var i = 0; i < x.length; i++) {
        document.write("<tr class=\"input-sm\">");
        for (var k = 0; k < allowedKeys.length; k++) {
          document.write("<td>");
          if(typeof x[i].getElementsByTagName(allowedKeys[k])[0] != "undefined" && typeof x[i].getElementsByTagName(allowedKeys[k])[0].childNodes[0] != "undefined"){
            document.write(x[i].getElementsByTagName(allowedKeys[k])[0].childNodes[0].nodeValue);
          }
          document.write("</td>");
        };
        document.write("</tr>");
      };
      document.write("</tbody>");

      $(document).ready(function() {
          $("#myTable").tablesorter();
        }
      );

      </script>
    </table>

    <div id="autor">
      <span>Por Lucas Vieira</span>
    </div>

  </body>
</html>