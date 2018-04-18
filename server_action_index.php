

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script type="text/javascript">
    function clickButton(){
    var name=document.getElementById('name').value;
    var descr=document.getElementById('descr').value;
    $.ajax({
            type:"post",
            url:"server_action.php",
            data: 
            {  
               'name' :name,
               'descr' :descr
            },
            cache:false,
            success: function (html) 
            {
               alert('Data Send');
               $('#msg').html(html);
            }
            });
            return false;
     }
    </script>
    <form>
    <input type="" name="name" id="name">
    <input type="" name="descr" id="descr">
    <input type="submit" name="" value="submit" onclick="return clickButton();">
    </form>
    <p id="msg"></p>
    </body>
    </html>