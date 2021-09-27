<body class="green">


  <div id="login-page" class="row" style = "margin-top: 55px;">
    <div class="col s12 z-depth-6 card-panel">
     <form name="form1" id="form1" method="post" action="ctrans" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
           <a href="index"> <img src="<?= base_url('assets/images/schoollogo.jpg')?>" alt="School Logo" width="111" height="108" class="responsive-img valign profile-image-login"></a>
<p class="center login-form-text" style = "font-weight: bold; color: #104E8B; font-size: 25px; text-transform:capitalize;">COLLEGE OF NURSING AND MIDWIFERY<br> KATSINA</p>
                <p class="center login-form-text" style = "color: #104E8B; font-size: 20px;">PRINT RECEIPT</p>
             
          </div>
        </div>
       
       
       
      <div class="row">
        <div class="input-field col s12">
          
          <i class="mdi-editor-attach-money prefix"></i>
          <input id="rrr" type="text" class="validate" maxlength = "50" name="rrr" required autocomplete="off">
          <label for="rrr">Enter RRR</label>
        </div>

      </div>
       
     
  
        
          <div class="row margin">
          <div class="input-field col s12">
           
            <input type= "submit" name = "submit" value = "PRINT RECEIPT"  onclick = "alert('Your RRR will been sent for processing....')" style = "width: 100%; padding: 9px; background: #060; color: white; border: 0px;" >
          <br><br>
          </div><div   align = "center"> <a href = '<?= base_url('portal/stdpay'); ?>' style = "width: 100%;   background: white; color: green;   " >GO BACK</a></div>
        </div>
        
        
      </form>
    </div>
  </div>