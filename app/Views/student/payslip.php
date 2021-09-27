
                
                
			<?php if($transdetails){  ?>
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Pay Fees</h1>
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
										    <div class="item-label"><strong>Registration Number</strong></div>
									        <div class="item-data"><?= $transdetails[0]->appno; ?></strong></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>FullNames</strong></div>
									        <div class="item-data"><?= $transdetails[0]->fullnames; ?></strong></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
							     <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   <div class="item-label"><strong>School </strong></div>
									        <div class="item-data"><?= $transdetails[0]->faculties_name; ?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Programme</strong></div>
									       <div class="item-data"><?= $transdetails[0]->programme_name; ?></div>
									    </div><!--//col-->
									   
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Level</strong></div>
									         <div class="item-data"><?= $transdetails[0]->level_name; $rrr = $transdetails[0]->rrr;?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
					
							     
                                
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   <div class="item-label"><strong>Current Session</strong></div>
									        <div class="item-data"><?= $transdetails[0]->trans_year; ?>/<?= $transdetails[0]->trans_year+1; ?> </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    
							    
							    <br />
							    
							    
							    
							    <table width="100%" align="justify"  style="font-size:13px">
   
    <tr>
      <td align="left">  <p><u><strong>Next Step:</strong></u> </p>
        <p>You can make payment via any of the following channels:</p>
        <ul style="padding-left:30px;">
        
        <?php if( $transdetails[0]->trans_name == "Hostel Accommodation" ) {
        }else{?>
          <li style="padding-bottom:5px;"><strong>Cash Deposit at the bank</strong>: <br>
           You can make payment at: <strong>Any  Bank Branch Nationwide</strong>: 
          <br>
          Cash Payment at the bank through<strong> Remita</strong>
            <br>
            Present your payment slip to a teller at any of the above bank's branch and request to pay using <strong>Remita</strong>. <br>
              The teller login to<strong> Remita </strong>and  enters your RRR, proceeds with the transaction and prints out a payment receipt for you.
           <br>To pay at the Bank,<a href="<?= base_url("student/pay_slip/$rrr");?>" class="btn btn-link" target="_blank">Please Click Here</a> </p> 
          </li>
         
		 <?php } ?>
          <li><strong>Online Payment</strong>: <br>
<?php 
		     define("MERCHANTID", "5155065960");
			 define("APIKEY", "168405");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			$new_hash_string = MERCHANTID . $rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$responseurl =   base_url("student/remitaresponse/$rrr");  
			  echo '<form action="'.GATEWAYRRRPAYMENTURL.'" method="POST">
			  <input id="merchantId" name="merchantId" value="'.MERCHANTID.'" type="hidden"/>
<input id="rrr" name="rrr" value="'.$rrr.'" type="hidden"/>
<input id="responseurl" name="responseurl" value="'.$responseurl.'" type="hidden"/>
<input id="hash" name="hash" value="'.$new_hash.'" type="hidden"/>
<input id="paymenttype" name="paymenttype" value="Interswitch" type="hidden"/>
<p>To pay with your ATM Card,<input type="submit" class="btn btn-link" name="submit" value="Please Click Here" /></p></form>';
			  ?></li>
        </ul>
        
     </td>
    </tr>
     
     
  </table> 
                                 
						    </div><!--//app-card-body--><?php } ?>
						   
						   
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
							        <div class="col-auto"> 
								        <h4 class="app-card-title">Fee Details</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
                            
                           
						    <div class="app-card-body px-4 w-100">
							    
                                
                                
                                <?php foreach($transdetails as $transdetail): ?> 
                                
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										   
									        <div class="item-data"><?=$i=$i+1;?>.  <?= $transdetail->trans_name; ?></div>
									    </div><!--//col-->
									    <div class="col text-right">
										   &#8358;<?= number_format($transdetail->trans_amount); $tot += $transdetail->trans_amount;?>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                
							    <!--//app-card-body--> <?php endforeach; ?>
                                
                                <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Processing Fee </strong></div>
									       
									    </div><!--//col-->
									    <div class="col text-right">
										<strong>  &#8358;<?= $pfee = 325 ;?></strong>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                
                                 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Total </strong></div>
									       
									    </div><!--//col-->
									    <div class="col text-right">
										<strong>  &#8358;<?= number_format( $tot + $pfee);?></strong>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						     <div class="app-card-footer p-4 mt-auto">
							 
                               <button class="btn app-btn-primary" >RRR: <?=  $rrr; ?></button>
						    </div>
						</div><!--//app-card--> 
	                </div><!--//col-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	