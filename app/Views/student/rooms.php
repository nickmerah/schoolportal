
                
       
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Hostel</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                 
                    <div class="tab-content" id="orders-table-tab-content">
			        <!--//tab-pane-->
			        
			      
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <form action="pcourse" method="post">
							    <div class="table-responsive">
                               
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
											  <th width="57" class="cell">School:</th>
											  <th colspan="3" class="cell"><?= $school; ?></th>
											  <th class="cell">Level:</th>
											  <th colspan="2" class="cell"><?= $dlevel; ?></th>
										  </tr>
                                         <?php 
								foreach($hostelpay as $hostel_pay): ?> 
                                          <tr>
											  <th class="cell">Amount:</th>
											  <th colspan="3" class="cell"><span class="badge bg-warning">&#8358;<?= number_format($hostel_pay->trans_amount); ?></span></th>
											  <th class="cell">Status:</th>
											  <th colspan="2" class="cell"><span class="badge bg-success">
											    <?= $hostel_pay->pay_status; ?>
											  </span></th>
										  </tr>
                                         <?php endforeach; ?>	   
											 
                                            
                                            <tr>
                                              <th colspan="8" class="cell"><div align="right"><i>*BS - BedSpace</i></div></th>
                                            </tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th width="88" class="cell">Hostel Name</th>
												<th width="110" class="cell">Rooms No</th>
                                                <th width="135" class="cell">No of BS</th>         
                                                <th width="143" class="cell">Alloted BS</th>
                                                <th width="143" class="cell">Available BS</th>
												<th width="43" class="cell">Action</th>
                                                </tr>
										</thead>
										<tbody>
								
                                    	 <?php 
								foreach($roomdetails as $roomdetail): ?> 	<tr>
												<td class="cell"><?= $i = $i+1; ?></td>
												<td class="cell"> <?= $roomdetail['hostelname']; ?> </td>
												<td class="cell"><?= $roomdetail['roomno']; ?></td>
												<td class="cell"> <?= $roomdetail['no_space']; ?> </td>
												<td class="cell"> <?=  $roomdetail['allot_bedspace'] ; ?> </td>
                                               <td class="cell"> <?= $availablebed = $roomdetail['no_space'] - $roomdetail['allot_bedspace'] ; ?></td>
                                                <td class="cell"> 
                                                 
                                                <?php if ($availablebed > 0) { ?>
                                              <span class="badge bg-success">  <a class="btn-sm app-btn-secondary" href="../allocateroom/<?= $roomdetail['hid']; ?>/<?= $roomdetail['roomid']; ?>/<?= $roomdetail['no_space']; ?>/<?= $cs_session; ?>">Allocate</a> </span>
                                                
                                                <?php } else { ?>
                                              <span class="badge bg-danger"> Allocated </span>
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
	                
	                
               
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	