// Menu burger
function burgerMenu(nb) {
  $("#myDropdown"+nb).toggleClass("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.makeitdrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 




// Adapter la hauteur du support à la hauteur de l'écran
var newheights; var newheightc; var supp;
var bod; var hea; var ent; var nav; var foot; var err; var tabs;
var allheights = [];

function sizesup() {
	bod = window.innerHeight;
	hea = $('header').height();
	ent = $('#entete').height() + parseInt($('#entete').css('padding-top')) + parseInt($('#entete').css('padding-bottom')) + parseInt($('#entete').css('margin-top')) + parseInt($('#entete').css('margin-bottom'));
	nav = $('nav').height() + parseInt($('nav').css('padding-top')) + parseInt($('nav').css('padding-bottom')) + parseInt($('nav').css('margin-top')) + parseInt($('nav').css('margin-bottom'));
	foot = $('footer').height() + parseInt($('footer').css('padding-top')) + parseInt($('footer').css('padding-bottom')) + parseInt($('footer').css('margin-top')) + parseInt($('footer').css('margin-bottom'));
	err = $('#error').height() + parseInt($('#error').css('padding-top')) + parseInt($('#error').css('padding-bottom')) + parseInt($('#error').css('margin-top')) + parseInt($('#error').css('margin-bottom'));
	tabs = $('#tabscontainer').height();

	allheights = [hea, ent, nav, foot, err, tabs];

	supp = $('#support').height() + parseInt($('#support').css('padding-top')) + parseInt($('#support').css('padding-bottom'));;
	newheights = bod;
	for (var i = 0; i < allheights.length; i++) {
		if (allheights[i] > 0) {newheights -= allheights[i]}
	}
	$('#support').css('min-height', (newheights)+'px');
	newheightc = newheights - parseInt($('#support').css('padding-top')) - parseInt($('#support').css('padding-bottom'));
	$('#corps').css('min-height', (newheightc)+'px');
}
sizesup();

$(window).resize(function() {
	sizesup();
});
