
                
       
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Hostel</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				      <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Hostel Allocation</a>
				    
                        </nav>
                    <div class="tab-content" id="orders-table-tab-content">
			        <!--//tab-pane-->
			        
			        <div>
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <form action="pcourse" method="post">
							    <div class="table-responsive">
                               
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
											  <th width="57" class="cell">School:</th>
											  <th colspan="2" class="cell"><?= $school; ?></th>
											  <th class="cell">Level:</th>
											  <th colspan="2" class="cell"><?= $dlevel; ?></th>
										  </tr>
                                         <?php 
								foreach($hostelpay as $hostel_pay): ?> 
                                          <tr>
											  <th class="cell">Amount:</th>
											  <th colspan="2" class="cell"><span class="badge bg-warning">&#8358;<?= number_format($hostel_pay->trans_amount); ?></span></th>
											  <th class="cell">Status:</th>
											  <th colspan="2" class="cell"><span class="badge bg-success">
											    <?= $hostel_pay->pay_status; ?>
											  </span></th>
										  </tr>
                                         <?php endforeach; ?>	   
											 
                                            
                                            <tr>
                                              <th colspan="5" class="cell">&nbsp;</th>
                                            </tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th width="88" class="cell">Hostel Name</th>
												<th width="110" class="cell">No of Rooms</th>
                                                <th width="135" class="cell">No of Bedspaces</th>         
                                                
												<th width="43" class="cell">Action</th>
                                                </tr>
										</thead>
										<tbody>
								
                                    	 <?php 
								foreach($hosteldetails as $hosteldetail): ?> 	<tr>
												<td class="cell"><?= $i = $i+1; ?></td>
												<td class="cell"> <?= $hosteldetail->hostelname; ?> </td>
												<td class="cell"><?= $hosteldetail->totroom; ?></td>
												<td class="cell"> <?= $hosteldetail->totspace; ?> </td>
											 
                                               
                                                <td class="cell">
                                                <?php if (empty($hostelpay) or !empty($myhostel)) { 
												 echo ' <b style="font-size:12px; color:#C00">N/A</b>';
												}else{ ?>
                                                 <a class="btn-sm app-btn-secondary" href="rview/<?= $hosteldetail->hid; ?>">View</a>
                                                 
                                                 <?php } ?>
                                                  </td>
                                               
                                               
                                              
                                                </tr>
										 <?php endforeach; ?>	   
		
										</tbody>
									</table>
                              
                                     
					          </div></form>
                                
                                <!--//table-responsive-->
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
        
         
	    
	