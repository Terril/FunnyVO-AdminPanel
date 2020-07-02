$(document).ready(function() {

    $(document).on("click",".more", function (e) {
        $(this).toggleClass("show-more-menu");
    });



    $('html').click(function(e) {
        if(!$(e.target).hasClass('more') )
        {

            $(".more").removeClass("show-more-menu");
        }
    })

});


jQuery(document).ready(function(){
	/*jQuery('a[href^="#"]').on('click',function (e) {
		e.preventDefault();
		var target = this.hash,
		$target = jQuery(target);
		jQuery('html, body').stop().animate({
			'scrollTop': $target.offset().top-120
		}, 500, 'swing', function () {
			//window.location.hash = target;
		});
	});*/

	/*jQuery(window).scroll(function(){
	  var sticky = jQuery('header'),
	      scroll = jQuery(window).scrollTop();
	  var stickyCart = jQuery('#fixcart'),
	      scroll = jQuery(window).scrollTop(); 
	  var menulist = jQuery('#menulist'),
	      scroll = jQuery(window).scrollTop();        

	  if (scroll >= 300)
	  {
	  	sticky.addClass('fixed');
	  	stickyCart.addClass('stickyCart');
	  	menulist.addClass('menulist');
	  } 
	  else 
	  {
	  	sticky.removeClass('fixed');
	  	stickyCart.removeClass('stickyCart');
	  	menulist.removeClass('menulist');
	  }

	  if (scroll >= 120)
	  {
	  	menulist.addClass('menulist');
	  } 
	  else 
	  {
	  	menulist.removeClass('menulist');
	  }

	});*/

});

function showMenuItem($data,$data2,$tax_free,$taxpersent,$resturentid)
{
	//alert($data2);
	document.getElementById('menuItem').innerHTML = "<div style='text-align: center;font-size: 18px;padding: 20px 0 30px 0;'>Loading</div>";
	$('.menu_item').show()
	var data = $(data).serialize();
	
	jQuery.ajax({
		type: "POST",
		url: "addcookie.php?fbase=data&data2="+$data2+"&tax_free="+$tax_free+"&taxpersent="+$taxpersent+"&resturentid="+$resturentid,
		data: $data,
		dataType: "text",
		success: function(response){
			//alert(response);
			
			//console.log(response);
			$('#menuItem').html(response);

			//document.getElementById('menuItem').innerHTML = response;
			//location.reload(true);
			//$(".cartbox").toggleClass('show');
		}
	});


	// var xmlhttp;
	// if(window.XMLHttpRequest)
	//   {// code for IE7+, Firefox, Chrome, Opera, Safari
	// 	xmlhttp=new XMLHttpRequest();
	//   }
	// else
	//   {// code for IE6, IE5
	// 	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	//   }
	  
	//   xmlhttp.onreadystatechange=function()
	//   {
	// 	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	// 	{
	// 		//alert(xmlhttp.responseText);
	// 		document.getElementById("menuItem").innerHTML=xmlhttp.responseText;
	// 	}
	//   }
	// xmlhttp.open("POST","addcookie.php?fbase=data");
	// xmlhttp.send($data);
	//alert(str1);

}

function cartpopup()
{
	//alert($data2);
	$('#cartpopup').show()
}	

//revolution slider
var revapi;
jQuery(document).ready(function() {

	revapi = jQuery('.tp-banner').revolution({
		delay:7000,
		startwidth:1170,
		startheight:500,
		hideThumbs:10,
		navigationType:"none",     // use none, bullet or thumb
		navigationArrows:"none",     // nexttobullets, solo (old name verticalcentered), none
		/*fullWidth:"on",
		forceFullWidth:"on"*/
		fullWidth:"off",
		fullScreen:"on",
		fullScreenOffsetContainer: ""
	});

});	//ready

function popup( pagename ) {
	//alert($pageid);
	if( pagename == "login" ) {
		jQuery( '#loginpopup' ).show();
		jQuery( '#registerpopup' ).hide();
		jQuery( '#forgetpopup' ).hide();
	}
	if( pagename == "signup" ) {
		jQuery( '#loginpopup' ).hide();
		jQuery( '#registerpopup' ).show();
		jQuery( '#forgetpopup' ).hide();
	}
	if( pagename == "forget" ) {
		jQuery( '#loginpopup' ).hide();
		jQuery( '#registerpopup' ).hide();
		jQuery( '#forgetpopup' ).show();
	}
	/*jQuery.ajax({
		type: "GET",
		url: "getcontent.php",
		data: {
			'pagename' : $pagename
		},
		dataType: "text",
		success: function(response){
			jQuery("#page_content").show();
			document.getElementById("page_content_sec").innerHTML = response; //sending data to show on list
		}
	});*/
}

function nextsttep() {

	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var emailaddr = document.getElementById('emailaddr').value;
	var paswd = document.getElementById('paswd').value;

	if( firstname != "" && lastname != "" && emailaddr != "" && paswd != "" ) {
		jQuery(".signup_step1").hide();
		jQuery(".signup_step2").show();
		jQuery(".signup_step3").hide();
		jQuery(".signup_step4").hide();
	} else {
		alert("Please fill all fields");
	}
}

function sendmeacode(phonenum) {

	var phne = document.getElementById('phne').value;
    alert(phne);
	if( phne != "" ) {
		jQuery.ajax({
			type: "GET",
			url: "getcontent.php?sendme=code",
			data: {
				'phnnum' : phonenum
			},
			dataType: "text",
			success: function(response){
				if( response == "200" ) {
					jQuery(".signup_step1").hide();
					jQuery(".signup_step2").hide();
					jQuery(".signup_step3").show();
					jQuery(".signup_step4").hide();
				} else {
					alert(response);
				}
			}
		});

	} else {
		alert("Phone number required");
	}

	
}

function verifyphone(phonenum, codetoverify) {

	var confirmation_code = document.getElementById('confirmation_code').value;

	if( confirmation_code != "" ) {
		jQuery.ajax({
			type: "GET",
			url: "getcontent.php?verify=code",
			data: {
				'phnnum' : phonenum,
				'codetoverify' : codetoverify
			},
			dataType: "text",
			success: function(response){
				if( response == "200" ) {
					jQuery(".signup_step1").hide();
					jQuery(".signup_step2").hide();
					jQuery(".signup_step3").hide();
					jQuery(".signup_step4").show();
				} else {
					alert(response);
				}
			}
		});

	} else {
		alert("Confirmation code required");
	} 
	
}




//Form Validations
$(document).ready(function(){

	//addtocart  menu popup

	//account info
	$("form#accoutinfo").validate({
	    rules: {
	      fname: "required",
	      lname: "required"
	    },
	    messages: {
	      fname: "Required",
	      lname: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//change password 
	$("form#changepass").validate({
	    rules: {
	      oldpas: "required",
	      newpas: "required",
	      renewpas: {
		      equalTo: "#newpas"
		    }
	    },
	    messages: {
	      oldpas: "Required",
	      newpas: "Required",
	      renewpas: "Not matched"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//address form 
	$("form#adrsfrm").validate({
	    rules: {
	      str: "required",
	      apt: "required",
	      cty: "required",
	      stt: "required",
	      zp: {
		      required: true,
		      number: true
		    },
	      cntry: "required",
	      ins: "required",
	      address: "required"
	    },
	    messages: {
	      str: "Required",
	      apt: "Required",
	      cty: "Required",
	      stt: "Required",
	      zp: "Required",
	      cntry: "Required",
	      ins: "Required",
	      address: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//payment methods
	$("form#paymethd").validate({
	    rules: {
	      cardname: "required",
	      cardnum: {
		      required: true,
		      maxlength: 19
		    },
	      cardcvc:  {
		      required: true,
		      number: true,
		      maxlength: 4
		    },
	      cardmn:  {
		      required: true,
		      number: true
		    },
	      cardyr:  {
		      required: true,
		      number: true
		    }
	    },
	    messages: {
	      cardname: "Required",
	      cardnum: "Required",
	      cardcvc: "Required",
	      cardmn: "Required",
	      cardyr: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//login form
	$("form#loginfrm").validate({
	    rules: {
	      eml: {
	        required: true,
	        email: true
	      },
	      pswd: "required"
	    },
	    messages: {
	      eml: "Please enter valid email address",
	      pswd: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//register form
	$("form#registerfrm").validate({
	    rules: {
	      firstname: "required",
	      lastname: "required",
	      emailaddr: {
	        required: true,
	        email: true
	      },
	      paswd: "required",
	      phne: "required",
	      confirmation_code:  {
		      required: true,
		      number: true
		    }
	    },
	    messages: {
	      firstname: "Required",
	      lastname: "Required",
	      emailaddr: "Please enter valid email address",
	      paswd: "Required",
	      phne: "Required",
	      confirmation_code: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//forget form
	$("form#forgetfrm").validate({
	    rules: {
	      emailaddr: {
	        required: true,
	        email: true
	      }
	    },
	    messages: {
	      emailaddr: "Please enter valid email address"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//hotel deals
	$("form#hoteldealsfrm").validate({
	    rules: {
	      nm: "required",
	      dsc: "required",
	      expdate: "required",
	      prce:  {
		      required: true,
		      number: true
		    },
	      image: "required",
	      image1: "required"
	    },
	    messages: {
	      nm: "Required",
	      dsc: "Required",
	      expdate: "Required",
	      prce: "Required",
	      image: "Required",
	      image1: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//bank info for hotel
	$("form#hotelbnkinffrm").validate({
	    rules: {
	      nm: "required",
	      trnum: {
		      required: true,
		      number: true
		    },
	      bnkno: {
		      required: true,
		      number: true
		    },
	      accno: {
		      required: true,
		      number: true
		    },
	    },
	    messages: {
	      nm: "Required",
	      trnum: "Required",
	      bnkno: "Required",
	      accno: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//hotel coupon codes
	$("form#couponcdefrm").validate({
	    rules: {
	      coupon_code: "required",
	      discount: {
		      required: true,
		      number: true
		    },
	      expire_date: "required"
	    },
	    messages: {
	      coupon_code: "Required",
	      discount: "Required",
	      expire_date: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});
	
	
	//resetpass
	$("form#resetpass").validate({
	    rules: {
	      pass: {
			  required: true,
		      minlength: 6  
		  },
	      Newpass: {
			  required: true,
		      minlength: 6  
		  }
	    },
	    messages: {
	      pass: "min 6 characters",
	      Newpass: "min 6 characters"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//hotel edit information
	$("form#hoteleditinfo").validate({
	    rules: {
	      name: "required",
	      slogan: "required",
	      about: "required",
	      delivery_fee: {
		      required: true,
		      number: true
		    },
	      phone: "required",
	      menu_style: "required",
	      timezone: "required",
	      state: "required",
	      country: "required",
	      city: "required",
	      google_analytics: {
		      required: true,
		      number: true
		    },
	      zip: "required",
	      lat: {
		      required: true,
		      number: true
		    },
	      long: {
		      required: true,
		      number: true
		    },
	      ot1: "required",
	      ct1: "required",
	      ot2: "required",
	      ct2: "required",
	      ot3: "required",
	      ct3: "required",
	      ot4: "required",
	      ct4: "required",
	      ot5: "required",
	      ct5: "required",
	      ot6: "required",
	      ct6: "required",
	      ot7: "required",
	      ct7: "required"
	    },
	    messages: {
	      name: "Required",
	      slogan: "Required",
	      about: "Required",
	      delivery_fee: "Required",
	      phone: "Required",
	      menu_style: "Required",
	      timezone: "Required",
	      state: "Required",
	      country: "Required",
	      city: "Required",
	      google_analytics: "Required",
	      zip: "Required",
	      lat: "Required",
	      long: "Required",
	      ot1: "Required",
	      ct1: "Required",
	      ot2: "Required",
	      ct2: "Required",
	      ot3: "Required",
	      ct3: "Required",
	      ot4: "Required",
	      ct4: "Required",
	      ot5: "Required",
	      ct5: "Required",
	      ot6: "Required",
	      ct6: "Required",
	      ot7: "Required",
	      ct7: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//add new menu form
	$("form#adnewmenfrm").validate({
	    rules: {
	      menu_name: "required",
	      menu_dsc: "required"
	    },
	    messages: {
	      menu_name: "Required",
	      menu_dsc: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//add new menu item form
	$("form#adnewmenuitmfrm").validate({
	    rules: {
	      menu_name: "required",
	      menu_dsc: "required",
	      menu_price: "required"
	    },
	    messages: {
	      menu_name: "Required",
	      menu_dsc: "Required",
	      menu_price: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//add new extra section for menu item 
	$("form#adextrsctfrm").validate({
	    rules: {
	      sec_name: "required"
	    },
	    messages: {
	      sec_name: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//add new extra section item
	$("form#adextrsctitmfrm").validate({
	    rules: {
	      menu_name: "required",
	      menu_price: "required"
	    },
	    messages: {
	      menu_name: "Required",
	      menu_price: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

	//add new extra section item
	$("form#docfrm").validate({
	    rules: {
	      docdesc: "required",
	      docfile: "required"
	    },
	    messages: {
	      docdesc: "Required",
	      docfile: "Required"
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	});

});


$(document).ready(function(){
	$( "#datepicker" ).datepicker();
	$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	$( "#datepicker" ).datepicker( "option", "prevText", "&laquo;" );
	$( "#datepicker" ).datepicker( "option", "nextText", "&raquo;" );

	$( "#datepicker2" ).datepicker();
	$( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	$( "#datepicker2" ).datepicker( "option", "prevText", "&laquo;" );
	$( "#datepicker2" ).datepicker( "option", "nextText", "&raquo;" );

	$('.timepicker').timepicker({ 'timeFormat': 'H:i:s' });
} );



function openmenu(menuid) {
	jQuery(".mainmenus_items").slideUp();
	jQuery(".mainmenus_items#"+menuid).slideDown();
}


jQuery(document).ready(function(){
	//add new menu
	jQuery("#addnewmenu").on("click", function(){
		jQuery(this).hide();
		jQuery(this).parent().append("<h3 class='addmenuheading'><i class='fa fa-plus-circle' style='margin-right: 5px;'></i> Add New Menu</h3><form action='dashboard.php?p=manage_menu&add=menu' method='post' class='form addmenuform' id='adnewmenfrm'><div class='cl33'><div class='col33 left'> <p><input type='text' name='menu_name' id='menu_name' placeholder='Name'></p> </div> <div class='col33 left'> <p><input type='text' name='menu_dsc' id='menu_dsc' placeholder='Description'></p> </div> <div class='col33 left'> <p><input type='submit' value='Add Menu'></p> </div> <div class='clear'></div></div></form>");
	});

	//edit main menu
	jQuery(".main_menu_edit").on("click", function(){
		var menuid = jQuery(this).attr("data-menu-id");
		var menuname = jQuery(this).attr("data-menu-name");
		var menudesc = jQuery(this).attr("data-menu-description");
	
		jQuery("#main_menu_edit_div_"+menuid).html("<form action='dashboard.php?p=manage_menu&edit=menu' method='post' class='form addmenuform' id='adnewmenfrm'><input type='hidden' name='rid' id='rid' value='"+menuid+"'><div class='cl33'><div class='col33 left'> <p><input type='text' name='menu_name' id='menu_name' value='"+menuname+"' placeholder='Name'></p> </div> <div class='col33 left'> <p><input type='text' name='menu_dsc' id='menu_dsc' value='"+menudesc+"' placeholder='Description'></p> </div> <div class='col33 left'> <p><input type='submit' value='Update Menu'></p> </div> <div class='clear'></div></div></form>");
	});

	//add new menu item
	jQuery(".addnewmenu_item").on("click", function(){
		var menuid = jQuery(this).attr("data-menu-id");
		//alert(menuid);
		jQuery(this).hide();
		jQuery(this).parent().append("<h3 class='addmenuheading'><i class='fa fa-plus-circle' style='margin-right: 5px;'></i> Add New Menu Item</h3><form action='dashboard.php?p=manage_menu&add=menuitem' method='post' class='form addmenuform' id='adnewmenuitmfrm'><input type='hidden' name='menuid' id='menuid' value='"+menuid+"'><div class='col50 left twocll'> <p><input type='text' name='menu_name' id='menu_name' placeholder='Name'></p> </div> <div class='col50 right twocll'> <p><input type='text' name='menu_dsc' id='menu_dsc' placeholder='Description'></p> </div> <div class='col50 left twocll'> <p><input type='text' name='menu_price' id='menu_price' placeholder='Price'></p> </div> <div class='col50 right twocll'> <p><input type='submit' value='Add Menu Item'></p> </div> <div class='clear'></div></form>");
	});

	//edit main menu item
	jQuery(".main_menu_item_edit").on("click", function(){
		var mainmenuidd = jQuery(this).attr("data-main-menu-id");
		var menuid = jQuery(this).attr("data-menu-id");
		var menuname = jQuery(this).attr("data-menu-name");
		var menudesc = jQuery(this).attr("data-menu-description");
		var menuprce = jQuery(this).attr("data-menu-price");
	
		jQuery("#main_menu_item_edit_div_"+menuid).html("<form action='dashboard.php?p=manage_menu&edit=menuitem' method='post' class='form addmenuform' id='adnewmenuitmfrm'><input type='hidden' name='rid' id='rid' value='"+menuid+"'><input type='hidden' name='menuid' id='menuid' value='"+mainmenuidd+"'><div class='col50 left twocll'> <p><input type='text' name='menu_name' id='menu_name' value='"+menuname+"' placeholder='Name'></p> </div> <div class='col50 right twocll'> <p><input type='text' name='menu_dsc' id='menu_dsc' value='"+menudesc+"' placeholder='Description'></p> </div> <div class='col50 left twocll'> <p><input type='text' name='menu_price' value='"+menuprce+"' id='menu_price' placeholder='Price'></p> </div> <div class='col50 right twocll'> <p><input type='submit' value='Update Menu Item'></p> </div> <div class='clear'></div></form>");
	});

	//add new menu extra section
	jQuery(".addnewmenu_extrasection").on("click", function(){
		var restoid = jQuery(this).attr("data-restaurant-id");
		var restomenuitem = jQuery(this).attr("data-menu-item-id");
		//alert(menuid);
		jQuery(this).hide();
		jQuery(this).parent().append("<h3 class='addnewmenu_extrasection'><i class='fa fa-plus-circle' style='margin-right: 5px;'></i> Add Menu Extra Section</h3><form action='dashboard.php?p=manage_menu&add=menuextrasection' method='post' class='form addmenuform' id='adextrsctfrm'> <input type='hidden' name='restoid' id='restoid' value='"+restoid+"'> <input type='hidden' name='restomenuitem' id='restomenuitem' value='"+restomenuitem+"'> <p> <input type='text' name='sec_name' id='sec_name' placeholder='Section Name'> </p> <p style='text-align:left;'> <input type='checkbox' name='require_items' id='require_items' value='1' /> Required? <span style='display:block;font-size:11px;margin-top:5px;color:#aaa;'>If checked, this section will require to fill.</span></p> <p> <input type='submit' value='Add Extra Section'> </p></form>");
	});

	//edit main menu item section
	jQuery(".main_menu_item_section_edit").on("click", function(){
		var restoid = jQuery(this).attr("data-restaurant-id");
		var restomenuitem = jQuery(this).attr("data-menu-item-id");
		
		var sectidd = jQuery(this).attr("data-section-id");
		var sectnmmm = jQuery(this).attr("data-section-name");
		var sectreq = jQuery(this).attr("data-section-req");
		if( sectreq == "1" ) {
			var sectr = "checked";
		} else {
			var sectr = "";
		}
	
		jQuery("#main_menu_item_section_edit_div_"+sectidd).html("<form action='dashboard.php?p=manage_menu&edit=menuextrasection' method='post' class='form addmenuform' id='adextrsctfrm'> <input type='hidden' name='rid' id='rid' value='"+sectidd+"' /> <input type='hidden' name='restoid' id='restoid' value='"+restoid+"'> <input type='hidden' name='restomenuitem' id='restomenuitem' value='"+restomenuitem+"'> <p> <input type='text' name='sec_name' id='sec_name' value='"+sectnmmm+"' placeholder='Section Name'> </p> <p style='text-align:left;'> <input type='checkbox' name='require_items' id='require_items' "+sectr+" value='1' /> Required? <span style='display:block;font-size:11px;margin-top:5px;color:#aaa;'>If checked, this section will require to fill.</span></p> <p> <input type='submit' value='Update Extra Section'> </p></form>");
	});

	//add new menu section extra item
	jQuery(".addnewmenu_extraitem").on("click", function(){
		var menuextrasectionid = jQuery(this).attr("data-menu-extra-section-id");
		//alert(menuid);
		jQuery(this).hide();
		jQuery(this).parent().append("<h3 class='addnewmenu_extraitem'><i class='fa fa-plus-circle' style='margin-right: 5px;'></i> Add Section Extra Item</h3><form action='dashboard.php?p=manage_menu&add=menuextraitem' method='post' class='form addmenuform' id='adextrsctitmfrm'><input type='hidden' name='menu_extra_sectionid' id='menu_extra_sectionid' value='"+menuextrasectionid+"'> <p> <input type='text' name='menu_name' id='menu_name' placeholder='Name'> </p> <p> <input type='text' name='menu_price' id='menu_price' placeholder='Price'></p><p> <input type='submit' value='Add Section Extra Item'> </p></form>");
	});

	//edit main menu item section item
	jQuery(".main_menu_item_section_item_edit").on("click", function(){
		var menuextrasectionid = jQuery(this).attr("data-menu-extra-section-id");
		
		var sect_item_idd = jQuery(this).attr("data-menu-section-item-id");
		var sect_item_name = jQuery(this).attr("data-menu-section-item-name");
		var sect_item_price = jQuery(this).attr("data-menu-section-item-price");
	
		jQuery("#main_menu_item_section_item_edit_div_"+sect_item_idd).html("<form action='dashboard.php?p=manage_menu&edit=menuextraitem' method='post' class='form addmenuform' id='adextrsctitmfrm'><input type='hidden' name='rid' id='rid' value='"+sect_item_idd+"'><input type='hidden' name='menu_extra_sectionid' id='menu_extra_sectionid' value='"+menuextrasectionid+"'> <p> <input type='text' name='menu_name' id='menu_name' value='"+sect_item_name+"' placeholder='Name'> </p> <p> <input type='text' name='menu_price' id='menu_price' value='"+sect_item_price+"' placeholder='Price'></p><p> <input type='submit' value='Update Section Extra Item'> </p></form>");
	});

	//add instructions during purchase
	jQuery(".instructn_heading").on("click", function(){
		jQuery(this).hide();
		jQuery(this).parent().append("<h3 class='addmenuheading'><i class='fa fa-plus-circle' style='margin-right: 5px;'></i> Add Instructions</h3><p><input type='text' name='instructions' id='instructions' placeholder='Instructions'></p>");
	});
	
});

jQuery(document).ready(function(){
	jQuery(".exsection_me input[type='checkbox']").on("change", function(){
		var name = jQuery(this).attr("data-item-name");
		var quantity = jQuery(this).attr("data-item-quantity");
		var price = jQuery(this).attr("data-item-price");

		if( jQuery(this).is(":checked") ) {
			jQuery(this).parent().find(".filds").html("<input type='hidden' name='menu_extra_item_name[]' value='"+name+"'><input type='hidden' name='menu_extra_item_quantity[]' value='"+quantity+"'><input type='hidden' name='menu_extra_item_price[]' value='"+price+"'>");
		} else {
			jQuery(this).parent().find(".filds").html("");
		}
	});

	jQuery(".exsection_me input[type='radio']").on("change", function(){
		var sectionid = jQuery(this).attr("data-section-id");
		var name = jQuery(this).attr("data-item-name");
		var quantity = jQuery(this).attr("data-item-quantity");
		var price = jQuery(this).attr("data-item-price");

		jQuery(".filds_radio_"+sectionid+" #na").val(name);
		jQuery(".filds_radio_"+sectionid+" #qu").val(quantity);
		jQuery(".filds_radio_"+sectionid+" #pr").val(price);
	});
});

function filRadioVal($sectionID,$itemID,$teamName,$price,$symbol)
{
	
	jQuery.ajax({
		type: "GET",
		url: "addcookie.php?setcook=ok&sectionID="+$sectionID+"&teamName="+$teamName+"&itemID="+$itemID+"&price="+$price+"&symbol="+$symbol,
		//data: data,
		//dataType: "text",
		success: function(response){
			//alert(response);
			//document.getElementById("extraitem_req"+$sectionID).value=response;
			document.getElementById("section_json"+$sectionID).value=response;
			jQuery("#section_"+$sectionID+" #Rdioprice").val($price);

			var sum = 0;
				 $(".qty1").each(function(){
				     sum += +$(this).val();
				     //alert(sum);
				 });
				 
				 //alert(sum);
				 var qty = document.getElementById('menu_item_quantity').value;
				 document.getElementById("menu_totalPrice").value=sum*qty;
				 document.getElementById("total_popup").innerHTML=sum*qty;
				}
			});

	
	//alert($teamName);
	// document.getElementById("fild_Name_"+$sectionID).value=$teamName;
	// document.getElementById("fild_item_id_"+$sectionID).value=$itemID;
	// document.getElementById("fild_price_"+$sectionID).value=$price;
	// document.getElementById("fild_symbol_"+$sectionID).value=$symbol;

	
	
}

function filCheckVal($sectionID,$itemID,$itemName,$price,$symbol,$checkvalue)
{
	
	if($('input[id="extraitem_req_'+$itemID+'"]').is(":checked"))
	{
		//document.getElementById("checkedFilds_"+$itemID).innerHTML = '<div id="menu_item"><input type="text" id="menu_Name_'+$itemID+'" name="menu_Name_'+$itemID+'" value="'+$itemName+'" ><input type="text" id="menuitem_id_'+$itemID+'" name="menuitem_id_'+$itemID+'" value="'+$itemID+'"><input type="text" id="menu_price_'+$itemID+'" name="menu_price_'+$itemID+'" value="'+$price+'"><input type="text" id="menu_symbol_'+$itemID+'" name="menu_symbol_'+$itemID+'" value="'+$symbol+'"></div>';

		jQuery.ajax({
			type: "GET",
			url: "addcookie.php?setcook=check&sectionID="+$sectionID+"&itemName="+$itemName+"&itemID="+$itemID+"&price="+$price+"&symbol="+$symbol,
			//data: data,
			//dataType: "text",
			success: function(response){
				//alert(response);
				//document.getElementById("section_json"+$sectionID).value=response;
				document.getElementById("checkedFilds_"+$itemID).innerHTML = "<div id='menu_item'><input type='hidden' id='menu_checkJson_"+$itemID+"' name='menu_extra_item[]' value='"+response+"' > <input type='hidden' class='qty1' value='"+$price+"' ></div>";
				
				//var totalPrice=document.getElementById("totalPrice").value;
				//var fianltotal = parseInt(totalPrice) + parseInt($price);
				//document.getElementById("totalPrice").value=fianltotal;

				
				 var sum = 0;
				 $(".qty1").each(function(){
				     sum += +$(this).val();
				 });
				 //alert(sum);
				 var qty = document.getElementById('menu_item_quantity').value;
				 document.getElementById("menu_totalPrice").value=sum*qty;
				 document.getElementById("total_popup").innerHTML=sum*qty;
					

			}
		});


		// document.getElementById("menu_Name_"+$itemID).value=$teamName;
		// document.getElementById("menuitem_id_"+$itemID).value=$itemID;
		// document.getElementById("menu_price_"+$itemID).value=$price;
		// document.getElementById("menu_symbol_"+$itemID).value=$symbol;
	}
	else
	{	
		

		// var totalPrice=document.getElementById("totalPrice").value;
		// var fianltotal = parseInt(totalPrice) - parseInt($price);
		// document.getElementById("totalPrice").value=fianltotal;

		document.getElementById("checkedFilds_"+$itemID).innerHTML = "";

		var sum = 0;
		 $(".qty1").each(function(){
		     sum += +$(this).val();
		 });
		 //alert(sum);
		 var qty = document.getElementById('menu_item_quantity').value;
		 document.getElementById("menu_totalPrice").value=sum*qty;
		 document.getElementById("total_popup").innerHTML=sum*qty;
		// document.getElementById("menu_Name_"+$itemID).value="";
		// document.getElementById("menuitem_id_"+$itemID).value="";
		// document.getElementById("menu_price_"+$itemID).value="";
		// document.getElementById("menu_symbol_"+$itemID).value="";
	}	

}

function showcartdata()
{
	document.getElementById("showcart").innerHTML="<div style='text-align: center;font-size: 20px;padding: 40px 0 20px 0;'>Loading Cart...</div>";
	jQuery.ajax({
		type: "GET",
		url: "addcookie.php?getcart=ok",
		//data: data,
		dataType: "text",
		success: function(response){
			//alert(response);
			document.getElementById("showcart").innerHTML=response;
		}	
	});

}

function countQty($value){ 
 		
 		//alert($value);
 		var num = document.getElementById('menu_item_quantity').value;
 		//alert(num);
	 	if($value=="1")
	 	{
	 		var fianltotal = parseInt(num) + 1;
	 		document.getElementById('menu_item_quantity').value = fianltotal;

	 		var sum = 0;
			 $(".qty1").each(function(){
			     sum += +$(this).val();
			 });
			 //alert(sum);
			 var qty = document.getElementById('menu_item_quantity').value;
			 //alert(document.getElementById("menu_totalPrice").value);
			 
			 document.getElementById("menu_totalPrice").value=sum*qty;
			 document.getElementById("total_popup").innerHTML=sum*qty;
	 	}	
	 	else
	 	if($value=="-1")
	 	{
	 		//alert(num);
	 		if(num > 1)
	 		{
	 			var fianltotal = parseInt(num) - 1;
	 			document.getElementById('menu_item_quantity').value = fianltotal;

	 			var sum = 0;
				 $(".qty1").each(function(){
				     sum += +$(this).val();
				 });
				 //alert(sum);
				 var qty = document.getElementById('menu_item_quantity').value;
				 document.getElementById("menu_totalPrice").value=sum*qty;
				 document.getElementById("total_popup").innerHTML=sum*qty;
	 		}	
	 	}
	 	
		
		

}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function addtocart(formid) {
	var data = $(formid).serializeArray();
	//alert(data);

	
	var AnswerInput = document.getElementsByName('menu_extra_item[]');
	for (i=0; i<AnswerInput.length; i++)
		{
		 	if(AnswerInput[i].value == "")
			{
		 	 alert('Please Choose All Required Fields');		
		 	 return false;
			}
		}


	var extraMenu_item = $('.extraMenu_item').val();
	//alert(extraMenu_item);
	if(extraMenu_item=="")
	{
		alert("Choose Required Section");
		return false
	}
	else
	{

		var session_restaurantid=document.getElementById('session_restaurantid').value;
		var resturentid=document.getElementById('resturentid').value;

		if(resturentid != session_restaurantid)
		{
			var r = confirm("Would you like to Discard your previous cart and start a new order?");
			if (r == true) {
			   
			    $("#popupAddtocartbtn").removeAttr("onclick");
				$('.menu_item').css("display", "none");
				$('#preloader').css("display", "block");
				jQuery.ajax({
					type: "POST",
					url: "addcookie.php?addcart=ok",
					data: data,
					dataType: "text",
					success: function(response){
						if(response=="done")
						{
							showcartdata();
							$('#preloader').css("display", "none");
						}
						else
						{
							showcartdata();
							$('#preloader').css("display", "none");
						}
						
						
						//console.log(response);
						//document.getElementById('response').innerHTML = response;
						//location.reload(true);
						//$(".cartbox").toggleClass('show');
					}
				});	

			} 
			else 
			{
			    //txt = "You pressed Cancel!";
			}
		}
		else
		{
			$("#popupAddtocartbtn").removeAttr("onclick");
				$('.menu_item').css("display", "none");
				$('#preloader').css("display", "block");
				jQuery.ajax({
					type: "POST",
					url: "addcookie.php?addcart=ok",
					data: data,
					dataType: "text",
					success: function(response){
						if(response=="done")
						{
							showcartdata();
							$('#preloader').css("display", "none");
						}
						else
						{
							showcartdata();
							$('#preloader').css("display", "none");
						}
						
						
						//console.log(response);
						//document.getElementById('response').innerHTML = response;
						//location.reload(true);
						//$(".cartbox").toggleClass('show');
					}
				});	
		}	
		
		
	}

	
}

function orderformat() {
	
	totalCalculation();
	
	var extraMenu =document.getElementById("menuItemData").value;
	var payment_id =document.getElementById("paymentmethod").value;
	var address_id =document.getElementById("addrsid").value;
	var couponcode =document.getElementById("couponcode").value;
	var riderTip =document.getElementById("riderTip").value;
	var instructions =document.getElementById("instructions").value;
	var sub_total =document.getElementById("subtotal").value;
	var ordertype =document.getElementById("ordertype").value;
	var restaurant_id =document.getElementById("restaurant_id").value;
	var quantity ="1";
	var user_id =document.getElementById("user_id").value;
	var totalPrice =document.getElementById("totalPrice").value;
	var tax =document.getElementById("tax").value;
	var delivery_fee=document.getElementById("delivery_fee").value;
	var order_time=document.getElementById("time").value;
	var coupancodeid = document.getElementById("coupancodeid").value;

	var totalbill=parseInt(riderTip)+parseInt(sub_total)+parseInt(tax)+parseInt(delivery_fee);
	
	if(payment_id=="0" || payment_id=="")
	{
		alert("Select Payment Method");
		return false
	}
	

	if(payment_id=="cod")
	{
		var payment_id = "0";
		var cod = "1";
	}
	else
	{
		var cod = "0";
	}	

	if(ordertype=="0")
	{
		var ordertype = "0";
		var riderTip ="0";
		var address_id ="0";
	}
	else
	{
		if(address_id=="0" || address_id=="")
		{
			alert("Select Delivery Address");
			return false
		}
	}	

	if(user_id=="" || user_id=="0")
	{
		popup('login');
		return false
	}

	document.getElementById("totalPrice").value = totalbill;
	document.getElementById("total_price").innerHTML = totalbill+".00";

	if(extraMenu=="")
	{
		var ordernow= document.getElementById("orderformat").value='{"instructions": "'+instructions+'","delivery": "'+ordertype+'","rider_tip": "'+riderTip+'","restaurant_id": "'+restaurant_id+'","quantity": "'+quantity+'","user_id": "'+user_id+'","price": "'+totalPrice+'","cod": "'+cod+'" ,"tax": "'+tax+'" ,"payment_id": "'+payment_id+'" ,"order_time": "'+order_time+'" ,"coupon_id": "'+coupancodeid+'" ,"sub_total": "'+sub_total+'" ,"delivery_fee": "'+delivery_fee+'" ,"device": "website" ,"address_id": "'+address_id+'" }';
	}
	else
	{
		var ordernow= document.getElementById("orderformat").value='{"instructions": "'+instructions+'","delivery": "'+ordertype+'","rider_tip": "'+riderTip+'","restaurant_id": "'+restaurant_id+'","quantity": "'+quantity+'","user_id": "'+user_id+'","price": "'+totalPrice+'","cod": "'+cod+'" ,"tax": "'+tax+'" ,"payment_id": "'+payment_id+'" ,"order_time": "'+order_time+'" ,"coupon_id": "'+coupancodeid+'" ,"sub_total": "'+sub_total+'" ,"delivery_fee": "'+delivery_fee+'" ,"address_id": "'+address_id+'" ,"device": "website" , '+extraMenu+' }';

	}	
	
	

	//var data = $(ordernow).serialize();
	$('#preloader').css("display", "block");
	jQuery.ajax({
		type: "POST",
		url: "addcookie.php?placeorder=ok&data="+ordernow,
		data: ordernow,
		dataType: "text",
		success: function(response){
			//alert(response);
			//console.log(response);
			document.getElementById('showcart').innerHTML = response;
			$('#preloader').css("display", "none");
			//location.reload(true);
			//$(".cartbox").toggleClass('show');
		}
	});
	
}

function rider_tip()
{
	var riderTip = document.getElementById("riderTip").value;
	
	if(riderTip=="")
	{
		var riderTip ="0";
	}
	document.getElementById("checkoutridertip").innerHTML = riderTip+".00";

	totalCalculation();

}
 
function orderType($data)
{
	//alert($data);

	var riderTip =document.getElementById("riderTip").value;

	if($data=="delivery")
	{
		document.getElementById("riderTip").value="";
		document.getElementById("ordertype").value="1";
		document.getElementById("delivery").style.color = "white";
		document.getElementById("delivery").style.backgroundColor = "#be2c2c";

		document.getElementById("pickup").style.color = "black";
		document.getElementById("pickup").style.backgroundColor = "#f2f2f2";

		document.getElementById("addrsid").disabled = false;
		document.getElementById("selectaddress").style.display = "block";
		document.getElementById("rider_tip").style.display = "block";
		
		
	}
	else
	{
		document.getElementById("riderTip").value="0";	
		document.getElementById("ordertype").value="0";
		document.getElementById("pickup").style.color = "white";
		document.getElementById("pickup").style.backgroundColor = "#be2c2c";

		document.getElementById("delivery").style.color = "black";
		document.getElementById("delivery").style.backgroundColor = "#f2f2f2";

		document.getElementById("addrsid").disabled = true;
		document.getElementById("selectaddress").style.display = "none";
		document.getElementById("rider_tip").style.display = "none";

		document.getElementById("delivery_fee").value="0";
		document.getElementById("deliveryfeeinvoice").innerHTML="0";
		document.getElementById("addrsid").selectedIndex = "0";
		
	}

	

	totalCalculation();

}

function addressDlivryFee($data)
{
	var myvar = $data;
	var arr = myvar.split(',');
	//alert(arr[1]);
	document.getElementById("delivery_fee").value=arr[1];
	document.getElementById("deliveryfeeinvoice").innerHTML=arr[1];


	totalCalculation();
}


function verifyCoupan()
{
	document.getElementById("cupnbtn").innerHTML='<button type="button" style="position: absolute; margin-left: -60px; background:#f2f2f2; color: black; border: solid 0px; padding: 5px 15px; border-radius: 3px; margin-top: -5px;">...</button>';
	var couponcode= document.getElementById("couponcode").value;
	jQuery.ajax({
		type: "POST",
		url: "addcookie.php?verifycoupan=ok&data="+couponcode,
		data: couponcode,
		dataType: "text",
		success: function(response){
			//alert(response);
			

			if(response=="invalid coupon code")
			{
				alert(response);
				document.getElementById("cupnbtn").innerHTML='<button type="button" style="position: absolute; margin-left: -60px; background: #be2c2c; color: white; border: solid 0px; padding: 5px 15px; border-radius: 3px; margin-top: -5px;" onclick="verifyCoupan()">Verify</button>';
			}
			else
			{
				var myvar = response;
				var arr = myvar.split(',');
				//alert(arr[1]);
				document.getElementById("coupancodeid").value=arr[0];
				document.getElementById("discountvalue").value=arr[1];
				document.getElementById("cupnbtn").innerHTML='<button type="button" style="position: absolute; margin-left: -60px; background:#f2f2f2; color: black; border: solid 0px; padding: 5px 15px; border-radius: 3px; margin-top: -5px;">Verifed</button>';
			
				totalCalculation();


			}
			
			//console.log(response);
			//document.getElementById('response').innerHTML = response;
			//location.reload(true);
			//$(".cartbox").toggleClass('show');
		}
	});
}



function totalCalculation()
{
	// total calculation 
	

	var riderTip = document.getElementById("riderTip").value;
	
	if(riderTip=="")
	{
		var riderTip ="0";
	}
	document.getElementById("checkoutridertip").innerHTML = riderTip+".00";


	//var riderTip =document.getElementById("riderTip").value;
	var sub_total =document.getElementById("subtotal").value;
	var tax =document.getElementById("tax").value;
	var delivery_fee=document.getElementById("delivery_fee").value;

	var discountvalue=document.getElementById("discountvalue").value;
	if(discountvalue!="0")
	{
		var afterDiscount = sub_total - (sub_total * (discountvalue / 100));
		document.getElementById("discountinvoice").innerHTML=afterDiscount;
		
		var afterDiscountsubTotal = sub_total - afterDiscount;
		document.getElementById("subtotal").value=afterDiscountsubTotal;
		document.getElementById("subtotalinvoice").innerHTML=afterDiscountsubTotal;
		document.getElementById("discountvalue").value="0";
		
		var sub_total =document.getElementById("subtotal").value;
	}

	
	
	var totalbill=parseInt(riderTip)+parseInt(sub_total)+parseInt(tax)+parseInt(delivery_fee);
	document.getElementById("totalPrice").value = totalbill;
	document.getElementById("total_price").innerHTML = totalbill+".00";

	// total calculation end
}


function clearCart()
{
	document.getElementById('showcart').innerHTML = "<div style='text-align: center;font-size: 20px;padding: 40px 0 20px 0;'><img src='img/nocart.png' alt='empty cart' style='width: 180px; margin-top:60px;'><br/><div style='margin: 20px 0 0 0; padding: 0; font-size: 20px; font-weight: 300;'>Cart is empty!</div></div>";
	jQuery.ajax({
		type: "POST",
		url: "addcookie.php?clearCart=ok",
		data: "0",
		dataType: "text",
		success: function(response){
			//alert("");
			//console.log(response);
			document.getElementById('showcart').innerHTML = response;
			//location.reload(true);
			//$(".cartbox").toggleClass('show');
		}
	});
}


















