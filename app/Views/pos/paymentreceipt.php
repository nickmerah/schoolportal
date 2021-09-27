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

                <p class="center login-form-text" style = "color: #104E8B; font-size: 18px;">PAYMENT RECEIPT</p>
                <p class="center login-form-text" style = "color:#090; font-size: 20px; font-weight:bold">RRR:  <?= $ree->rrr; ?>  </p>
                 <p style="font-size:14px">The details for your payment are as follows;</p>
   
    <p>  Registration Number: <b><?php echo strtoupper ($ree->appno); ?></b></p>
      <p>Fullnames: <b><?php echo strtoupper($ree->fullnames); ?></b></p> 
      <p> Fee Name: <b><?php echo strtoupper($ree->trans_name) ?></b></p>
      <p>Amount:  <b>&#8358;<?php echo number_format($ree->trans_amount) ?> </b></p>
      
      <p>Date Paid: <b><?php echo  date('d-M-Y H:i:s' , strtotime($ree->generated_date)) ?></b></p>
      
    
   
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

 <input type= "button" onClick="printDiv('printableArea')"  value = "PRINT PAYMENT RECEIPT"  style = "width: 100%; padding: 9px; background: white; color: green; border: 0px; " >
          <br><br><div   align = "center"> <a href = '<?= base_url('portal/stdpay'); ?>' style = "width: 100%; padding: 9px; background: white; color: green; border: 0px; " >GO BACK</a></div>
 


 

 <script type="application/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>