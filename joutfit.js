/*
     ______  __  ______________________
 __ / / __ \/ / / /_  __/ __/  _/_  __/
/ // / /_/ / /_/ / / / / _/_/ /  / /   
\___/\____/\____/ /_/ /_/ /___/ /_/    
  
      Denim for the Modern Web                                 
*/

var joutfit = {};

joutfit.get = function(jacket, callback) {
    if(!joutfit.controllerURL) {
        console.log('No controllerURL set :(');
        return;
    }

    var obj = {jean:jacket};
    var params = this.serialize(obj);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", joutfit.controllerURL);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            if(joutfit.IsJsonString(xhr.responseText)) {
                var job = JSON.parse(xhr.responseText);
                for(key in job) {
                        document.querySelector('[joutfit="' + key + '"]').innerHTML = job[key];
                }
            }
            if (typeof callback == 'function') { 
                callback();
            }
        }
        else if (xhr.status !== 200) {
                console.log('Joutfit request failed.    Returned status of ' + xhr.status);
        }
    };
    xhr.send(params);
};

joutfit.controllerURL = null;

joutfit.IsJsonString = function(str) {
        try {
                JSON.parse(str);
        } catch (e) {
                return false;
        }
        return true;
}

joutfit.serialize = function(obj, prefix) {
  var str = [], p;
  for(p in obj) {
    if (obj.hasOwnProperty(p)) {
      var k = prefix ? prefix + "[" + p + "]" : p, v = obj[p];
      str.push((v !== null && typeof v === "object") ?
        this.serialize(v, k) :
        encodeURIComponent(k) + "=" + encodeURIComponent(v));
    }
  }
  return str.join("&");
}
