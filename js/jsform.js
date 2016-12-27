 $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
 });

  // Restrict presentation length
 $('#presentation').restrictLength( $('#pres-max-length') );
 $('#area').restrictLength($('#maxlength'));