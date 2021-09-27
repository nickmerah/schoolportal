<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?=  $title; ?></title>
    
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
    <script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}
//-->
</script>            
</head> 		 
            
            
   
							    
                              
<div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:18px">   COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
</h3>
            
            <br> 
  <strong style="font-size:16px"> <u>EXAMINATION CARD</u>  </strong> 
</div>
                                
                               
					<br> 
							     
                                
                                
                               
							        <table cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
										 
										<tbody>
											<tr>
												<td width="209" class="cell"><strong>Student Name:</strong> </td>
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
									<?php /*		<tr>
											  <td class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="3" class="cell"><?= $stdcourses; ?> </td>
										  </tr>*/?>
										
											<tr>
											  <td class="cell"><strong>Programme:</strong></td>
											  <td class="cell"><?= $progname; ?></td>
											  <td class="cell"><strong>Session:</strong></td>
											  <td colspan="2" class="cell"><?= $cs_session; ?>
/
  <?= $cs_session + 1;?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Semester:</strong></td>
											  <td width="281" class="cell"><strong>First Semester</strong></td>
											  <td width="111" class="cell"><strong>Level (Year):</strong></td>
											  <td colspan="2" class="cell"><?= $dlevel; ?></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
											    <tr>
											      <td width="4%"><strong>S/N</strong></td>
											      <td width="13%"><strong>DATE</strong></td>
											      <td width="12%"><strong>COURSECODE</strong></td>
											      <td width="29%"><strong>COURSE TITLE</strong></td>
											      <td width="30%"><strong>NAME OF INVIGILATOR</strong></td>
											      <td width="12%"><strong>SIGN</strong></td>
										        </tr>
										    <?php 
								foreach($fcourse_details as $f_coursedetail): ?>    <tr>
											      <td><?= $k = $k+1; ?></td>
											      <td>&nbsp;</td>
											      <td><?= $f_coursedetail->c_code; ?></td>
											      <td><?= $f_coursedetail->c_title; ?></td>
											      <td>&nbsp;</td>
											      <td>&nbsp;</td>
										        </tr>  <?php endforeach; ?>
										      </table></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><p>&nbsp;</p>
											    <div style="font-size:12px">											    Exam Officer: ____________________________________________		Sign/Date: ____________________________<br />
  <br />
											    HOD: ___________________________________________________Sign/Date: 
											    
										      ____________________________</div></td>
										  </tr>
											 
										 
                                          
                                          
                                         
											 
											 
											 
											 	 
                                        </tbody>
									</table>    
 <div style="page-break-after: always;"></div>
 <div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:18px">   COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
</h3>
            
            <br> 
  <strong style="font-size:16px"> <u>EXAMINATION CARD</u>  </strong> 
</div>
                                
                               
					<br> 
 
 <table cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
										 
										<tbody>
											<tr>
												<td width="209" class="cell"><strong>Student Name:</strong> </td>
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
										<?php /*	<tr>
											  <td class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="3" class="cell"><?= $stdcourses; ?> </td>
										  </tr> */ ?>
										
											<tr>
											  <td class="cell"><strong>Programme:</strong></td>
											  <td class="cell"><?= $progname; ?></td>
											  <td class="cell"><strong>Session:</strong></td>
											  <td colspan="2" class="cell"><?= $cs_session; ?>
/
  <?= $cs_session + 1;?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Semester:</strong></td>
											  <td width="281" class="cell"><strong>Second Semester</strong></td>
											  <td width="111" class="cell"><strong>Level (Year):</strong></td>
											  <td colspan="2" class="cell"><?= $dlevel; ?></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
											    <tr>
											      <td width="4%"><strong>S/N</strong></td>
											      <td width="13%"><strong>DATE</strong></td>
											      <td width="13%"><strong>COURSECODE</strong></td>
											      <td width="29%"><strong>COURSE TITLE</strong></td>
											      <td width="29%"><strong>NAME OF INVIGILATOR</strong></td>
											      <td width="12%"><strong>SIGN</strong></td>
										        </tr>
										    <?php foreach($scourse_details as $s_coursedetail): ?>    <tr>
											      <td><?= $n = $n+1; ?></td>
											      <td>&nbsp;</td>
											      <td><?= $s_coursedetail->c_code; ?></td>
											      <td><?= $s_coursedetail->c_title; ?></td>
											      <td>&nbsp;</td>
											      <td>&nbsp;</td>
										        </tr>  <?php endforeach; ?>
										      </table></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><p>&nbsp;</p>
											    <div style="font-size:12px">											    Exam Officer: ____________________________________________		Sign/Date: ____________________________<br />
  <br />
											    HOD: ___________________________________________________Sign/Date: 
											    
										      ____________________________</div></td>
										  </tr>
											 
										 
                                          
                                          
                                         
											 
											 
											 
											 	 
                                        </tbody>
</table>  
 
 
  <?php if ($tcourse_details) { ?>
  <div style="page-break-after: always;"></div>
 <div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:18px">   COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
</h3>
            
            <br> 
  <strong style="font-size:16px"> <u>EXAMINATION CARD</u>  </strong> 
</div>
                                
                               
					<br> 
 
 <table cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
										 
										<tbody>
											<tr>
												<td width="209" class="cell"><strong>Student Name:</strong> </td>
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
										<?php /*	<tr>
											  <td class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="3" class="cell"><?= $stdcourses; ?> </td>
										  </tr> */ ?>
										
											<tr>
											  <td class="cell"><strong>Programme:</strong></td>
											  <td class="cell"><?= $progname; ?></td>
											  <td class="cell"><strong>Session:</strong></td>
											  <td colspan="2" class="cell"><?= $cs_session; ?>
/
  <?= $cs_session + 1;?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>Semester:</strong></td>
											  <td width="281" class="cell"><strong>Third Semester</strong></td>
											  <td width="111" class="cell"><strong>Level (Year):</strong></td>
											  <td colspan="2" class="cell"><?= $dlevel; ?></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
											    <tr>
											      <td width="4%"><strong>S/N</strong></td>
											      <td width="14%"><strong>DATE</strong></td>
											      <td width="12%"><strong>COURSECODE</strong></td>
											      <td width="30%"><strong>COURSE TITLE</strong></td>
											      <td width="29%"><strong>NAME OF INVIGILATOR</strong></td>
											      <td width="11%"><strong>SIGN</strong></td>
										        </tr>
										    <?php 
											      
											      
											      
											      foreach($tcourse_details as $t_coursedetail): ?>    <tr>
											      <td><?= $o = $o+1; ?></td>
											      <td>&nbsp;</td>
											      <td><?= $t_coursedetail->c_code; ?></td>
											      <td><?= $t_coursedetail->c_title; ?></td>
											      <td>&nbsp;</td>
											      <td>&nbsp;</td>
										        </tr>  <?php endforeach; ?>
										      </table></td>
										  </tr>
											<tr>
											  <td colspan="5" class="cell"><p>&nbsp;</p>
											    <div style="font-size:12px">											    Exam Officer: ____________________________________________		Sign/Date: ____________________________<br />
  <br />
											    HOD: ___________________________________________________Sign/Date: 
											    
										      ____________________________</div></td>
										  </tr>
											 
										 
                                          
                                          
                                         
											 
											 
											 
											 	 
                                        </tbody>
</table> 
		<?php } ?>							  
 <script>

printWindow();

</script>   
   <?PHP /*
<script> 
 setTimeout("window.close()",10000) 
</script>      */?> 
									  
 