<?php include('eserver.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>user register</title>
  <link rel="stylesheet" type="text/css" href="estyle.css">
</head>


<body>
    <div class="header1">
        <h2>Register</h2>
    </div>

    <form method="post" action="eregister.php"  enctype="multipart/form-data">
   
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
          <button type="submit" name="register" class="btn" onclick="loadDoc()">Register</button>   
     </div>
 </div>
</form>
          
</body>
</html>