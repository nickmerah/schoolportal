 <!DOCTYPE html>
<html lang="en"> 
<head>
    <title>CONAMKAT .:: Home | Student Portal</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONAMKAT KATSINA COLLEGE OF NURSING AND MIDWIFERY">
         
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js')?>"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css')?>">
 <script>

function printWindow(){

   bV = parseInt(navigator.appVersion)

   if (bV >= 4) window.print()

}

</script>

<script type="text/javascript">
 

 
 
 document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);


window.onbeforeunload = function (e) {
    // Cancel the event
    e.preventDefault();

    // Chrome requires returnValue to be set
    e.returnValue = 'Really want to quit the game?';
};

 
document.onkeydown = function (e) {
    e = e || window.event;//Get event

    if (!e.ctrlKey) return;

    var code = e.which || e.keyCode;//Get key code

    switch (code) {
        case 83://Block Ctrl+S
        case 87://Block Ctrl+W -- Not work in Chrome and new Firefox
            e.preventDefault();
            e.stopPropagation();
            break;
    }
};
</script>
</head>  
	    
	   
						   
							    
                              
<div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:20px">    COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
  </h3>
        <br>    
            
        <strong style="font-size:18px"> <u>STUDENT'S BIODATA</u>  </strong> 
</div>
                                
                               
					
							     
                                
                                
                      <?php foreach($stddetails as $stddetail): ?>         
							  
							        <table class="table table-bordered" style="font-size:14px">
										 
										<tbody>
											<tr>
												<td width="195" class="cell"><strong>Full Name:</strong> </td>
												<td colspan="3" class="cell"><?= $stddetail->surname; ?></strong>, <?= $stddetail->firstname; ?> <?= $stddetail->othernames; ?>  </td>
												<td width="196" rowspan="5" class="cell"> <img class="profile-image" src="<?= base_url("public/uploads/$stddetail->std_photo" );?>" alt="CONAMKAT" width="160" height="160">  </td>
											</tr>
											<tr>
												<td class="cell"><strong>Registration Number:</strong></td>
												<td colspan="3" class="cell"><?= $stddetail->matric_no; ?> </td>
											</tr>
											<tr>
												<td class="cell"><strong>Email:</strong></td>
												<td colspan="3" class="cell"> <?= $stddetail->student_email; ?> </td>
											</tr>
											
											<tr>
											  <td class="cell"><strong>Date of Birth:</strong></td>
											  <td colspan="3" class="cell"> <?= date('F d, Y', strtotime($stddetail->birthdate)); ?>  </td>
										  </tr>
											<tr>
											  <td class="cell"><strong><strong>Contact Address:</strong> </strong></td>
											  <td colspan="3" class="cell"><?= $stddetail->contact_address; ?> </td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Home Address:</strong></td>
											  <td colspan="4" class="cell"><?= $stddetail->student_homeaddress; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>School:</strong></td>
											  <td colspan="4" class="cell"><?= $stddetail->faculties_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Department:</strong></td>
											  <td colspan="4" class="cell"><?= $stddetail->departments_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Programme:</strong></td>
											  <td colspan="4" class="cell"><?= $stddetail->programme_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="4" class="cell"><?= $stddetail->programme_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>State of Origin:</strong></td>
											  <td width="310" class="cell">   <?= $stddetail->state_name; ?></td>
											  <td width="135" class="cell"><strong>Level:</strong></td>
											  <td colspan="2" class="cell"><?= $stddetail->level_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>LGA:</strong></td>
											  <td class="cell">  <?= $stddetail->lga_name; ?></td>
											  <td class="cell"><strong>Gender:</strong></td>
											  <td colspan="2" class="cell"><?= strtoupper($stddetail->gender); ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Next of Kin:</strong></td>
											  <td class="cell"><?= strtoupper($stddetail->next_of_kin); ?></td>
											  <td class="cell"><strong>GSM:</strong></td>
											  <td colspan="2" class="cell"><?=  ($stddetail->nok_tel); ?> </td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Next of Kin Address:</strong></td>
											  <td class="cell"><?= strtoupper($stddetail->nok_address); ?></td>
											  <td class="cell"><strong>Blood Group:</strong></td>
											  <td colspan="2" class="cell"><?= $stddetail->std_bloodgrp; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Next of Kin GSM:</strong></td>
											  <td class="cell"><?=  ($stddetail->nok_tel); ?></td>
											  <td class="cell"><strong>Genotype:</strong></td>
											  <td colspan="2" class="cell"><?= $stddetail->std_genotype; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Physically Challenged?</strong></td>
											  <td class="cell"><?= $stddetail->std_pc; ?></td>
											  <td class="cell"><strong>Student Status:</strong></td>
											  <td colspan="2" class="cell"><?= strtoupper($stddetail->std_status); ?></td>
										  </tr>
											
											 
											 
                                          
                                         
		
										</tbody>
									</table>
						        
						       
						  <?php endforeach; ?>    
						   
						   
					 
	               
	                
	               <script>

printWindow();

</script>   
               
                
			    
		   