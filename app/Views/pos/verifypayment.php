<body class="green">


 
  <div id="login-page" class="row" style = "margin-top: 55px;">
    <div class="col s12 z-depth-6 card-panel">
     <form name="form1" id="form1" method="post" action="iregister" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
          <a href="index"> <img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="School Logo" width="111" height="108" class="responsive-img valign profile-image-login"></a>
<p class="center login-form-text" style = "font-weight: bold; color: #104E8B; font-size: 25px; text-transform:capitalize;">COLLEGE OF NURSING AND MIDWIFERY<br> KATSINA</p>
                <p class="center login-form-text" style = "color: #104E8B; font-size: 20px;">GENERIC PAYMENTS - Preview</p>
                
                
          </div>
        </div>
       
       
       
      <div class="row">
        <div class="input-field col s12">
          
          <i class="mdi-action-assignment-ind prefix"></i>
          <input id="matno" type="text" class="validate" maxlength = "50" name="matno" required autocomplete="off" value = "<?= $matno; ?>">
          <label for="matno">Registration Number</label>
        </div>

      </div>
       
     
     
        <div class="row">
        <div class="input-field col s12">
         <i class="mdi-social-person prefix"></i>
          <input id="fullnames" type="text" class="validate" name="fullnames" required autocomplete="off" value = "<?= $fullnames; ?>">
          <label for="fullnames">Fullames</label>
        </div>
        
        
      </div>
       <div class="row">
       
        
        <div class="input-field col s12">
         <i class="mdi-communication-phone prefix"></i>
          <input id="phone" type="tel" class="validate" name="phone" required data-length="10" autocomplete="off" value = "<?= $phone; ?>">
          <label for="phone">GSM Number</label>
        </div>
        </div>
        
        <div class="row">
        <div class="input-field col s12">
        <i class="mdi-communication-email prefix"></i>
          <input id="demail" type="email" class="validate" name="demail" required autocomplete="off" value = "<?= $email; ?>">
          <label for="demail">Email</label>
        </div>
       
        

    
        
       
       
        
      
       
       
        <div class="row">
       <div class="input-field col s12">
   
   
   
               
               <select class="browser-default" required name="prog" id="prog" >
               
                  <?php  echo "<option value='".$prog."'>".$dprog."</option>";   ?>                            
  </select>
              </div>
              
              
  

      
    
       </div>
       
      
    
      
       
    
        
      
       
       
     
       
       
    
       
      
       
       
        <div class="row">
       <div class="input-field col s12">
   
  <select class="browser-default" required name="pitem" id="pitem">
                                                      
               <?php
         									 
          									   echo "<option value='".$pitem."'>".$itemname." - ".$itemamt."</option>";
           									 
          											 ?>                                       
  </select>

       </div>
      
          
        
       
     
          
        <div class="row">
          <div class="input-field col s12"> 
            <input id="captchaResult" type="text" data-length="10" required name="captchaResult" autocomplete="off">
            <label for="input_text">Solve the Maths: <?php $min_number = 1;
	$max_number = 35;

	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
			echo $random_number1 . ' + ' . $random_number2 . ' = ';
		?></label><input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
		<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" /><input name="do" type="hidden" id="do" value="contact" />
          </div>
        </div>
        
        
          <div class="row margin">
          <div class="input-field col s12">
           
            <input type= "submit" name = "submit" value = "PROCESS PAYMENT"  onclick = "alert('Please wait will we generate your transaction details')" style = "width: 100%; padding: 9px; background: #060; color: white; border: 0px; " >
          <br><br>
          
        
          </div>
        </div>
        
        
      </form>   <div   align = "center"> <a href = 'index' style = "width: 100%; padding: 9px; background: #060; color: white; border: 0px; " >Go Back</a></div>
    </div>
  </div>