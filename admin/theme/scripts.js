
  $('.color').each(function(){
    var colour = $(this).text();
    //console.log(colour);
    $(this).css('background',colour).css('font-size','0');
  });

  $('#canvas').on('dblclick', function (event) {
    $target = $(event.target);

    $target.dblclick(function(event) {
      $('#tool-bar').text($(this).prop('nodeName'));
      $('.ui-sortable-handle').removeClass('selected');
      $target.attr('contenteditable','true');
      $target.addClass('selected');
      //alert($(this).prop('nodeName'));

      var type = $(this).prop('nodeName');

      switch(type) {
        case 'INPUT':
          console.log($(this).attr('type'));
          console.log($(this).attr('value'));
          console.log($(this).attr('name'));
          break;
        case 'H1':
          console.log($(this).text());
          break;
        case 'H2':
          // code block
          break;
        case 'H3':
          // code block
          break;
        case 'H4':
          // code block
          break;
        case 'H5':
          // code block
          break;
        case 'A':
          // code block
          break;
        default:
          // code block
      }
    });
  });
  $('body').on('click', '.selected', function (event) {
    //alert($(this).prop('nodeName'));
  });
//$('#canvas').removeClass('selected');
$('#canvas button, #canvas a').click(function(e){
  e.preventDefault();
});
