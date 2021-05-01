<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/css/bootstrap3.css">
  </head>
  <body>
    <div id="sample">
        <div id="toolbar">
        <ul class="clearfix">
          <li id="editTitle" class="edit btn">edit title</li>
          <li id="editWidth" class="edit btn">edit width</li>
          <li id="editHeight" class="edit btn">edit height</li>
          <li id="editColor" class="edit btn">edit color</li>
        </ul>
        </div>
        <div id="container">
        <ul class="clearfix">
          <li id="1" class="item">1</li>
          <li id="2" class="item">2</li>
          <li id="3" class="item">3</li>
          <li id="4" class="item">4</li>
          <li id="5" class="item">5</li>
          <li id="6" class="item">6</li>
          <li id="7" class="item">7</li>
          <li id="8" class="item">8</li>
          <li id="9" class="item">9</li>
          <li id="10" class="item">10</li>
        </ul>
        </div>
      </div><script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready( function() {
        $('#wrap').draggable({
          cursor:'move'
        });
        $('#box').setCenter(); // set the msg box in center
        $('#msg').hide(); // hide it
        // fire selectable on doc ready
        $('#container ul').selectable({
          filter:'li.item',
          stop:function(){
            edit(); // fire function edit on selectable stop event
          }
        });
        function edit(){
          // fire function when edit btn clicked
          $('.edit').click(function(){
            var btnClass=$(this).attr('id'); // get edit btn id to pass to switch
            var selectedItemAmount=0; // declaim a variable
            // count how many items are selected
            $('.ui-selected').each(function(){
              selectedItemAmount=selectedItemAmount+1;
            });
            // private edit function for each edit ( edit title, width, ..... )
            function _edit(boxTitle,selectedItemAmount){
              $('#box .boxTitle').html(boxTitle); // change the msg box title
              $('#box .yes').click(function(){
                // show us how many times the function is excute when click on yes btn
                alert('edit ' + selectedItemAmount + ' selected item title');
                $('#msg').hide(); // hide msg box when yes btn is clicked
              });
            }
            // a loop that define what kind of "edit" is fired
            switch(btnClass){
              case 'editTitle':
                boxTitle='edit title';
                _edit(boxTitle,selectedItemAmount);
                break;
              case 'editWidth':
                boxTitle='edit width';
                _edit(boxTitle,selectedItemAmount);
                break;
              case 'editHeight':
                boxTitle='edit height';
                _edit(boxTitle,selectedItemAmount);
                break;
              case 'editColor':
                boxTitle='edit color';
                _edit(boxTitle,selectedItemAmount);
                break;
            }
            $('#msg').show(); // show msg box
            // hide msg box when no btn is clicked
            $('#box .no').click(function(){
              $('#msg').hide();
            });
          });
        }
      });
      // set center
      $.fn.setCenter = function(){
        var boxLeft=(($(window).width())-($(this).outerWidth()))/2;
        $(this).css({
          'left':boxLeft
        });
      };// oef set center
</script>
  </body>
</html>