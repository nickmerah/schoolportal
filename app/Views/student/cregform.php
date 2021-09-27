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
			    <div id="printableArea">
			    
                <div class="row gy-4">
	                <div class="col-12 col-lg-12">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
                              
                                <div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:20px"> COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
  </h3>
        <br>    
            
        <strong style="font-size:18px"> <u>STUDENT'S COURSE REGISTRATION FORM</u>  </strong> 
</div>
                                
                               
					
							     
                                
                                
                                <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left" style="font-size:14px">
										 
										<tbody>
											<tr>
												<td width="209" class="cell"><strong>Full Name:</strong> </td>
												<td colspan="3" class="cell"><?= $fullname; ?>  </td>
												<td width="196" rowspan="5" class="cell"> <img src="<?= base_url("public/uploads/$stdphoto");?>" alt="Coheskat" width="102" height="103">  </td>
											</tr>
											<tr>
												<td class="cell"><strong>Registration Number:</strong></td>
												<td colspan="3" class="cell"><?= $matno; ?> </td>
											</tr>
											<tr>
												<td class="cell"><strong>School:</strong></td>
												<td colspan="3" class="cell"> <?= $school; ?> </td>
											</tr>
											
											<tr>
											  <td class="cell"><strong>Department:</strong></td>
											  <td colspan="3" class="cell"><?= $dept; ?> </td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="3" class="cell"><?= $stdcourse; ?> </td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Session:</strong></td>
											  <td width="281" class="cell"><?= $cs_session; ?> / <?= $cs_session + 1;?></td>
											  <td width="111" class="cell"><strong>Level (Year):</strong></td>
											  <td colspan="2" class="cell"><?= $dlevel; ?></td>
										  </tr>
											
											 
											 
                                          
                                          <tr>
											  <td colspan="5" class="cell">
							  
								
								
								<div class="table-responsive">
                              
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											
											<tr>
												<th colspan="4" class="cell"><div align="center">FIRST SEMESTER</div></th>
											</tr>
                                            
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Course Code</th>
												<th class="cell">Course Title</th>
												<th class="cell">Credit Unit</th>
												 
                                                
										</thead>
										<tbody>
								<?php 
								foreach($fcourse_details as $f_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $k = $k+1; ?></td>
                                                <td class="cell"><?= $f_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $f_coursedetail->c_title; ?> </td>
												
												<td class="cell"> <?= $f_coursedetail->c_unit; $f_cunit += $f_coursedetail->c_unit; ?> </td>
											 
                                               
											</tr>
								<?php endforeach; ?>			
											<tr>
												<td colspan="3" align="right" class="cell"><strong>Total Credit Units:</strong></td>
												<td colspan="2" class="cell"><?= $f_cunit; ?></td>
											</tr>
		
										</tbody>
									</table>
                                    <br />
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="4" class="cell"><div align="center">SECOND SEMESTER</div></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Course Code</th>
												<th class="cell">Course Title</th>
												<th class="cell">Credit Unit</th>
                                               
											</tr>
										</thead>
										<tbody>
								<?php foreach($scourse_details as $s_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $n = $n+1; ?></td>
                                                <td class="cell"><?= $s_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $s_coursedetail->c_title; ?> </td>
												
												<td class="cell"> <?= $s_coursedetail->c_unit; $s_cunit += $s_coursedetail->c_unit; ?> </td>
												 
                                       	  </tr>
								<?php endforeach; ?>			
											<tr>
											  <td colspan="3" align="right" class="cell"><strong>Total Credit Units:</strong></td>
											  <td colspan="2" class="cell"><?= $s_cunit; ?></td>
										  </tr>
											 
		
										</tbody>
									</table>
									
									
									<br />
									
									<?php if ($tcourse_details) { ?>
                                    <table class="table app-table-hover mb-0 text-left">
										<thead>
											
                                            <tr>
												<th colspan="4" class="cell"><div align="center">THIRD SEMESTER</div></th>
											</tr>
                                            <tr>
												<th class="cell">S/N</th>
												<th class="cell">Course Code</th>
												<th class="cell">Course Title</th>
												<th class="cell">Credit Unit</th>
                                               
											</tr>
										</thead>
										<tbody>
								<?php foreach($tcourse_details as $t_coursedetail): ?>
                                    		<tr>
												<td class="cell"><?= $o = $o+1; ?></td>
                                                <td class="cell"><?= $t_coursedetail->c_code; ?></td>
												<td class="cell"> <?= $t_coursedetail->c_title; ?> </td>
												
												 <td class="cell"> <?= $t_coursedetail->c_unit; $t_cunit += $t_coursedetail->c_unit; ?> </td>
												 
                                       	  </tr>
								<?php endforeach; ?>			
											<tr>
											  <td colspan="3" align="right" class="cell"><strong>Total Credit Units:</strong></td>
											  <td colspan="2" class="cell"><?= $t_cunit; ?></td>
										  </tr>
										
		
										</tbody>
									</table>
									
									<?php } ?>	<tr>
												<td colspan="3" align="right" class="cell"><strong>Total Credit Units Registered:</strong></td>
												<td colspan="2" class="cell"><?= $f_cunit + $s_cunit + $t_cunit; ?></td>
											</tr>
						        </div>

                         
                                
                                <!--//table-responsive--></form></td>
										  </tr>
		 
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       <BR />
   <p> <a href="JavaScript:;" onClick="MM_openBrWindow('<?php echo  base_url('student/printcourses/'.$cs_session); ?>','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong>PRINT COURSE FORM</strong>
</a> |  <a href="JavaScript:;" onClick="MM_openBrWindow('<?php echo  base_url('student/printexam_card/'.$cs_session); ?>','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong>PRINT EXAMINATION CARD</strong>
</a></p>
						    </div><!--//app-card-body-->	
                                 
						    </div><!--//app-card-body--> 
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	               
	                
	                
                </div><!--//row-->
                
                </div>  
                
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	