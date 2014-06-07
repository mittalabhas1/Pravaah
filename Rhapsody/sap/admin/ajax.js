// table row hover effects
$("document").ready(function(){

	$("#table1 tbody tr").hover(
									  
		  function() { // mouseover
			  $(this).css("background-color","#ff9");
		  },
		  
		  
		  function() { // mouseout
			  $(this).css("background-color","white");
		  }
									  
	)
});

// tablesorter call
$(document).ready(function(){
	$("#table1").tablesorter();	
});