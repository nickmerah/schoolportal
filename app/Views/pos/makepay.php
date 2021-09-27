<body class="green">


  <div id="login-page" class="row" style = "margin-top: 55px;">
    <div class="col s12 z-depth-6 card-panel">
     <form name="form1" id="form1" method="post" action="vregister" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
           <a href="index"> <img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="School Logo" width="111" height="108" class="responsive-img valign profile-image-login"></a>
<p class="center login-form-text" style = "font-weight: bold; color: #104E8B; font-size: 25px; text-transform:capitalize;">COLLEGE OF NURSING AND MIDWIFERY<br> KATSINA</p>
                <p class="center login-form-text" style = "color: #104E8B; font-size: 20px;">GENERIC PAYMENTS</p>
             
          </div>
        </div>
       
       
       
      <div class="row">
        <div class="input-field col s12">
          
          <i class="mdi-action-assignment-ind prefix"></i>
          <input id="matno" type="text" class="validate" maxlength = "50" name="matno" required autocomplete="off">
          <label for="matno">Registration Number</label>
        </div>

      </div>
       
     
     
        <div class="row">
        <div class="input-field col s12">
         <i class="mdi-social-person prefix"></i>
          <input id="fullnames" type="text" class="validate" name="fullnames" required autocomplete="off">
          <label for="log_surname">Fullnames</label>
        </div>
        
       
      </div>
       <div class="row">
       
        <div class="input-field col s12">
         <i class="mdi-communication-phone prefix"></i>
          <input id="phone" type="tel" class="validate" name="phone" required data-length="11" autocomplete="off">
          <label for="phone">GSM Number</label>
        </div>
        </div>
        
        <div class="row">
        <div class="input-field col s12">
        <i class="mdi-communication-email prefix"></i>
          <input id="demail" type="email" class="validate" name="demail" required autocomplete="off">
          <label for="demail">Email</label>
        </div>
       
        
 <div class="input-field col s12">
   
  <select class="browser-default" required name="prog" id="prog"  >
  <option value="">Select Programme</option>
              <?php
         									  foreach($programmes as $programme){
          									   echo "<option value='".$programme->programme_id."'>".$programme->programme_name."</option>";
           										}
          											 ?>                                   
  </select>

       </div>
    
        
       
       
        
      
        
       
       
        
    
       </div>
       
    
        
      
       
       
     
       
       
    
       
      
       
       
        <div class="row">
       <div class="input-field col s12">
   
 <select class="browser-default" required name="pitem" id="pitem">
                                                     <option value="">Select Payment Item</option>
                                                     
                                                      <?php
         									  foreach($ofeedetails as $ofeedetail){
          									   echo "<option value='".$ofeedetail->of_id."'>".$ofeedetail->ofield_name." - ".$ofeedetail->of_amount."</option>";
           										}
          											 ?>  
                                                    
  </select>

       </div>
      
          
        
       
     
          
       
        
        
          <div class="row margin">
          <div class="input-field col s12">
           
            <input type= "submit" name = "submit" value = "CONTINUE"  onclick = "alert('You details have been sent for processing....')" style = "width: 100%; padding: 9px; background: #060; color: white; border: 0px;" >
          <br><br>
          </div>
        </div>
        
        
      </form>
    </div>
  </div>