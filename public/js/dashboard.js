$( document ).ready(function() { 

  //Read more link

  var showChar = 200;

    var ellipsestext = "...";

    var moretext = "Lees meer";

   var lesstext = "Lees minder";    $('.more').each(function() {

       var content = $(this).html();        if(content.length > showChar) {



           var c = content.substr(0, showChar);

           var h = content.substr(showChar, content.length - showChar);



           var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';



           $(this).html(html);

       }



   });



   $(".morelink").click(function(){

       if($(this).hasClass("less")) {

           $(this).removeClass("less");

           $(this).html(moretext);

       } else {

           $(this).addClass("less");

           $(this).html(lesstext);

       }

       $(this).parent().prev().toggle();

       $(this).prev().toggle();

       return false;

   });

  //Filters

	var filterbutton = $( ".mainfilter" );
  var formbutton = $( "#formbutton" );
  var filterwrapper = $( ".filterwrapper" ).css("display","none");
  var graphwrapper = $( ".graphwrapper" ).css("display","block");
	var clicked = false;

	filterbutton.click(function() {

  		if(!clicked){
        panelVisibility(0);
  			clicked = true;  
  		}else{
        panelVisibility(1);
  			clicked = false;
  		}
	 
	});

  formbutton.click(function() {
    getFormValue();
    if(!clicked){
        panelVisibility(0);
        clicked = true;  
      }else{
        panelVisibility(1);
        clicked = false;
      }
  });

  function panelVisibility(value){
    //0 = OFF 
    //1 = ON
    if(value == 1){
      graphwrapper.css("display","block");
      filterwrapper.css("display","none");
    }else{
      graphwrapper.css("display","none");
      filterwrapper.css("display","block");
    }
}

});


function getFormValue(){
    var facebook = $('input[name=facebook]:checked');
    facebook = facebook.val();

    var youtube = $('input[name=youtube]:checked');
    youtube = youtube.val();

    var service1 = $('input[name=service1]:checked');
    service1 = service1.val();

    var service2 = $('input[name=service2]:checked');
    service2 = service2.val();

    var form = [];
    form.push(facebook,youtube,service1,service2);

    valideFormValue(form);
}

function valideFormValue(form){

  var facebook = parseInt(form[0]);
  var youtube = parseInt(form[1]);
  var service1 = parseInt(form[2]);
  var service2 = parseInt(form[3]);

  if(facebook == null || facebook == '') facebook = 1;
  if(facebook <  0 || facebook >  3) facebook = 1;

  if(youtube == null || youtube == '') youtube = 1;
  if(youtube < 0 || youtube > 3) youtube = 1;

  if(service1 == null || service1 == '') service1 = 0;
    
  if(service2 == null || service2 == '') service2 = 0;

  var filtervalue = [];
  filtervalue.push(facebook,youtube,service1,service2);

  setGraphData(filtervalue);
}

function setGraphData(filtervalue){
  getGraphData(filtervalue);
}


function getGraphData(filtervalue){
  displayFilter(filtervalue);
}


