<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}
//-->
</script>
                
       
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Payment History</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                
                    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                            <form action="requeryrrr" method="post">
							  
								
								<div class="table-responsive">
                              
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
											  <th class="cell">S/N</th>
											  <th class="cell">RRR</th>
											  <th class="cell">Session</th>
                                              <th class="cell">Amount</th>
											  <th class="cell">Fee Type</th>
											  <th class="cell">Date Paid</th>
									      </tr>
                                            
                                  
										</thead>
										<tbody>
		  <?php  foreach($transdetails as $transdetail):  ?>    
           <tr>
												<td class="cell"><?= $k = $k+1; ?></td>
												<td class="cell"> <a href="JavaScript:;" onClick="MM_openBrWindow('preceipt/<?= $transdetail->rrr; ?>','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong><?= $transdetail->rrr; ?></strong>
</a>  </td>
												<td class="cell"><?= $transdetail->trans_year; ?>/<?= $transdetail->trans_year+1; ?></td>
                                                <td class="cell">&#8358;<?= number_format($transdetail->amt); ?></td>
												<td class="cell"><?= $transdetail->fee_type; ?></td>
                                                <td class="cell"><?= date('d-M-Y h:i:s', strtotime($transdetail->trans_date)); ?></td>
                                                </tr>
                                           <?php endforeach; ?>  
                                           
                                            <tr>
												<td colspan="6" class="cell"><i><small>* Click on RRR to print Receipt | fees - School Fees | ofees - Other Fees</small></i></td>
												</tr>  
												
												
												  <tr>
												<td colspan="6" class="cell">
												    
												    <button type="submit" class="btn app-btn-primary">CHECK  PAYMENT STATUS</button></td>
												</tr> 
										</tbody>
									</table> 
                                   
                                    
    </div>
                                
                           
                                
                                <!--//table-responsive--></form>
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
						
			        </div><!--//tab-pane-->
			        
			       
			        
			        <!--//tab-pane-->
			        <!--//tab-pane-->
                    
                      <!--//tab-pane-->
				</div><!--//tab-content-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	