$('.govuk-back-link').click(function(){
	window.history.back();
});

//for exported files
$('.govuk-radios__item').each(function() {
	var numRadios = $(this).length;
	console.log(numRadios);
	//validate radios
	if (numRadios == 2) {
		$(this).css('display','inline-flex');
	}
});

$('input').each(function(){
  if (!$(this).attr("data-conditional-data") == "") {
    var conditionSet = $(this).attr('data-conditional-data');
    $(this).change(function() {
      $('.govuk-button').attr('href',conditionSet+'.html');
      console.log(conditionSet);
    });
  }
});

$("a.govuk-button").each(function(){
  var link = $(this).attr("href");
  $(this).attr("href",link+".html")
});
$("textarea, select").removeAttr("disabled");
$("p, dd, li, dt, span, h1, h2, h3, h4").each(function(){
  if($(this).is(':contains("[[[")')) {
    var textVal = $(this).text().replace("[[[", "").replace("]]]","");
    var sessionVal = sessionStorage.getItem(textVal);
    console.log(sessionVal);
    $(this).text(sessionVal);
  }
});
$( document ).ready(function() {
  sessionStorage.clear();
});
$("textarea, select").removeAttr("disabled");
$("p, dd, li, dt, span, h1, h2, h3, h4").each(function(){
  if($(this).is(':contains("[[[")')) {
    var textVal = $(this).text().replace("[[[", "").replace("]]]:", "");
    var sessionVal = sessionStorage.getItem(textVal);
    console.log(sessionVal);
    $(this).text(sessionVal);
  }
});

$("input").each(function(){
  var inputName = $(this).attr("name");
  if ($(this).attr("data-use-data") == "use-data") {
    $(this).blur(function() {
      var inputVal = $(this).val();
      sessionStorage.setItem(inputName,inputVal);
      console.log(sessionStorage);
    });
  }
});
