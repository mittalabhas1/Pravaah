jQuery(document).ready(function(){

	//Brings the right page to the center
	jQuery('.bring-right').click(function(){
		jQuery('#page-right').animate({left: '0px'}, 700);
	});
	//Brings the left page to the center
	jQuery('.bring-left').click(function(){
		jQuery('#page-left').animate({left: '0px'}, 700);
	});
	//Takes back the right page to its position
	jQuery('.leftArrow').click(function(){
		jQuery('#page-right').animate({left: '100%'}, 700);
	});
	//Takes back the left page to its position
	jQuery('.rightArrow').click(function(){
		jQuery('#page-left').animate({left: '-100%'}, 700);
	});
	//Brings the spon page to the center
	jQuery('.upperArrow').click(function(){
		jQuery('#container').animate({top: '0'}, 2500);
	});
	//Takes the spon page back to top
	jQuery('#sponHome').click(function(){
		jQuery('#container').animate({top: '-100%'}, 2500);
	});
	//Brings the team page to the center
	jQuery('.downArrow').click(function(){
		jQuery('#container').animate({top: '-300%'}, 4500);
	});
	//Brings the team page back to top
	jQuery('#teamHome').click(function(){
		jQuery('#container').animate({top: '-100%'}, 4500);
	});

	//Moves clouds
	jQuery('#contact').sprite({fps: 1, no_of_frames: 1})
    jQuery('#contact').spRandom({top: -10, left: -20, right: 20, bottom: 10, speed: 2500, pause: 0});

    jQuery('#gallery').sprite({fps: 1, no_of_frames: 1})
    jQuery('#gallery').spRandom({top: -10, left: -20, right: 20, bottom: 10, speed: 2500, pause: 0});

    jQuery('#partners').sprite({fps: 1, no_of_frames: 1})
    jQuery('#partners').spRandom({top: -10, left: -20, right: 20, bottom: 10, speed: 2500, pause: 0});

    jQuery('#team').sprite({fps: 1, no_of_frames: 1})
    jQuery('#team').spRandom({top: -10, left: -20, right: 20, bottom: 10, speed: 2500, pause: 0});

    jQuery('#events').sprite({fps: 1, no_of_frames: 1})
    jQuery('#events').spRandom({top: -10, left: -20, right: 20, bottom: 10, speed: 2500, pause: 0});

    /*jQuery('#gruCar').sprite({fps: 1, no_of_frames: 1})
    jQuery('#gruCar').spRandom({top: 0, left: 100, right: 100, bottom: 0, speed: 2500, pause: 0});*/

    //Mutes the sound
    jQuery('#sound').click(function(){
    	if (jQuery(this).hasClass("muted")) {
    		jQuery(this).removeClass("muted");
    		jQuery('audio').prop("muted", false);
    	}else{
    		jQuery(this).addClass("muted");
    		jQuery('audio').prop("muted", true);
    	}
    });

    //Facebook page redirects
    jQuery('.member').click(function(){
    	var id = jQuery(this).attr('id');
    	//console.log(id);
    	var link = null;
    	switch (id) {
			case "pranjal":
				link = "https://www.facebook.com/goofy.pranjal";
				break;
			case "mudit":
				link = "https://www.facebook.com/mudit.gurnani";
				break;
			case "priya":
				link = "https://www.facebook.com/priyadershita.singh";
				break;
			case "nishant":
				link = "https://www.facebook.com/profile.php?id=100001627500800";
				break;
			case "rajat":
				link = "https://www.facebook.com/iisrajat";
				break;
			case "sunit":
				link = "https://www.facebook.com/sunit.arora.7";
				break;
			case "tyagi":
				link = "https://www.facebook.com/akash.tyagi.94617";
				break;
			case "abhas":
				link = "https://www.facebook.com/abhas.mittal7";
				break;
			case "chitresh":
				link = "https://www.facebook.com/kumarchitresh.sinha";
				break;
			case "rahul":
				link = "https://www.facebook.com/profile.php?id=100001092130805";
				break;
			case "tanya":
				link = "https://www.facebook.com/profile.php?id=100001194523940";
				break;
			case "priyanshu":
				link = "https://www.facebook.com/profile.php?id=100002454035131";
				break;
			case "samveg":
				link = "https://www.facebook.com/samveg.sinha";
				break;
			case "parth":
				link = "https://www.facebook.com/profile.php?id=100001125120106";
				break;
			case "kartik":
				link = "https://www.facebook.com/kartikey.sharma.102";
				break;
			default:
				link = "https://www.facebook.com/RhapsodyIITR";
    	}
    	window.open(link);
    });

	//Profile Pics on hover
    jQuery('.member').hover(function(){
    	var id = jQuery(this).attr('id');
    	jQuery(this).children('img').attr('src', 'css/img/team/'+id+'.jpg');
    }, function(){
    	var id = jQuery(this).attr('id');
    	jQuery(this).children('img').attr('src', 'css/img/team/'+id+'.png');
    });
});