
                
                
			<?php foreach($stddetails as $stddetail): ?> 
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">My Account</h1>
                <form action="updatebio" method="post" enctype="multipart/form-data">
                <div class="row gy-4">
	                <div class="col-12 col-lg-12">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Profile</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label mb-2"><strong>Photo</strong></div>
										    <div class="item-data"><img class="profile-image" src="<?= base_url("public/uploads/$stddetail->std_photo" );?>" alt=""></div>
									    </div><!--//col-->
									  
								    </div><!--//row-->
							    </div><!--//item-->
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Registration Number</strong></div>
									        <div class="item-data">
												<?= $stddetail->matric_no; ?>
											</strong></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>FullNames</strong></div>
									        <div class="item-data"><?= $stddetail->surname; ?></strong>, <?= $stddetail->firstname; ?> <?= $stddetail->othernames; ?>
                                            
                                            
                                            </div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							    
		
                              
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>GSM </strong></div>
									        <div class="item-data">
                                            <input id="signin-email" name="gsm" type="text" class="form-control signin-email" value="<?= $stddetail->student_mobiletel; ?>"  required="required">
											
                                            </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Contact Address </strong></div>
									        <div class="item-data">
                                            
                                           <input name="cadd" type="text" class="form-control signin-email" id="signin-email" value="<?= $stddetail->contact_address; ?>" size="100"  required="required">
											 
                                            </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"> <strong>Home Address</strong></div>
									        <div class="item-data">
                                            
                                            <input name="hadd" type="text" class="form-control signin-email" id="signin-email" value="<?= $stddetail->student_homeaddress; ?>" size="100"  required="required">
											
                                            </div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Blood Group </strong></div>
									        <div class="item-data">
                                            <select name="bloodgrp" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option><?= $stddetail->std_bloodgrp; ?></option>
                                         <option>A+</option>
                                           <option>A-</option>
                                             <option>B+</option>
                                               <option>B-</option>
                                                 <option>AB+</option>
                                                   <option>AB-</option>
                                                     <option>O+</option>
                                                       <option>O-</option>
								     
                                    </select>
                                            
                                            </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Genotype </strong></div>
									        <div class="item-data">
                                            
                                              <select name="genotype" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option>AA</option>
                                        <option>AS</option>
                                         <option>AC</option>
                                          <option>SS</option>
                                           <option>SC</option>
                                              <option>CC</option>
								     
                                    </select>
                                            </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"> <strong>Physically Challenged?</strong></div>
									        <div class="item-data">
                                            
                                             <select name="phy_chal" class="form-control signup-password" id="inputSelect3" required >
									   
									   <option><?= $stddetail->std_pc; ?></option>
								    <option >YES</option>
                                     <option>NO</option>
                                   
                                    </select>
                                            </div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
                                
                               
                                
                                 
						    </div><!--//app-card-body-->
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <!--//col-->
	                
	                
                    
                      <button type="submit" class="btn app-btn-primary" >UPDATE BIODATA</button>
                </div><!--//row--> </form>
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
        <?php endforeach; ?>
	    
	