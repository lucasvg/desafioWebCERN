function loadXMLFile(path){
  var xmlhttp;

  if (window.XMLHttpRequest)
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  else
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  

  xmlhttp.open("GET", path,false);
  xmlhttp.send();

  return xmlhttp.responseXML;
}


function loadJSONFile(path){
  var xmlhttp;

  if (window.XMLHttpRequest)
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  else
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  

  xmlhttp.open("GET", path,false);
  xmlhttp.send();
  return JSON.parse(xmlhttp.responseText);
}

function updateConfigNamesbyCookiePreferences(configs){

  var configsStr = jQuery.cookie("configs");
  if(typeof configsStr == "undefined")
    return configs;
  else{
    var configsArr = configsStr.split(",");
    for(var i = 0; i < configsArr.length; i++)
      configs[configsArr[i]] = true;
    return configs
  }
}


function saveConfigs(configs){
  configsArr = [];
  for(key in configs){
    if(configs[key] && key != "")
      configsArr.push(key);
  }
  if(configsArr.length != 0)
    $.cookie("configs", configsArr.toString());
  else
    $.removeCookie('configs');
}
