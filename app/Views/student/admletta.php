<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}
//-->
</script>
 <style> 
        .tab { 
            display: inline-block; 
            margin-left: 300px; 
        } 
    </style>               
                
			<?php foreach($stddetails as $stddetail): ?> 
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			 
			    <h1 class="app-page-title">Admission Letter | <a href="JavaScript:;" onClick="MM_openBrWindow('padmletter','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong>PRINT ADMISSION LETTER</strong>
</a></h1>
                <div class="row gy-4">
	                <div class="col-12 col-lg-12">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						 
						    <div class="app-card-body px-4 w-100">
							  
                             
							 
							 
							 
							  
                                    
          <div class="col-lg-12" >
            
            <h3 align="center">
            
            
            <img src="<?= base_url('assets/images/coheska_ban.png')?>" > </h3>
            
         <p>  <strong style="font-size:16px"> NAME: <?= $stddetail->surname; ?> <?= $stddetail->firstname; ?></strong>   <?= $stddetail->othernames; ?><b style="color:#FFF">____________________________________________________________________________________</b><?php echo $admdate ; ?></strong>  </p>
         <p>  <strong style="font-size:16px"> APP NO: <?= $stddetail->matric_no; ?></strong> 
         <p>  <strong style="font-size:16px"> STATE/LGA: <?= $stddetail->state_name; ?> / <?= $stddetail->lga_name; ?></strong>   
         <div align="right"><strong style="font-size:16px"></strong></div></p>
        
         <div align="center"><u><strong style="font-size:19px; color:#093">OFFER OF PROVISIONAL ADMISSION [<?= $cs_session; ?>/<?= $cs_session+1; ?> SESSION]<br /></strong> <strong style="font-size:17px; color:#F00">  <?php /* <u> <?= $stddetail->programme_name; ?> PROGRAMME</u>*/ ?></strong></u> </div></p>
        
          
        </div>
        
        <div align="justify" style="font-size:16px; line-height:2">
         
          <p>Following  your application, entrance examination and interview, we are pleased to inform you that you have been  offered provisional admission to read:
          <p>
          
           <span class="tab"></span>  <strong > Programme: </strong>    <?= ucwords(strtolower($stddetail->programme_option)); ?><br>  
            <span class="tab"></span>  <strong>   Department: </strong>  <?= ucwords(strtolower($stddetail->departments_name)); ?><br> 
           <span class="tab"></span>   <strong>  School:    </strong>  <?= ucwords(strtolower($stddetail->faculties_name)); ?> <br>
            </p>
             
          
          
          2. The  offer is subject to the following conditions: </p>
          <ol type="a">
            <li>That you fill the Acceptance Form within four (4) weeks from the date of your
admission; </li>
            <li>That you possess the minimum qualification for the programme; </li>
            <li>That you are found physically and mentally fit after a medical examination to be
conducted by the School Clinic; </li>
            <li>That you must present the originals of your credentials during registration for
scrutiny; </li>
            <li>That you shall be withdrawn as a result of fake/forge result, poor performance or
acts of misconduct during the period of your study; </li>
            <li>That you pay your registration fees in full into the account of College of Nursing and
Midwifery, Katsina (fees once paid, are non–refundable and non–transferrable); </li>
            <li>That you produce a letter of release from your employer indicating that you have
their permission to be away from your duties (where applicable); </li>
            <li>That you accept to abide by all the rules and regulations of the College; and</li>
             <li>That you renew your registration at the beginning of every Academic Session
(where applicable).</li>
          </ol>
          <p>3. Accept our congratulations on your admission, please.        </p>
        </div>
        <!-- /.row -->

         
         
            
   <div align="center"> 
   
   <table width="100%" border="0">
  <tr>
    <td width="50%" align="center"><img src="<?= base_url('assets/images/provost_signature.jpg')?>" width="118" height="40" /></td>
    <td width="50%" align="center"><img src="<?= base_url('assets/images/registrar_signature.jpg')?>" width="118" height="40" /></td>
  </tr>
  <tr>
    <td align="center"><strong>PROVOST</strong></td>
    <td align="center"><strong>REGISTRAR</strong></td>
  </tr>
</table>
<BR />
   <p> <a href="JavaScript:;" onClick="MM_openBrWindow('padmletter','','location=no,status=yes,scrollbars=yes,width=600,height=800')">
<strong>PRINT ADMISSION LETTER</strong>
</a></p>
  
   </div>
</div> </div>
						    </div><!--//app-card-body-->
						   
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	              
						    
						   
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
        
        <?php endforeach; ?>
	    
	