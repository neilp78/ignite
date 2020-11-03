$('.positionsetting').val('0');
if ($('.selected[class*="govuk-!-margin-top-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-top-") + 1);
  var positionVal = number.slice(- 1);
  $('#margin-top').val(positionVal);
}
if ($('.selected[class*="govuk-!-margin-right-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-right-") + 1);
  var positionVal = number.slice(- 1);
  $('#margin-right').val(positionVal);
}
if ($('.selected[class*="govuk-!-margin-bottom-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-bottom-") + 1);
  var positionVal = number.slice(- 1);
  $('#margin-bottom').val(positionVal);
}
if ($('.selected[class*="govuk-!-margin-left-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-left-") + 1);
  var positionVal = number.slice(- 1);
  $('#margin-left').val(positionVal);
}
if ($('.selected[class*="govuk-!-padding-top-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-top-") + 1);
  var positionVal = number.slice(- 1);
  $('#padding-top').val(positionVal);
}
if ($('.selected[class*="govuk-!-padding-right-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-right-") + 1);
  var positionVal = number.slice(- 1);
  $('#padding-right').val(positionVal);
}
if ($('.selected[class*="govuk-!-padding-bottom-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-bottom-") + 1);
  var positionVal = number.slice(- 1);
  $('#padding-bottom').val(positionVal);
}
if ($('.selected[class*="govuk-!-padding-left-"]').length > 0 ) {
  var martingtopclass = $(this).attr('class').split(' ')[0];
  var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-left-") + 1);
  var positionVal = number.slice(- 1);
  $('#padding-left').val(positionVal);
}
//$('.positionsetting').blur(function(){
  $('.submit-edit').click(function(){
    var margTop = $('#margin-top').val();
    if (margTop > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-top-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-top-'+margTop);
    }
    var margRight = $('#margin-right').val();
    if (margRight > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-right-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-right-'+margRight);
    }
    var margBottom = $('#margin-bottom').val();
    if (margBottom > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-bottom-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-bottom-'+margBottom);
    }
    var margLeft = $('#margin-left').val();
    if (margLeft > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-left-'+margLeft);
    }
    var padtop = $('#padding-top').val();
    if (padtop > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+margLeft);
    }
    var padRight = $('#padding-right').val();
    if (padRight > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padRight);
    }
    var padBottom = $('#padding-bottom').val();
    if (padBottom > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padBottom);
    }
    var padLeft = $('#padding-left').val();
    if (padLeft > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padLeft);
    }
  });
//});
