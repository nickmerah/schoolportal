
                
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
</script> <script language="JavaScript" type="text/JavaScript">
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
			    
			    <h1 class="app-page-title">Courses</h1>
                <div class="row gy-4">
          
	                <!--//col-->
	                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Registered Courses</a>
				    
                        </nav>
                    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                            <form action="printcourse" method="post">
							    <?php if (empty($fcourse_details or $scourse_details)) { echo  '<br> <p style="font-size:12px; color:#C00"> <b>&nbsp;&nbsp;&nbsp;NO COURSES HAD BEEN REGISTERED, SELECT &Prime;Register Courses&Prime; TO BEGIN</b> </p><br>'; }else {?>
								
								
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
								<?php 
								foreach($fcourse_details as $f_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $k = $k+1; ?></td>
												<td class="cell"> <?= $f_coursedetail->c_title; ?> </td>
												<td class="cell"><?= $f_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $f_coursedetail->c_unit; $f_cunit += $f_coursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $f_coursedetail->csemester; ?> </td>
                                               
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $f_cunit; ?></td>
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
								<?php foreach($scourse_details as $s_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $n = $n+1; ?></td>
												<td class="cell"> <?= $s_coursedetail->c_title; ?> </td>
												<td class="cell"><?= $s_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $s_coursedetail->c_unit; $s_cunit += $s_coursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $s_coursedetail->csemester; ?> </td>
                                                	</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $s_cunit; ?></td>
											</tr>
		
										</tbody>
									</table>
									
									<br />
									
									<?php if ($tcourse_details) { ?>
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
								<?php foreach($tcourse_details as $t_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $o = $o+1; ?></td>
												<td class="cell"> <?= $t_coursedetail->c_title; ?> </td>
												<td class="cell"><?= $t_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $t_coursedetail->c_unit; $t_cunit += $t_coursedetail->c_unit; ?> </td>
												<td class="cell"> <?= $t_coursedetail->csemester; ?> </td>
                                                	</tr>
								<?php endforeach; ?>			
											<tr>
												<td class="cell">&nbsp;</td>
												<td class="cell">&nbsp;</td>
												<td class="cell"><strong>TOTAL:</strong></td>
												<td colspan="2" class="cell"><?= $t_cunit; ?></td>
											</tr>
		
										</tbody>
									</table>
									<?php } ?>
									
									<div class="app-card-footer p-4 mt-auto">
							 
                               <button type="submit" class="btn app-btn-primary" >PRINT REGISTERED COURSES</button> |  <a href="JavaScript:;" onClick="MM_openBrWindow('<?php echo  base_url('student/printexam_card/'.$cs_session); ?>','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong>PRINT EXAMINATION CARD</strong>
</a>
						    </div>
						        </div>
                                
                                <?php }  ?>
                                
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
        
         
	    
	