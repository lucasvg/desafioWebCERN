<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <script type="text/JavaScript" src="js/utilFunctions.js"></script>
    <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/JavaScript" src="libs/jquery/jquery.cookie.js"></script>
  </head>
	<body class="container">
		<a href="index.php" onclick="salvarDados();" class="btn btn-success col-md-offset-2">Salvar</a>
		<a href="index.php" class="btn btn-danger col-md-offset-1">Cancelar</a>
		<!--<a href="#" onclick="setAllCheckBoxes(true);" class="btn btn-default col-md-offset-1">Selecionar Todos</a>-->
		<a href="#" onclick="setAllCheckBoxes(false);" class="btn btn-default col-md-offset-1">Limpar</a>
		<table id="table-settings" class="table table-hover">
			<th class="text-center">Config</th><th>Enable</th>
		</table>
	</body>

	<script type="text/javascript">
		$(document).ready(function() {

			// global variable
			configs = updateConfigNamesbyCookiePreferences(loadJSONFile("resource/configs.json"));

      for(var key in configs){
      	var tr = "<tr" + ((!configs[key]) ? "":" class=\"success\"") + " onclick=\"check(" + key + ")\">";

      	tr += "<td class=\"col-md-1 text-center \">" + "<input id=\"" + key + "\" type=\"checkbox\" " + ((configs[key]) ? "checked":"") + "></td>";
      	tr += "<td>" + key + "</td>";

      	tr += "</tr>";
      	$('#table-settings tr:last').after(tr);
      }


      // stop propagation of it's parent click
			$("input").click(function(event){
			  event.stopPropagation();
			});


			$("input").change(function() {
				// update configs
				configs[this.id] = this.checked;

				// change the color of the row
				var row = $(this).parent().parent()[0];
				if(this.checked)
					row.classList.add("success");
				else
					row.removeAttribute("class");
			});
		});

		function salvarDados(){
			saveConfigs(configs);

			/*for(var key in configs){
				if($("#" + key).is(':checked'))
					$.removeCookie(key);
				else
					$.cookie(key, false);
				console.log($("#" + key).is(':checked'));
			}*/
		}

		function check(key){
			var input = key;
			input.checked = !input.checked;
			$(input).change();
		}

		function setAllCheckBoxes(checked){
			if(checked)
				$('input:checkbox').prop('checked', true);
			else
				$('input:checkbox').removeAttr('checked');
			$("input").change();
		}

	</script>
</html>