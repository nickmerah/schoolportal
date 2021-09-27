
                
      <script language="JavaScript" type="text/JavaScript">
<!--
function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'sel_course'  && theForm[z].name != 'checkall'){
	  theForm[z].checked = theElement.checked;
	  }
     }
    }
 
	
//-->
</script>          
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Courses</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				   <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">History</a>
					
                        </nav>
                    <div class="tab-content" id="orders-table-tab-content">
			        <!--//tab-pane-->
			        
			        <!--//tab-pane-->
			        
			        <!--//tab-pane-->
			        <!--//tab-pane-->
                    
                      <div>
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">S/N</th>
											
												<th class="cell">Session</th>
                                                <th class="cell">Level</th>
												<th class="cell">Date Registered</th>
												<th class="cell">Action</th>
												 
											</tr>
										</thead>
										<tbody>
										<?php foreach($course_history as $coursehistory): ?>	
											<tr>
												<td class="cell"><?= $y = $y+1; ?></td>
											
												<td class="cell"><?= $coursehistory->cyearsession; ?></td>
                                                <td class="cell"><?= $coursehistory->level_name; ?></td>
												<td class="cell"><?= date('d-M-Y', strtotime($coursehistory->cdate_reg)); ?></td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="<?= base_url("student/vcourse/$coursehistory->cyearsession"); ?>" target="_blank">View</a></td>
											</tr>
                                            
                                            <?php endforeach ;?>
											
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	