
                
                
			<?php 
			
			 foreach($transdetails as $transdetail){
				 $totalamt += $transdetail->trans_amount;
			 }
			
			
			if($transdetails){  ?>
            
            
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div id="printableArea">
			    
                <div class="row gy-4">
	                <div class="col-12 col-lg-12">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
                              
                                <div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:20px"> KATSINA STATE COLLEGE OF NURSING AND MIDWIFERY</strong> <br> 
  </h3>
        <br>    
            
        <strong style="font-size:18px"> <u>Bank Payment Slip</u>  </strong> 
</div>
                                
                               
					
							     
                                
                                
                                <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th colspan="4" class="cell">Payment Details</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td width="105" class="cell"><strong>Registration No:</strong> </td>
												<td width="220" class="cell"><?= $transdetails[0]->appno; ?></td>
												<td colspan="2" rowspan="3" class="cell"> <img src="<?= base_url("public/uploads/$stdphoto");?>" alt="Coheskat" width="102" height="103">  </td>
											</tr>
											<tr>
												<td class="cell"><strong>Fullnames:</strong></td>
												<td class="cell"><?= $transdetails[0]->fullnames; ?></td>
											</tr>
											<tr>
												<td class="cell"><strong>Programme:</strong></td>
												<td class="cell"> <?= $transdetails[0]->programme_name; ?></td>
											</tr>
											
											<tr>
												<td class="cell"><strong>School:</strong></td>
												<td colspan="3" class="cell"> <?= $transdetails[0]->faculties_name; ?></td>
											</tr>
											
											<tr>
											  <td class="cell"><strong>Amount:</strong></td>
											  <td class="cell">&#8358;<?=  number_format($totalamt) ?></td>
											  <td width="103" class="cell"><strong>Processing Fee:</strong></td>
											  <td width="53" class="cell"> &#8358;<?=  $processfee = 325; ?> </td>
										  </tr>
											<tr>
												<td class="cell"><strong>Total:</strong></td>
												<td class="cell">&#8358;<?=  number_format($totalamt+$processfee) ?></td>
												<td class="cell"><strong>Session:</strong></td>
												<td class="cell"><?= $transdetails[0]->trans_year; ?> / <?= $transdetails[0]->trans_year+1; ?> </td>
											</tr>
											
											<tr>
											  <td class="cell"><strong>Date:</strong></td>
											  <td class="cell"> <?=   date( 'd-M-Y h:i:s', strtotime($transdetails[0]->trans_date));?></td>
											  <td class="cell"><strong>Level:</strong></td>
											  <td class="cell"><?= $transdetails[0]->level_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>RRR:</strong></td>
											  <td class="cell"><?= $transdetails[0]->rrr; ?></td>
											  <td class="cell"><strong>Status:</strong></td>
											  <td class="cell"><span class="badge bg-warning"><?= $transdetails[0]->pay_status; ?></span></td>
										  </tr>
                                          
                                          <tr>
											  <td colspan="4" class="cell"> <strong>Cash Payment at the bank</strong>: <br>
											    You can make payment at: <strong>Any  Bank Branch Nationwide</strong>: 
											    <br>
											    Cash Payment at the bank is through<strong> Remita</strong>
											    <br>
											    Present your payment slip to a teller at any of the above bank's branch and request to pay using <strong>Remita</strong>. <br>
											    The teller login to<strong> Remita </strong>and  enters the RRR: 
											    <strong>
											    <?= $transdetails[0]->rrr; ?>
											    </strong>
											    on this Slip, proceeds with the transaction and prints out a payment receipt for you.
</p></td>
										  </tr>
		
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->	
                                 
						    </div><!--//app-card-body--><?php } ?>
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	               
	                
	                
                </div><!--//row-->
                
                </div> <input type= "button" onClick="printDiv('printableArea')"  value = "Print Payment Slip"  class='btn btn-primary'>
               <script type="application/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	