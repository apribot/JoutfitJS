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

  $.ajax({
      type: "POST",
      url: joutfit.controllerURL, 
      data: { jean:jacket }
  }).done(function( msg ) {
      if(joutfit.IsJsonString(msg)) 
      {
        var job = JSON.parse(msg);

        for(key in job) {
            $('[joutfit="' + key + '"]').html(job[key]);
        }
        
      }
      if (typeof callback == 'function') { 
        callback();
      }
  });
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