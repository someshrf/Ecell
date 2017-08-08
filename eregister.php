<?php include('eserver.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>user register</title>
  <link rel="stylesheet" type="text/css" href="estyle.css">
  
  <!--copy -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>

   <!--sockets-->
   <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <script src="main.js"></script> 

    <link rel="stylesheet" href="runnable.css" />
    
    </head>


<body>
    <div class="header1">
        <h2>Register</h2>
    </div>

    <script>
      $(document).ready(function(){
      $("#contact-form").on("submit", function(e){
        e.preventDefault();
    dataString = jQuery('form#contact-form').serialize();
    jQuery.ajax({
        type: "POST",
        url: "eregister.php",
        data: dataString,
        success:  function(data)
        {   $( '#contact-form' ).each(function()
            {this.reset();});
        alert('Form successfully submitted.')
        },
        error:  function(data)
        { 
            alert('Form not submitted.')
        }
    }); 
});
});
</script>

    <form method="post" id="contact-form" enctype="multipart/form-data">
   
     <!-- error messages -->
     <?php
      include('delerrors.php'); ?>
      <div class="formm">

       <!--user details-->
       <div class="input-group3">
          <label>Username</label>
          <input type="text" name="username" id='user' value="<?php echo $username; ?>" required><span id="user-availability-status"></span> 
       </div>
       
        <div class="input-group3">
          <label>Phone no</label>
          <input type="phone" name="phone_1" required>
       </div>

       <div class="input-group3">
          <label >E-mail</label>
          <input type="email" name="email_1" required>
       </div>
      
       <div class="input-group3">
          <label >DOB</label>
          <input type="text" id="datepicker" name="dob" placeholder="mm/dd/yyyy" required>
       </div>
 

     <div class="input-group3">
      <label >Department <br></label>
      
      <select name="dept" class="input-group3" required>
       <optgroup label="department">
        <option disabled selected value style="display: none">-- select an option --</option>
        <option value="arch">Arch</option>
        <option value="civil">Civil</option>
        <option value="chem">Chem</option>
        <option value="cse">CSE</option>
        <option value="ece">ECE</option>
        <option value="eee">EEE</option>
        <option value="ice">ICE</option>
        <option value="mech">Mech</option>
        <option value="meta">Meta</option>
        <option value="prod">Prod</option>
       </optgroup>
      </select>
     </div>
     
     <div class="input-group3">

      <label>Year <br></label>
      
      <select name="year" class="input-group3" required>
        <optgroup label="year">
         <option disabled selected value style="display: none">-- select an option --</option>
         <option value="2nd">2nd</option>
         <option value="3rd">3rd</option>
         <option value="4th">4th</option>
        </optgroup> 
      </select>
    </div>
    
     <div class="input-group3">

      <label>Favorite Event <br></label>
      
      <select name="event" class="input-group3" required>
        <optgroup label="event">
         <option disabled selected value style="display: none">-- select an option --</option>
         <option value="Ventura">Ventura</option>
         <option value="Esummit">Esummit</option>
         <option value="Conclave">Conclave</option>
        </optgroup> 
      </select>
    </div>
    
     <div class ="input-group4">
       <label> Upload Resume <br></label>
        <input type="file" name="resume" required>
    </div>
    
   <!--captcha-->
    <div class="input-group4">
       <label>Captcha Image</label>
       <img id="captcha" src="/secureimage/secureimage_show.php"/>

       <input type="text" name="captcha_code" size="10" maxlength="6" />
         <a href="#" class="sty" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"><br>[ Different Image ]</a>
    </div>  
      <!-- register button -->

       <div class="input-group3">
          <button type="submit" name="submit" class="btn" onclick="loadDoc()">Register</button>   
     </div>
 </div>
 <ul class="list_registered"></ul>
</form>
          
<script src="/ecell/socket_client.js"></script>
<script>
  var socket = io('localhost:3000');
  console.log(socket) ;
  document.querySelector('.btn').onclick = function(){
    socket.emit('registered',{data:document.getElementById('user').value}) ;
    console.log(document.getElementById('user').value) ;
  }
  socket.on('registered_fs', function(datta){
    var list_registered = document.querySelector('.list_registered') ;
    list_registered.innerHTML += '<li>'+datta.data+' registered'+'</li>'
    console.log(datta)
  })
</script>
</body>

</html>
     
