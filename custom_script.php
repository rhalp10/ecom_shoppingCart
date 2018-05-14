<script type="text/javascript">
  function updateContent(){

  $("#showcart").load('ajax_cart.php'); 
  
  }
  setInterval(function() {updateContent()}, 1000);
  

    $('#show_pass').hide();

     document.getElementById('e_fullname').disabled = true;
     document.getElementById('e_email').disabled = true;
     document.getElementById('e_phone').disabled = true;
     document.getElementById("e_address").disabled = true;
     
  function onchange_Func() {

    $('#show_pass').hide();

    var x = document.getElementById("mySelect").value;
    if(x == 'unlock'){
    $('#show_pass').show();
     document.getElementById('e_fullname').disabled = false;
     document.getElementById('e_email').disabled = false;
     document.getElementById('e_phone').disabled = false;
     document.getElementById("e_address").disabled = false;
    }
    if(x == 'disable'){
     $('#show_pass').hide();
     document.getElementById('e_fullname').disabled = true;
     document.getElementById('e_email').disabled = true;
     document.getElementById('e_phone').disabled = true;
     document.getElementById("e_address").disabled = true;
    }
    if(x == 'def'){
    $('#show_pass').hide();
    }
   
    
}
   $(document).ready(function(){
      $(document).on('click', '#view_product', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#viewprod-content').html(''); // leave it blank before ajax call
      $('#viewprod-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'ajax_view.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#viewprod-content').html('');    
        $('#viewprod-content').html(data); // load response 
        $('#viewprod-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#viewprod-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#viewprod-loader').hide();
      });
      
    });



      
        $(document).on('click', '#minus_product', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $.ajax({
        url: 'action.php',
        type: 'POST',
        data: 'minus_product='+uid,
        dataType: 'html'
      })
      .done(function(data){
       
      })
      .fail(function(){
        
      });
      
    });
          $(document).on('click', '#plus_product', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
     
      // $('#viewprod-content').html(''); // leave it blank before ajax call
      // $('#viewprod-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'action.php',
        type: 'POST',
        data: 'plus_product='+uid,
        
      })
      .done(function(data){
        
      })
      .fail(function(){
        
      });
      
    });

  }); 

</script>