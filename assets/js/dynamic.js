function toRootFolder(){
	var rooturl = "LE3";
	var cuturl = location.href.split("/");
	var last_url_place = cuturl.length - 1;
	var root_url_place;
	var back_url = "";
	for(var i = last_url_place; i > 0; --i){
		if(cuturl[i].toLowerCase() === rooturl.toLowerCase()){
			root_url_place = last_url_place - i - 1;
			break;
		}
	}
	for(var i = 0; i < root_url_place; i++)
		back_url += "../";
	return back_url;
}

var navheight = $('#nav').outerHeight(true);
var imgheight = $(window).height();
$('body').css('padding-top', navheight);
$('#imgheader').height(imgheight - navheight);
if(typeof title === "undefined"){
	var title, img, price, description, material, tags = "", star;
}
/*
// HTML DYNAMIC CONTENT
$('title').html('PurryTails | ' + title);
$('.jsp-img').attr('src', img).attr('data-zoom-image', img);
$('.jsp-title').html(title);
$('.jsp-price').prepend(price);
$('.jsp-description').html(description);
$('.jsp-material').html(material);
// END HTML DYNAMIC CONTENT
*/
$('<span class="bread-tag">HOME / </span>').appendTo('.breadnav');
for(var i = 0; i < tags.length; i++)
	$('<span class="bread-tag">' + tags[i] + ' / </span>').appendTo('.breadnav');

// PROD RATING
for(var i = 0; i < star; i++)
	$('<i class="glyphicon glyphicon-star"></i>').appendTo('.prod-rating');
for(var i = star; i < 5; i++)
	$('<i class="glyphicon glyphicon-star-empty"></i>').appendTo('.prod-rating');
$('<i class="prod-rating-number">25</i>').appendTo('.prod-rating');
// END PROD RATING
//

// IMG PRODUCT ZOOM
$(".prod-img-zoom").elevateZoom();

// ITEM QUANTITY
$('.inc').bind('click', function(){
	var stock = parseInt($('#stock').val(),10);
	stock += 1;
	parseInt($('#stock').val(stock),10);
});

$('.dec').bind('click', function(){
	var stock = parseInt($('#stock').val(),10);
	if(stock > 0) stock -= 1;
	parseInt($('#stock').val(stock),10);
});
// END ITEM QUANTITY
//
// FOOTER
$('#footer-dynamic').html(''+
'<div id="footer">'+
	'<div class="container">'+
		'<div class="row">'+
			'<div class="col-md-3">'+
				'<h2>OPENING HOURS</h2>'+
				'<p>Monday: 7AM - 6:30PM</br>'+
				'Tuesday: 7AM - 7:30PM</br>'+
				'Wednesday: 8AM - 6:30PM</br>'+
				'Thursday: 9AM - 4:30PM</br>'+
				'Friday: 7AM - 5:30PM</br>'+
				'Saturday: 8AM - 3:00PM</br>'+
				'Sunday: CLOSED</p>'+
			'</div>'+
			'<div class="col-md-3">'+
				'<h2>QUICK LINKS</h2>'+
				'<p><a href="about.html">About Us</a></br>'+
				'<a href="contact.html">Contact</a></br>'+
				'<a href="privacy.html">Privacy Policy</a></br>'+
				'<a href="terms.html">Terms</a></br>'+
			'</div>'+
			'<div class="col-md-6">'+
				'<h2>KEEP IN TOUCH</h2>'+
				'<div class="bottom-social">'+
					'<a href="#" class="fagp"><i class="fa fa-google-plus sfa" aria-hidden="true"></i></a>'+
					'<a href="#"><i class="fa fa-facebook sfa" aria-hidden="true"></i></a>'+
					'<a href="#"><i class="fa fa-twitter sfa" aria-hidden="true"></i></a>'+
					'<a href="#"><i class="fa fa-tumblr sfa" aria-hidden="true"></i></a>'+
					'<a href="#"><i class="fa fa-instagram sfa" aria-hidden="true"></i></a>'+
				'</div>'+
				'<h2 style="margin-top:30px;">POWERED BY</h2>'+
				'<div class="bottom-social">'+
					'<a href="#"><i class="fa fa-html5 sfa" aria-hidden="true"></i></a>'+
					'<a href="#"><i class="fa fa-css3 sfa" aria-hidden="true"></i></a>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>'+
'<div id="footer-credits">'+
	'SHOPSTER &#169; 2017. ALL RIGHTS RESERVED'+
'</div>'
);
// END FOOTER