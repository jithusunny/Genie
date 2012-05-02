$(document).ready(function() {

 $("#note_save").click(function() {

    pwd=$("#pwd").val();

   $.ajax({
      type: "POST",
      url: "./widgets/note/save_note.php",
      data: "str="+str,
      success: function(response)
     {
       if(response == 'success') {
       $('#page').load('webtop.php');
//          $("#login_response").text("You have logged in successfully!");
         return true;}
       else  {
         $("#login_response").text("Invalid username and/or password.");
         return false;}
      }
   });
   return false;
  });
});



var http = createRequestObject();
function createRequestObject() {
   var objAjax;
   var browser = navigator.appName;
   if(browser == "Microsoft Internet Explorer"){
      objAjax = new ActiveXObject("Microsoft.XMLHTTP");
   }else{
      objAjax = new XMLHttpRequest();
   }
   return objAjax;
}

function readnote(){
   http.open('get','./widgets/note/notes.txt');
   http.onreadystatechange = updateNewContent;
   http.send(null);
   return false;
}

function updateNewContent(){
   if(http.readyState == 4){
      document.getElementById('note').innerHTML = http.responseText;
   }
}
