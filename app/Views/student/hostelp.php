
                
                
			 
            
            
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
             <br> <strong style="font-size:20px">  COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
  </h3>
        <br>    
            
        <strong style="font-size:18px"> <u>HOSTEL ALLOCATION FORM</u>  </strong> 
</div>
                                
                               
					
							     
                                
                                
                                <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left" style="font-size:14px">
										 
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
                              
							        
                                    
                                    <table width="799" class="table text-left">
										<thead>
											
                                            <tr>
												<th colspan="2" class="cell"><div align="left">HOSTEL DETAILS</div></th>
											</tr>
										</thead>
										<tbody>
								 	
											<tr>
											  <td width="147" align="left" class="cell"><strong>Hostel Name:</strong></td>
											  <td width="640" class="cell"><?= $myhostel; ?></td>
										  </tr>
										  
										  <tr>
											  <td width="147" align="left" class="cell"><strong>Block Name:</strong></td>
											  <td width="640" class="cell"><?= $myblock; ?></td>
										  </tr>
											<tr>
											  <td align="left" class="cell"><strong>Room No:</strong></td>
											  <td class="cell"><?= $myroom; ?></td>
										  </tr>
											<tr>
												<td align="left" class="cell"><strong>BedSpace No:</strong></td>
												<td class="cell"><?=  $mybedspace; ?></td>
											</tr>
		
										</tbody>
									</table>
						        </div><br /><br />
                                Student's Signature: _________________________________________	Date: ____________________________<br /><br />
Hostel Portal: ____________________________________		Sign/Date: ____________________________<br /><br /></td>
										  </tr>
		
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->	
                                 
						    </div><!--//app-card-body--> 
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	               
	                
	                
                </div><!--//row-->
                
                </div>  
               
			 <input type= "button" onClick="printDiv('printableArea')"  value = "Print Hostel Allocation Slip"  class='btn btn-primary'>
               <script type="application/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
			       
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
         
	    
	