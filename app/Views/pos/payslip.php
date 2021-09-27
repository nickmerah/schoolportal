<body class="green">


 
  <div id="printableArea">
  <div id="login-page" class="row" style = "margin-top: 55px;">
    <div class="col s12 z-depth-6 card-panel">
     <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
              
            <a href = 'index'><img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="" width="111" height="108" class="responsive-img valign profile-image-login"></a>
<p class="center login-form-text" style = "font-weight: bold; color: #104E8B; font-size: 20px;">COLLEGE OF NURSING AND MIDWIFERY<br> KATSINA</p>
<?php foreach ($transdetails as $ree) { ?>

                <p class="center login-form-text" style = "color: #104E8B; font-size: 18px;">PAYMENT SLIP</p>
                <p class="center login-form-text" style = "color:#090; font-size: 20px; font-weight:bold">RRR:  <?= $ree->rrr; ?>  </p>
                 <p style="font-size:14px">The details for your payment are as follows;</p>
   
    <p>  Registration Number: <b><?php echo strtoupper ($ree->appno); ?></b></p>
      <p>Fullnames: <b><?php echo strtoupper($ree->fullnames); ?></b></p> 
      <p> Fee Name: <b><?php echo strtoupper($ree->trans_name) ?></b></p>
      <p>Amount:  <b>&#8358;<?php echo number_format($ree->trans_amount) ?> | Processing Fee: &#8358;325</b></p>
      <p>Total Amount:  <b>&#8358;<?php echo number_format($ree->trans_amount+325) ?> </b></p>
      <p>Date: <b><?php echo  date('d-M-Y H:i:s' , strtotime($ree->generated_date)) ?></b></p>
      
   <p><b><u>NEXT STEP</u> </b> <br>    1. You can make payment at <strong>Any  Bank Branch Nationwide</strong>  <br> With RRR: <b><?= $ree->rrr; ?> </b>  <br>  </form> 
<?php 
		     define("MERCHANTID", "5155065960");
			 define("APIKEY", "168405");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			$new_hash_string = MERCHANTID . $ree->rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$responseurl =   base_url("portal/remitaresponse/$ree->rrr");  
			  echo '<form action="'.GATEWAYRRRPAYMENTURL.'" method="POST">
			  <input id="merchantId" name="merchantId" value="'.MERCHANTID.'" type="hidden"/>
<input id="rrr" name="rrr" value="'.$ree->rrr.'" type="hidden"/>
<input id="responseurl" name="responseurl" value="'.$responseurl.'" type="hidden"/>
<input id="hash" name="hash" value="'.$new_hash.'" type="hidden"/>
<input id="paymenttype" name="paymenttype" value="Interswitch" type="hidden"/>
<p>2. To pay with your ATM Card, <input type="submit"   name="submit" value="Please Click Here" /></p></form>';
			  ?>  <p>3. After a Successful Payment, print your Receipt</p>
   
   <?php } ?>
   
	<div> 
	  
	</div>
          </div>
        </div>
       
       
       
       
       
     
        
          <div align="center">
         
            <b>Powered by CONAMKAT</b> 
           
        
        </div>
        
        
        
     
    </div>
  </div></div>

 <input type= "button" onClick="printDiv('printableArea')"  value = "PRINT PAYMENT SLIP"  style = "width: 100%; padding: 9px; background: white; color: green; border: 0px; " >
          <br><br><div   align = "center"> <a href = '../stdpay' style = "width: 100%; padding: 9px; background: white; color: green; border: 0px; " >GO BACK</a></div>
 


 

 <script type="application/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>