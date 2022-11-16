let ip='';
/**
 * this script help us on getting devices ip address via api call
 */

 function getMyIPAAddress(){
    $.get({
        url:"https://ipapi.co/json/",
        success:function(e){
          ip=e.ip;
        },
        error:function(){
            console.log('error');
        }
    })
}

getMyIPAAddress()
function deviceName(){
    return navigator.userAgent;
}