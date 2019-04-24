// Menu burger
function burgerMenu() {
  document.getElementById("myDropdown").classList.toggle("show");
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
var bod; var ent; var nav; var foot; var err;

function sizesup() {
	bod = $('body').height();
	ent = $('#entete').height();
	nav = $('nav').height() + 2*parseInt($('nav').css('padding-top'));
	foot = $('footer').height() + parseInt($('footer').css('padding-top')) + parseInt($('footer').css('padding-bottom'));
	err = $('#error').height() + 2*parseInt($('#error').css('padding-top'));

	supp = $('#support').height() + parseInt($('#support').css('padding-top')) + parseInt($('#support').css('padding-bottom'));;
	newheights = bod - ent - nav - foot;
	if (err > 0) {newheights -= err;}

	if (supp < newheights) {
		$('#support').css('min-height', (newheights)+'px');
		newheightc = newheights - parseInt($('#support').css('padding-top')) - parseInt($('#support').css('padding-bottom'));
		$('#corps').css('min-height', (newheightc)+'px');
	}
	else {
		$('#corps').css('min-height', '0');
		$('#support').css('min-height', '0');
		$('#corps').css('height', 'auto');
		$('#support').css('height', 'auto');
	}
}
sizesup();

$(window).resize(function() {
	sizesup();
});
