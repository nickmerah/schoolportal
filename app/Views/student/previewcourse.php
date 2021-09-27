
                
      <script language="JavaScript" type="text/JavaScript">
<!--
function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'sel_fcourse'   && theForm[z].name != 'checkall'){
	  theForm[z].checked = theElement.checked;
	  }
     }
    }
 
	
//-->
</script>          
			
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Preview Selected Courses</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                
                    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                            <form action="savecourse" method="post">
							    <div class="table-responsive">
                               
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
											  <th class="cell">School:</th>
											  <th colspan="2" class="cell"><?= $school; ?></th>
											  <th class="cell">Level:</th>
											  <th class="cell"><?= $dlevel; ?></th>
										  </tr>
                                            
											<tr>
												<th colspan="5" class="cell"><strong>FIRST SEMESTER</strong></th>
											</tr>
                                            
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                                
										</thead>
										<tbody>
								<?php foreach($fcoursedetails as $fcoursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $i = $i+1; ?></td>
												<td class="cell"> <?= $fcoursedetail->thecourse_title; ?> </td>
												<td class="cell"><?= $fcoursedetail->thecourse_code; ?></td>
												<td class="cell"> <?= $fcoursedetail->thecourse_unit; $fcunit += $fcoursedetail->thecourse_unit; ?> </td>
												<td class="cell"> <?= $fcoursedetail->semester; ?> </td>
                                              <input   name = "sel_course[]" type="hidden" value="<?= $fcoursedetail->thecourse_id; ?>">
									       
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td colspan="3" class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $fcunit; ?></td>
											</tr>
		
										</tbody>
									</table>
                                    <br />
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="5" class="cell"><strong>SECOND SEMESTER</strong></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                               
											</tr>
										</thead>
										<tbody>
								<?php foreach($scoursedetails as $scoursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $j = $j+1; ?></td>
												<td class="cell"> <?= $scoursedetail->thecourse_title; ?> </td>
												<td class="cell"><?= $scoursedetail->thecourse_code; ?></td>
												<td class="cell"> <?= $scoursedetail->thecourse_unit; $scunit += $scoursedetail->thecourse_unit; ?> </td>
												<td class="cell"> <?= $scoursedetail->semester; ?> </td>
                                                <input   name = "sel_course[]" type="hidden" value="<?= $scoursedetail->thecourse_id; ?>">  
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td colspan="3" class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $scunit; ?></td>
											</tr>
		
										</tbody>
									</table> 
									
									
									
									  <br />
									  
									  <?php if ($tcoursedetails) { ?>
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="5" class="cell"><strong>THIRD SEMESTER</strong></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                               
											</tr>
										</thead>
										<tbody>
								<?php foreach($tcoursedetails as $tcoursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $k = $k+1; ?></td>
												<td class="cell"> <?= $tcoursedetail->thecourse_title; ?> </td>
												<td class="cell"><?= $tcoursedetail->thecourse_code; ?></td>
												<td class="cell"> <?= $tcoursedetail->thecourse_unit; $tcunit += $tcoursedetail->thecourse_unit; ?> </td>
												<td class="cell"> <?= $tcoursedetail->semester; ?> </td>
                                                <input   name = "sel_course[]" type="hidden" value="<?= $tcoursedetail->thecourse_id; ?>">  
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td colspan="3" class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $tcunit; ?></td>
											</tr>
		
										</tbody>
									</table> 
									<?php } ?>
								 
							
									<div class="app-card-footer p-4 mt-auto">
							 
                               <button type="submit" class="btn app-btn-primary" >REGISTER SELECTED COURSES</button>
						    </div>
						        </div><!--//table-responsive--></form>
						       
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
        
         
	    
	