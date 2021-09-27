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
                
</head> 
        
			<?php 
			
			 
			
			if($transdetails){  ?>
            
            
     
			    
			  
							    
                              
                                <div align="center">
            <img src="<?= base_url('assets/images/schoollogo.jpg');?>" alt="Coheskat" width="102" height="103"> 
             <br> <strong style="font-size:20px">  COLLEGE OF NURSING AND MIDWIFERY, KATSINA</strong> <br> 
  </h3>
        <br>    
            
        <strong style="font-size:18px"> <u>PAYMENT RECEIPT</u>  </strong> 
</div>
                                
                               
					
							     
                                
                                
                                <div class="app-card-body">
							    <div class="table-responsive">
							        <table cellpadding="0" cellspacing="0" class="table table-bordered table-sm" style="font-size:13px">
										<thead>
											<tr>
												<th colspan="4" class="cell">Payment Details</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td width="105" class="cell"><strong>Registration No:</strong> </td>
												<td width="220" class="cell"><?= $transdetails[0]->appno; ?></td>
												<td colspan="2" rowspan="3" class="cell"> <img src="<?= base_url("public/uploads/$stdphoto");?>" alt="Coheskat" width="102" height="103">  </td>
											</tr>
											<tr>
												<td class="cell"><strong>Fullnames:</strong></td>
												<td class="cell"><?= $transdetails[0]->fullnames; ?></td>
											</tr>
											<tr>
												<td class="cell"><strong>Programme:</strong></td>
												<td class="cell"> <?= $transdetails[0]->programme_name; ?></td>
											</tr>
											
											<tr>
												<td class="cell"><strong>School:</strong></td>
												<td colspan="3" class="cell"> <?= $transdetails[0]->faculties_name; ?></td>
											</tr>
											<tr>
												<td class="cell"><strong>Department:</strong></td>
												<td class="cell"><?= $dept; ?></td>
												<td width="62" class="cell"><strong>Session:</strong></td>
												<td width="94" class="cell"><?= $transdetails[0]->trans_year; ?> / <?= $transdetails[0]->trans_year+1; ?> </td>
											</tr>
											
											<tr>
											  <td class="cell"><strong>Date:</strong></td>
											  <td class="cell"> <?=   date( 'd-M-Y h:i:s', strtotime($transdetails[0]->trans_date));?></td>
											  <td class="cell"><strong>Level:</strong></td>
											  <td class="cell"><?= $transdetails[0]->level_name; ?></td>
										  </tr>
											<tr>
											  <td class="cell"><strong>RRR:</strong></td>
											  <td class="cell"><?= $transdetails[0]->rrr; ?></td>
											  <td class="cell"><strong>Status:</strong></td>
											  <td class="cell"><span class="badge bg-success">
											    <?= $transdetails[0]->pay_status; ?>
											  </span></td>
										  </tr>
											<tr>
											  <td colspan="4" class="cell">&nbsp;</td>
										  </tr>
										 
											<tr>
											  <td class="cell"><strong>S/N</strong></td>
											  <td class="cell"><strong>Feename</strong></td>
											  <td colspan="2" class="cell"><strong>Fee Amount</strong></td>
										  </tr>
									<?php 
								foreach($transdetails as $paydetail): ?>	<tr>		
									<tr>
									  <td class="cell"><?= $n = $n+1; ?></td>
									  <td class="cell"><?= $paydetail->trans_name; ?> </td>
									  <td colspan="2" class="cell">&#8358;<?= number_format($paydetail->trans_amount); $tot += $paydetail->trans_amount; ?></td>
									  </tr>	<?php endforeach; ?>	
									<tr>
											  <td class="cell">&nbsp;</td>
											  <td class="cell"><strong>TOTAL:</strong></td>
											  <td colspan="2" class="cell">&#8358;
											    <?= number_format($tot); ?></td>
										  </tr>
                                          
                                          <tr>
											  <td colspan="4" class="cell"></p></td>
										  </tr>
		
										</tbody>
									</table> </td>
											
						        </div><!--//table-responsive-->
						       
						   
                                 
						    <?php } ?>
						   
						   
					 </div>
         
	    
	  <script>

printWindow();

</script>   
  <?php /*
 <script> 
 setTimeout("window.close()",10000) 
</script> */?>