
                
                
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
							 
                                <script src="https://checkout.flutterwave.com/v3.js"></script>
                
               
              
             <button type="submit"   class="btn btn-block btn-primary btn-animated" name="btn-login" id="btn-login" onClick="makePayment()">
    		<i class='fa fa-sign-in'></i> PAY NOW ONLINE with your ATM Card
		  </button>
          
          
           </form>
           
            <script>
                  function makePayment() {
                    FlutterwaveCheckout({
  
     public_key: "FLWPUBK-1912352b46740870c9b2f443c75c0c05-X",  // conamkat 
      tx_ref: "<?= $transdetail->rrr ; ?>",  //txn created by you
      amount: <?= $transdetail->trans_amount + $pfee; ?>,    //amt to be paid  
      currency: "NGN",   //cureency accepting
      payment_options: "both",   
      customer: {
        email: "epayment@conamkat.edu.ng",   //cus email
        phonenumber: "08025878747",  //cus phone number
        name: "<?= $transdetail->fullnames; ?>",
      },
        subaccounts: [
              {
                id: "RS_226B9FDE70757783CDDF92665D3250E0",
		           
                transaction_charge_type: "flat_subaccount",
                transaction_charge: 250.45
              }
            ],
			
			onclose: function(response) {
				alert('You have cancelled this Transaction, Please Try Again!!');
        window.location.href="<?= base_url('student/hfee');?>";
			
			},
          callback: function (data) {  
        
         var flw_ref = data.flw_ref;  
         var status = data.status;  
         var tx_ref = data.tx_ref;  
         var transaction_id = data.transaction_id;  
      
       var page_link = "<?= base_url('student/fpaystatus');?>";   
       //console.log(data);
       if(status == "successful"){
         //verifying your payment
         window.location.href=page_link+'?flw_ref='+flw_ref+'&transaction_id='+transaction_id+'&tx_ref='+tx_ref;

       }else{
        alert('There Was An Error, Transaction Was Not Successful, Please Try Again!!');
        window.location.href="<?= base_url('student/hfee');?>";
      }

    },
    customizations: {
      title: "CONAMKAT Hostel Fee Payment",
      description: "Powered By CONAMKAT",
      
    },
  });
                  }
                </script>
						    </div>
						</div><!--//app-card--> 
	                </div><!--//col-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	