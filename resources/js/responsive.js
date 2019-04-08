console.log('responsive');
// Menu burger
function myFunction() {
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
var bod; var ent; var nav; var foot;

function sizesup() {
	bod = $('body').height();
	ent = $('#entete').height();
	nav = $('nav').height() + 2*parseInt($('nav').css('padding-top'));
	foot = $('footer').height() + parseInt($('footer').css('padding-top')) + parseInt($('footer').css('padding-bottom'));

	supp = $('#support').height() + parseInt($('#support').css('padding-top')) + parseInt($('#support').css('padding-bottom'));;
	newheights = bod - ent - nav - foot;

	if (supp < newheights) {
		$('#support').css('height', (newheights)+'px');
		newheightc = newheights - parseInt($('#support').css('padding-top')) - parseInt($('#support').css('padding-bottom'));
		$('#corps').css('height', (newheightc)+'px');
	}
	else {
		$('#corps').css('height', 'auto');
		$('#support').css('height', 'auto');
	}
}
sizesup();

$(window).resize(function() {
	sizesup();
});