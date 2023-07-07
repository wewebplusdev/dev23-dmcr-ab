// JavaScript Document
$(document).ready(function() {
	getCalendarAll();

});


$(document).on("click", "ul.pagination li a", function () {
	var pageCall = $(this).attr('href');
 //alert(pageCall);
	 DetailLoadLoad();
	 var DIR = $("base").attr('href');
	 var TYPE = "POST";
	 var URL =  pageCall;
	 var dataSet = jQuery("#myCalendarForm").serialize();
 
	 jQuery.ajax({type: TYPE, url: URL, data: dataSet,
		 success: function (html) {
 
			 setTimeout(function () {
				 $(".showDetail .list").html(html);
			 }, 500);
			 //    $(".showDetail .list").html(html);
		 }
	 });
 
	 return false;
 });

function calendarLoad() {
    $('.showCalenda').append("<div class='loadding'>Loadding</div>");
    return true;
}

function DetailLoadLoad() {
    $('.showDetail .list').append("<div class='loadding'>Loadding</div>");
    return true;
}


var path = $('base').attr("href");

function getCalendarAll() {
	calendarLoad();

	var TYPE="POST";
	// var URL="big-calendar_Car.php";
	
	var dataSet= jQuery("#myCalendarForm").serialize();
	jQuery.ajax({
		type:TYPE,
		url:path+'bookingCar/calenda',
		data:dataSet,
		success:function(html){
			
			$('.showCalenda').html(html);
			getCalendarDetailAll(0);
		}
	}); 
}	

function getCalendarDetailAll(action) {
	jQuery("#divInformationWindow_Area").hide();
	jQuery("#calWaittingBox").show();

	var TYPE="POST";
	var URL="big-calendardetail_Car.php";
	
	var dataSet={ 
		actionVal : action
		};
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
			jQuery("#calWaittingBox").hide();
		}
	}); 
}	


function GetCalendar() {
	jQuery("#divInformationWindow_Area").hide();
	jQuery("#calWaittingBox").show();

	var TYPE="POST";
	var URL="big-calendar_Car.php";
	
	var dataSet= jQuery("#myCalendarForm").serialize();
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#CalendarDetail").show();
			jQuery("#CalendarDetail").html(html);
			GetCalendarDetail();
		}
	}); 
}	
	
function GetCalendarDetail() {
	jQuery("#divInformationWindow_Area").hide();
	jQuery("#calWaittingBox").show();

	var TYPE="POST";
	var URL="big-calendardetail_Car.php";
	
	var dataSet= jQuery("#myCalendarForm").serialize();
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
			jQuery("#calWaittingBox").hide();
		}
	}); 
}	


function SaveDataCalendar(myCalendarDate,action) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL="big-calendardetail-thickbox_Car.php";
	
	var dataSet= { myCalendarDate : myCalendarDate, action : action };
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
        	setTimeout(jQuery.unblockUI, 500);
		}
	}); 
}

function nextbyCal(myCalendarDate,action,PageShow) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});

	var TYPE="POST";
	var URL="big-calendardetail_Car.php";
	var dataSet={ 
	myCalendarDate : myCalendarDate,
	PageShow : PageShow,
	actionVal : action
	};

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
        	setTimeout(jQuery.unblockUI, 500);
		}
	}); 
		
	}

function delbyCal(myCalendarDate,action,valDel) {
	if(confirm('Are you sure to delete this record?')) {
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});

	var TYPE="POST";
	var URL="big-calendardetail_Car.php";
	var dataSet={ 
	myCalendarDate : myCalendarDate,
	valDel : valDel,
	actionVal : action
	};

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
        	setTimeout(jQuery.unblockUI, 500);
		}
	}); 
		
	}
	}


function GetCalendarDetailAll(action) {
	jQuery("#divInformationWindow_Area").hide();
	jQuery("#calWaittingBox").show();

	var TYPE="POST";
	var URL="big-calendardetail_Car.php";
	
var dataSet={ 
	actionVal : action
	};
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#divInformationWindow_Area").show();
			jQuery("#divInformationWindow_Area").html(html);
			jQuery("#calWaittingBox").hide();
		}
	}); 
}	


function searchCarType(gid,tid) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL="loadCarSearch.php";
	
var dataSet={ 
	gid : gid,
	tid : tid
	};
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxSelectCar").show();
			jQuery("#boxSelectCar").html(html);
        	setTimeout(jQuery.unblockUI, 500);
		}
	}); 
}
