
                
       
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Hostel</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link  active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">My Hostel</a>
				   
                        </nav>
                    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                            <form action="printhostel" method="post">
							  
								
								<div class="table-responsive">
                              
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
											  <th class="cell">School:</th>
											  <th colspan="3" class="cell"><?= $school; ?></th>
											  <th class="cell">Level:</th>
											  <th class="cell"><?= $dlevel; ?></th>
										  </tr>
                                             <?php 
								foreach($hostelpay as $hostel_pay): ?> 
                                          <tr>
											  <th class="cell">Amount:</th>
											  <th colspan="3" class="cell"><span class="badge bg-warning">&#8358;<?= number_format($hostel_pay->trans_amount); ?></span></th>
											  <th class="cell">Status:</th>
											  <th class="cell"><span class="badge bg-success"><?= $hostel_pay->pay_status; ?></span></th>
										  </tr>
                                         <?php endforeach; ?>	  
											<tr>
												<th colspan="6" class="cell">HOSTEL DETAILS</th>
											</tr>
                                            
                                            <tr>
												<th colspan="2" class="cell">&nbsp;</th>
												<th class="cell">Name</th>
												<th class="cell">Block</th>
												<th class="cell">Room No</th>
												<th class="cell">BedSpace No</th>
                                                
										</thead>
										<tbody>
							
                                    		<tr>
												<td colspan="2" class="cell">&nbsp; </td>
												<td class="cell"><?= $myhostel; ?></td>
													<td class="cell"><?= $myblock; ?></td>
												<td class="cell"><?= $myroom; ?></td>
												<td class="cell"><?= $mybedspace; ?></td>
                                               
											</tr>
		
										</tbody>
									</table>
                                    <?php if (empty($myhostel) ) {
									echo ' <b style="font-size:12px; color:#C00">  &nbsp;&nbsp;No Hostel have been allocated, Click on Hostel Allocation to begin</b>';	
									}else{ ?>
                                    
                                    <div class="app-card-footer p-4 mt-auto">
							 
                               <button type="submit" class="btn app-btn-primary" >PRINT HOSTEL ALLOCATION</button>
						    </div>
                                   
                    <?php } ?>                
                </div>
                                
                           
                                
                                <!--//table-responsive--></form>
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
						
			        </div><!--//tab-pane-->
			        
			        <!--//tab-pane-->
			        
			        <!--//tab-pane-->
			        <!--//tab-pane-->
                    
                      <!--//tab-pane-->
				</div><!--//tab-content-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	