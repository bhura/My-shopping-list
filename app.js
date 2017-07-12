$(document).ready(function(){
  loadData();
  // load shopping list from database
  function loadData(){
    $.post( "php/readData.php", function( data ) {
      $( "#displayItem" ).html( data );

    });
  }
  //adding itemList to database
  $('#addListBtn').click(function(){
    var error = "";
    if ($("#name").val() == "") {
        error += "The Item name field is required."
    }
    if(error != ""){
      $('.error').css('display','block');
      $('.error').html('<p>'+error+'</p>');
    }else {
      $.post( "php/addItem.php", $('form').serialize() )
        .done(function( data ) {
          //alert( "Data Loaded: " + data );
      //  $( "#displayItem" ).html( data );
      $('.error').css('display','none');
      $('.sucess').css('display','block');
      $('.sucess').html('<p> Successfully added new Item.</p>');

      });
    }
  });
  function addData(){

  }
  $('.add-btn').click(function(){
    $('.item-container').css('display','none');
    $('.add-item-container').css('display','block');
  });
  $('.show-list-btn').click(function(){
    $('.add-item-container').css('display','none');
    $('.item-container').css('display','block');
    loadData();
  });
  //Check and uncheck item
  function checkItemToggle() {
    var status = 0 ;
    if($(this).is(':checked')){
      $(this).parents('li').css('color','gray');
      status = 1;
      //$(this).removeAttr('checked');

    }else{
      $(this).parents('li').css('color','#fff');
      status = 0;
      //$(this).attr('checked', 'checked');
    }
    var id = $(this).attr('id');

    $.post( "php/update.php", {IDs:id, status:status} )
      .done(function( data ) {
        //loadData();

      //$( "#displayItem" ).html( data );

    });
  }

  //Remove item
  function removeItem() {
  	//$(':checked').parents('li').remove();
    var IDs = [];
$('.checked:checked').each(function(){ IDs.push(this.id); console.log(IDs); });
$.post( "php/delete.php", {IDs:IDs} )
  .done(function( data ) {
    loadData();
  //  alert( "Data Loaded: " + data );
  //$( "#displayItem" ).html( data );

});
  }

  //Event handler for remove item
  $(document).on('click', '.delet-btn', removeItem);
  	//this syntax apparently makes it handle dynamically generated items

  //Event handler for check toggle item
  $(document).on('click', '.item-status', checkItemToggle);

});
