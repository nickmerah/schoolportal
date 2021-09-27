
                
                
			<?php foreach($stddetails as $stddetail): ?> 
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Pay Other Fees</h1>
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
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
								        <h4 class="app-card-title">Basic Information</h4>
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
									        <div class="item-data"><?= $stddetail->matric_no; ?></strong></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>FullNames</strong></div>
									        <div class="item-data"><?= $stddetail->surname; ?></strong>, <?= $stddetail->firstname; ?> <?= $stddetail->othernames; ?></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							     <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   <div class="item-label"><strong>School </strong></div>
									        <div class="item-data"><?= $stddetail->faculties_name; ?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Programme</strong></div>
									       <div class="item-data"><?= $stddetail->programme_name; ?></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Level</strong></div>
									         <div class="item-data"><?= $stddetail->level_name; ?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
					
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>State of Origin</strong></div>
									        <div class="item-data">
										      <?= $stddetail->state_name; ?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   <div class="item-label"><strong>Student Status</strong></div>
									        <div class="item-data"><?= strtoupper($stddetail->std_status); ?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   <div class="item-label"><strong>Current Session</strong></div>
									        <div class="item-data"><?= $cs_session; ?>/<?= $cs_session+1; ?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                 
						    </div><!--//app-card-body--><?php endforeach; ?>
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto"> <form action="payofee" method="post">
								        <h4 class="app-card-title">Other Fees Details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
                            
                           
						    <div class="app-card-body px-4 w-100">
							    
                                
                                
                                <?php foreach($feedetails as $feedetail): ?> 
                                
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   
									        <div class="item-data">  <input class="form-check-input" name = "selfee" type="radio" value="<?= $feedetail->of_id; ?>"  required > <?=$i=$i+1;?>. <?= $feedetail->ofield_name; ?></div>
									    </div><!--//col-->
									    <div class="col text-right">
										   &#8358;<?= number_format($feedetail->of_amount);  ?>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                
							    <!--//app-card-body--> <?php endforeach; ?>
                               
                               <?php if (empty($fpay)) { ?>
						    
                            
                            <?php }else{ ?>
						    <div class="app-card-footer p-4 mt-auto">
							 
                               <button type="submit" class="btn app-btn-primary" >PAY SELECTED FEE</button>
						    </div>
                              <?php }  ?>
						</div><!--//app-card--> </form>
	                </div><!--//col-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	