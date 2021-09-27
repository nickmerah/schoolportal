<body class="app-login p-3">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-0 col-md-15 col-lg-6 auth-main-col text-center p-3">
		     
			    
				    <div class="app-auth-branding mb-2"><a class="app-logo" href="<?= base_url();?>"><img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="logo"  ></a></div>
					<h1 class="auth-heading text-center mb-3">   College of Education,  Lanlate</h1>
                    
                    <h2 class="auth-heading text-center mb-3">Account / Biodata Creation</h2>
                   
                 
			        <div align="justify" style="font-size:15px; color:#009">
						 <?php  foreach($appdetails as $appdetail): ?> 
					      <div class="password mb-3">
								<label>Application/Registration Number: </label><br><strong><?= $appdetail->appno; ?></strong>
								 </div>
                            
							<div class="email mb-3">
								<label class="sr"  for="signup-email">Fullname: </label><br><strong><?= $appdetail->fullname; ?></strong>
								 
							</div>
							<div class="email mb-3">
								<label class="sr" for="signup-email">School:  </label><br><strong><?= $appdetail->faculties_name; ?></strong>
								 
							</div>
							<div class="password mb-3">
								<label class="sr" for="signup-password">Programme: </label><br><strong><?= $appdetail->programme_name; ?></strong>
								 </div>
							<div class="password mb-4">
								<label class="sr" for="signup-password">State of Origin: </label><br><strong><?= $appdetail->state_name; ?></strong>
								 	</div>
                                     <div class="password mb-4">
								<label class="sr" for="signup-password">Gender: </label><br><strong><?= $appdetail->gender; ?></strong>
								 	</div>
                                    <div class="password mb-4">
								<label class="sr" for="signup-password">Student Type: </label><br><strong><?= ucwords($appdetail->stdtype); ?></strong>
								 	</div>
                           
                          <?php  endforeach; ?>     
							
							 
						 <!--//auth-form-->		 
  
				 

			     
				
		
			    <!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col--><div class="col-12 col-md-6">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">  <h3 class="auth-heading text-center mb-3">Complete Biodata</h3>
							    <form class="settings-form" action="../account/store" method="post" enctype="multipart/form-data">
                                
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Password</label>
									    <input type="password" name = "pwd" class="form-control" id="setting-input-1" placeholder="Create a password not less than 4 characters" required autocomplete="off">
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Email</label>
									    <input type="email"   name="e_mail" class="form-control" id="setting-input-2" placeholder="Enter your Email" required autocomplete="off">
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Contact Address</label>
									    <input type="text" name="contact_address" class="form-control" id="setting-input-3" placeholder="Enter your Contact Address" required autocomplete="off">
									</div>
									
									 
                                   
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Permanent Home Address</label>
									    <input type="text" name="student_homeaddress" class="form-control" id="setting-input-3" placeholder="Enter your Permanent House Address" required autocomplete="off">
									</div>
									
									 <div class="mb-3">
									    <label for="setting-input-3" class="form-label">GSM Number</label>
									    <input type="number" name="gsm" class="form-control" id="setting-input-3" placeholder="Enter your GSM Number" required autocomplete="off">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Date of Birth</label>
									    <input type="date" name="dob" class="form-control" id="setting-input-2" placeholder="Select your Date of Birth" required autocomplete="off">
									</div>
								   <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Gender</label>
									   
                                        <select name="gender" class="form-control signup-password" id="inputSelect3" required>
								    <option value="<?= $appdetail->gender; ?>"><?= $appdetail->gender; ?></option>
								    
								    
							      </select>
									</div>
                                    
                                     <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Marital Status</label>
                                        <select name="marital_status" class="form-control signup-password" id="inputSelect3" required >
									     <option value="">- Select Marital Status -</option>
								    <option value="Single">Single</option>
								    <option value="Married">Married</option>
								     <option value="Widow">Widow</option>
								      <option value="Widower">Widower</option>
								       <option value="Divorced">Divorced</option>
								         <option value="Divorcee">Divorcee</option>
                                    </select>
									</div>
                                    
                                      <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Religion</label>
                                        <select name="religion" class="form-control signup-password" id="inputSelect3" required >
									     <option value="">- Select Religion -</option>
								    <option value="Islam">Islam</option>
								    <option value="Christianity">Christianity</option>
								     <option value="Traditional">Traditional</option>
								      <option value="Other">Other</option>
								       
                                    </select>
									</div>
								    <div class="mb-3">
                                     <label for="setting-input-2" class="form-label">Local Government Area</label>
                                    <select name="lga" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option value="">- Select LGA -</option>
								     <?php
         									  foreach($lgas as $lga){
          									   echo "<option value='".$lga->lga_id."'>".$lga->lga_name."</option>";
           										}
          											 ?>
                                    </select>
									</div>
                                    
                                     <div class="mb-3">
                                     <label for="setting-input-2" class="form-label">Blood Group</label>
                                    <select name="bloodgrp" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option value="">- Select Blood Group -</option>
								     <?php
         									  foreach($bloodgroups as $bloodgroup){
          									   echo "<option value='".$bloodgroup->bloodgroup."'>".$bloodgroup->bloodgroup."</option>";
           										}
          											 ?>
                                    </select>
									</div>
                                    
                                    
                                    <div class="mb-3">
                                     <label for="setting-input-2" class="form-label">Select Genotype</label>
                                    <select name="genotype" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option value="">- Select Genotype -</option>
								     <?php
         									  foreach($genotypes as $genotype){
          									   echo "<option value='".$genotype->genotype."'>".$genotype->genotype."</option>";
           										}
          											 ?>
                                    </select>
									</div>
                                    
                                    <div class="mb-3">
                                     <label for="setting-input-2" class="form-label">Physically Challenged?</label>
                                    <select name="phy_chal" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option value="">- Select -</option>
								    <option value="NO">NO</option>
                                    <option value="YES">YES</option>
                                    </select>
									</div>
                                    
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Next of Kin Name</label>
									    <input type="text" name="nok" class="form-control" id="setting-input-2" placeholder="Enter Next of Kin Name" required autocomplete="off">
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Next of Kin Address</label>
									    <input type="text" name="nok_address" class="form-control" id="setting-input-3" placeholder="Enter Next of Kin Address" required autocomplete="off">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Next of Kin GSM</label>
									    <input type="number" name="nok_tel" class="form-control" id="setting-input-2" placeholder="Enter Next of Kin GSM" required autocomplete="off">
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Upload Passport</label>
									    <input type="file"  name="file" class="form-control" id="setting-input-3" placeholder="Upload Passport" required >
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Solve the Maths: <?php $min_number = 1;
	$max_number = 35;

	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
			echo $random_number1 . ' + ' . $random_number2 . ' = ';
		?></label>
									    <input type="text" class="form-control" id="setting-input-2" name="captchaResult"  placeholder = "<?php echo $random_number1 . ' + ' . $random_number2 . ' = ';
		?>" required="required" autocomplete="off">
        
        
        <input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
		<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" required>
									</div>
                                    
								    
								   
								   
									<button type="submit"  onclick = "alert('Your Biodata will be sent for processing...')"  class="btn app-btn-primary btn-block theme-btn mx-auto">Create Account</button>
							    
							    </form>
						    </div><!--//app-card-body--><br><?=   view('footer'); ?>
						    
						</div><!--//app-card-->
	                </div> 
	    
    </div><!--//row-->
    
    </div>
    
     

</body>
</html>