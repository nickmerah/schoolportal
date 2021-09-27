
                
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
				    
				    <a class="flex-sm-fill text-sm-center nav-link active"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="true">Register Courses</a>
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
											  <th class="cell">School:</th>
											  <th colspan="2" class="cell"><?= $school; ?></th>
											  <th class="cell">Level:</th>
											  <th class="cell"><?= $dlevel; ?></th>
										  </tr>
                                            
											<tr>
												<th colspan="6" class="cell"><strong>FIRST SEMESTER</strong></th>
											</tr>
                                            
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                                <th class="cell">Check <input type="checkbox" name="checkall" onclick="checkUncheckAll(this);"/></th>
											</tr>
										</thead>
										<tbody>
								<?php 
								print_r($fcourse_details);
								
								if (empty($checkcreg)) {
									$app = 0;
									$cp = ' <button type="submit" class="btn app-btn-primary" >PREVIEW SELECTED COURSES </button>';
									
								}else{
									$app = 1;
									$cp = ' <b style="font-size:12px; color:#C00"> COURSES ALREADY REGISTERED </b>';
								}
								
								
								foreach($fcoursedetails as $fcoursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $i = $i+1; ?></td>
												<td class="cell"> <?= $fcoursedetail->thecourse_title; ?> </td>
												<td class="cell"><?= $fcoursedetail->thecourse_code; ?></td>
												<td class="cell"> <?= $fcoursedetail->thecourse_unit; $fcunit += $fcoursedetail->thecourse_unit; ?> </td>
												<td class="cell"> <?= $fcoursedetail->semester; ?> </td>
                                               
                                              
                                                <td class="cell">  <?php if ($app == 1) { }else { ?> <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $fcoursedetail->thecourse_id; ?>" id="RememberPassword">
								
                                        </div><?php } ?></td>
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="3" class="cell"><?= $fcunit; ?></td>
											</tr>
		
										</tbody>
									</table>
                                <br />
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="6" class="cell"><strong>SECOND SEMESTER</strong></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                                <th class="cell">Check</th>
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
                                                  
                                                   
                                                    <td class="cell">  <?php if ($app == 1) { }else { ?> <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $scoursedetail->thecourse_id; ?>" id="RememberPassword">
									    </div><?php } ?></td>
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="3" class="cell"><?= $scunit; ?></td>
											</tr>
		
										</tbody>
									</table>
                                    
                                    <?php if (isset($tcoursedetails)) { ?>
                                     <br />
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="6" class="cell"><strong>THIRD SEMESTER</strong></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Title</th>
												<th class="cell">Code</th>
												<th class="cell">Unit</th>
												<th class="cell">Semester</th>
                                                <th class="cell">Check</th>
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
                                                  
                                                   
                                                    <td class="cell">  <?php if ($app == 1) { }else { ?> <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $tcoursedetail->thecourse_id; ?>" id="RememberPassword">
									    </div><?php } ?></td>
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="3" class="cell"><?= $tcunit; ?></td>
											</tr>
		
										</tbody>
									</table>
                                    
                                    <?php } ?>
                                    
                                    
                                    
                                    
                                     <div class="app-card-footer p-4 mt-auto">
							    <?php if (empty($fpay)) { echo ' <b style="font-size:12px; color:#C00">Pay your Fees before Course Registration</b>';}else{
                              echo $cp;  }?>
						    </div>
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
        
         
	    
	