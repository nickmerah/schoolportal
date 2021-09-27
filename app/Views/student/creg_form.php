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
        <strong style="font-size:16px"> <u>STUDENT'S COURSE REGISTRATION FORM</u>  </strong> 
</div>
                                
                               
					<br> 
							     
                                
                                
                               
							        <table cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
										 
										<tbody>
											<tr>
												<td colspan="2" class="cell"><strong>Full Name:</strong> </td>
												<td colspan="3" class="cell"><?= $fullname; ?>  </td>
												<td width="196" rowspan="5" class="cell"> <img src="<?= base_url("public/uploads/$stdphoto");?>" alt="Coheskat" width="102" height="103">  </td>
											</tr>
											<tr>
												<td colspan="2" class="cell"><strong>Registration Number:</strong></td>
												<td colspan="3" class="cell"><?= $matno; ?> </td>
											</tr>
											<tr>
												<td colspan="2" class="cell"><strong>School:</strong></td>
												<td colspan="3" class="cell"> <?= $school; ?> </td>
											</tr>
											
											<tr>
											  <td colspan="2" class="cell"><strong>Department:</strong></td>
											  <td colspan="3" class="cell"><?= $dept; ?> </td>
										  </tr>
											<tr>
											  <td colspan="2" class="cell"><strong>Course of Study:</strong></td>
											  <td colspan="3" class="cell"><?= $stdcourses; ?> </td>
										  </tr>
										
											<tr>
											  <td colspan="2" class="cell"><strong>Session:</strong></td>
											  <td width="281" class="cell"><?= $cs_session; ?>
											    /
											    <?= $cs_session + 1;?></td>
											  <td width="111" class="cell"><strong>Level (Year):</strong></td>
											  <td colspan="2" class="cell"><?= $dlevel; ?></td>
										  </tr>
											<tr>
											  <td colspan="6" class="cell">&nbsp;</td>
										  </tr>
											<tr>
											  <td colspan="6" align="center" class="cell"><div align="center"><strong>FIRST SEMESTER</strong></div></td>
										  </tr>
											<tr>
											  <td width="41" class="cell"><strong>S/N</strong></td>
											  <td width="168" class="cell"><strong>Course Code</strong></td>
											  <td colspan="2" class="cell"><strong>Course Title</strong></td>
											  <td colspan="2"  class="cell"><strong>Credit Unit</strong></td>
										  </tr>
											  <?php 
								foreach($fcourse_details as $f_coursedetail): ?>
                                <tr>
											  <td class="cell"><?= $k = $k+1; ?></td>
											  <td class="cell"><?= $f_coursedetail->c_code; ?></td>
											  <td colspan="2" class="cell"><?= $f_coursedetail->c_title; ?></td>
											  <td colspan="2" class="cell"><?= $f_coursedetail->c_unit; $f_cunit += $f_coursedetail->c_unit; ?></td>
										  </tr>   <?php endforeach; ?>
											<tr>
											  <td colspan="4" align="right" class="cell"><strong>Total Credit Units:</strong></td>
											  <td colspan="2" class="cell"><?= $f_cunit; ?></td>
										  </tr>
										 
                                          
                                          
                                         
											 
											 
											 
											 	 
                                        </tbody>
									</table>    <div style="page-break-after: always;"></div>
                                    
                                    <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:12px">
											    <thead>
											      <tr>
											        <th colspan="4" class="cell"><div align="center">SECOND SEMESTER</div></th>
										          </tr>
											      <tr>
											        <th width="5%" height="18" align="left" class="cell">S/N</th>
											        <th width="22%" align="left" class="cell">Course Code</th>
											        <th width="52%" align="left" class="cell">Course Title</th>
											        <th width="21%" align="left" class="cell">Credit Unit</th>
										          </tr>
										        </thead>
											    <tbody>
											      <?php foreach($scourse_details as $s_coursedetail): ?>
											      <tr>
											        <td class="cell"><?= $n = $n+1; ?></td>
											        <td class="cell"><?= $s_coursedetail->c_code; ?></td>
											        <td class="cell"><?= $s_coursedetail->c_title; ?></td>
											        <td class="cell"><?= $s_coursedetail->c_unit; $s_cunit += $s_coursedetail->c_unit; ?></td>
										          </tr>
											      <?php endforeach; ?>
											      
											      <tr>
											        <td colspan="3" align="right" class="cell"><strong>Total Credit Units:</strong></td>
											        <td class="cell"><?= $s_cunit; ?></td>
										          </tr>
											      <?php if ($tcourse_details) { ?>    <tr>
											        <td colspan="4" align="right" class="cell">&nbsp;</td>
										          </tr>
											      <tr>
											        <td colspan="4" align="right" class="cell"><div align="center"><strong>THIRD SEMESTER</strong></div></td>
										          </tr>
											      <tr>
											        <th height="18" align="left" class="cell">S/N</th>
											        <th align="left" class="cell">Course Code</th>
											        <th align="left" class="cell">Course Title</th>
											        <th align="left" class="cell">Credit Unit</th>
										          </tr>
											   <?php 
											      
											      
											      
											      foreach($tcourse_details as $t_coursedetail): ?>      <tr>
										         <td align="left" class="cell"><?= $o = $o+1; ?></td>
											        <td align="left" class="cell"><?= $t_coursedetail->c_code; ?></td>
											        <td align="left" class="cell"><?= $t_coursedetail->c_title; ?></td>
											        <td align="left" class="cell"><?= $t_coursedetail->c_unit; $t_cunit += $t_coursedetail->c_unit; ?></td>
										          </tr><?php endforeach; ?>
											      <tr>
											        <td colspan="3" align="right" class="cell"><strong>Total Credit Units:</strong></td>
											        <td align="left" class="cell"><?= $t_cunit; ?></td>
										          </tr> <?php } ?>
											       <tr>
											        <td colspan="3" align="right" class="cell"><strong>Total Credit Registered:</strong></td>
											        <td align="left" class="cell"><?= $f_cunit+ $s_cunit + $t_cunit; ?></td>
										          </tr>
										        </tbody>
</table>   <br>
                                                  
			<div style="font-size:12px">
                                Student's Signature: _________________________________________	Date: _______________________________<br /><br />
Programme Coordinator: ____________________________________		Sign/Date: ____________________________<br /><br />
 HOD: ___________________________________________________Sign/Date: 

               ____________________________</div>			    	
<div align="center">
                 
<script>

printWindow();

</script>   
   <?PHP /*
<script> 
 setTimeout("window.close()",10000) 
</script>      */?> 
	    
</div>