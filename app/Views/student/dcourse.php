
                
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
				     <a class="flex-sm-fill text-sm-center nav-link active" id="orders-pending-tab" data-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="true">Drop Registered Courses</a>
				     
                        </nav>
                    <div class="tab-content" id="orders-table-tab-content">
			        <!--//tab-pane-->
			        
			        <!--//tab-pane-->
			        
			        <div>
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
                            <?php if 
                            
                            
                            
                            (empty($fcourse_details) and 
                            empty($scourse_details) and  
                            empty($tcoursedetails)) 
                            { echo  '<br> <p style="font-size:12px; color:#C00"> <b>&nbsp;&nbsp;&nbsp;NO COURSES HAD BEEN REGISTERED, SELECT &Prime;Register Courses&Prime; TO BEGIN</b> </p><br>'; }else {?>
								
							    <div class="table-responsive">
							        <form action="rcourse" method="post">
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
										</thead>
										<tbody>
								<?php foreach($fcourse_details as $f_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $q = $q+1; ?></td>
												<td class="cell"> <?= $f_coursedetail->c_title; ?> </td>
												<td class="cell"><?= $f_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $f_coursedetail->c_unit; $f_cunit += $f_coursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $f_coursedetail->csemester; ?> </td>
                                             <td class="cell">  <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $f_coursedetail->thecourse_id; ?>" id="RememberPassword">
									    </div></td>
									       
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
                                                <td class="cell">&nbsp;</td>
												
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $f_cunit; ?></td>
                                                <td class="cell">&nbsp;</td>
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
                                                <th class="cell">Check </th>
										
											</tr>
										</thead>
										<tbody>
								<?php foreach($scourse_details as $s_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $t = $t+1; ?></td>
												<td class="cell"> <?= $s_coursedetail->c_title; ?> </td>
												<td class="cell"><?= $s_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $s_coursedetail->c_unit; $s_cunit += $s_coursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $s_coursedetail->csemester; ?> </td>
                                                <td class="cell">  <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $s_coursedetail->thecourse_id; ?>" id="RememberPassword">
									    </div></td></tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $s_cunit; ?></td>
                                                <td class="cell">&nbsp;</td>
											</tr>
		
										</tbody>
									</table>  <br />
                                    	<?php if ($tcoursedetails) { ?>
                                    
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
                                                <th class="cell">Check </th>
										
											</tr>
										</thead>
										<tbody>
								<?php foreach($tcoursedetails as $tcoursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $t = $t+1; ?></td>
												<td class="cell"> <?= $tcoursedetail->c_title; ?> </td>
												<td class="cell"><?= $tcoursedetail->c_code; ?></td>
												<td class="cell"> <?= $tcoursedetail->c_unit; $t_cunit += $tcoursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $tcoursedetail->csemester; ?> </td>
                                                <td class="cell">  <div class="col text-left">
										  <input class="form-check-input" name = "sel_course[]" type="checkbox" value="<?= $tcoursedetail->thecourse_id; ?>" id="RememberPassword">
									    </div></td></tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $t_cunit; ?></td>
                                                <td class="cell">&nbsp;</td>
											</tr>
		
										</tbody>
									</table>	<?php } ?>	<div class="app-card-footer p-4 mt-auto">
							 
                               <button type="submit" class="btn app-btn-primary" >DROP SELECTED COURSES</button>
						    </div>
						        </div> <?php } ?>
                                
                                <!--//table-responsive--></form>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        <!--//tab-pane-->
                    
                      <!--//tab-pane-->
				</div><!--//tab-content-->
	                
	                
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	