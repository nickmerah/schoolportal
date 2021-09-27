<?php
namespace App\Controllers;
use \CodeIgniter\Controller;
use App\Models\AccountModel;
use App\Models\FeeModel;
use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\HostelModel;

class Student extends Controller
{

    public $session = '';
	

    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('uri');
       if(!session()->get('log_id'))
        {
            header('Location: '.base_url());
            exit(); 
        }

    }
	
	public function index()
    {
		 $accountModel = new AccountModel();
		 $studentModel = new StudentModel();
		 
		 //$pstat = $applicantModel->getfeestatus(session()->get('log_id')); 
		 // $csstat = $applicantModel->getcsfeestatus(session()->get('log_id')); 
	
		
        $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
        
        $prog = $data['stddetails'][0]->stdprogramme_id; 
        $sess = $accountModel->getsess($prog);
       	$fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
		$ofpay = $studentModel->get_ofeeamt(session()->get('log_id'), $sess);
		$creg = $studentModel->get_creg(session()->get('log_id'), $sess); 
		$hostel = $studentModel->get_hostel(session()->get('log_id')); 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'fpay' => $fpay,  'ofpay' => $ofpay,    'creg' => $creg, 'hostel' => $hostel, 'prog' => $prog];
        
         
       
          $stdtype['stdtype'] =  $data['stddetails'][0]->std_status ;
          
        
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar', $stdtype);  
       	 echo view('student/index',$data);
		  echo view('student/footer');  
    }
	
	
	public function biodata()
    {
		 $accountModel = new AccountModel();
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $appyear,  'pstat' => $pstat,  'csstat' => $csstat ];
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/profile',$data);
		  echo view('student/footer');  
    }
	
	
	public function edit_biodata()
    {
		 $accountModel = new AccountModel();
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $appyear,  'pstat' => $pstat,  'csstat' => $csstat ];
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/editprofile',$data);
		  echo view('student/footer');  
    }
	
	
	public function updatebio()
    {
		
		
		 if($this->request->getMethod()=='post')
        { 
		        $bloodgrp = $this->request->getVar('bloodgrp');
			    $genotype = $this->request->getVar('genotype');
				$phy_chal = $this->request->getVar('phy_chal');
				$contact_address = strtoupper($this->request->getVar('cadd'));
			   $student_homeaddress = strtoupper($this->request->getVar('hadd'));
			    $gsm = $this->request->getVar('gsm');
				
				
				$data = [
            'std_bloodgrp' => "$bloodgrp",
            'std_genotype'  => "$genotype",
			'std_pc' => "$phy_chal",
            'contact_address'  => "$contact_address",
			'student_homeaddress' => "$student_homeaddress",
			'student_mobiletel' => "$gsm"
        ]; 
				
				$accountModel = new AccountModel();
				$accountModel->update_biodata($data, session()->get('log_id'));
				 echo '<script type="text/javascript">
			alert("Biodata have been successfully Updated");
			window.location = "'.base_url('student/biodata').'";
		</script>';
		}else{
			 echo '<script type="text/javascript">
			alert("Error Updating Biodata");
			window.location = "'.base_url('student/edit_biodata').'";
		</script>';
		}
    }
	
	
	
	
	public function admletter()
    {
		 $accountModel = new AccountModel();
		 
		  $appsess = substr($sess+1,2,4);
		   $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		   $fac = $accountModel->getfac_code($data['stddetails'][0]->stdfaculty_id);
		   $pcode = $accountModel->getprog_code($data['stddetails'][0]->stdcourse);
		   $dnos = $accountModel->getstdno($data['stddetails'][0]->stdcourse);
		   $app_no = "$fac$pcode$appsess$dnos";
		    $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    $admdate = $accountModel->getadmdate($prog); 
		  
		   $stdstatus = $data['stddetails'][0]->std_status;
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat, 'app_no' => $app_no, 'admdate' => $admdate];
        
		 if ($stdstatus == 'returning'){
			 echo '<script type="text/javascript">
			alert("You are not Eligible to View Admission Letter");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/admletta',$data);
		  echo view('student/footer');  
    }
	
	
	public function padmletter()
    {
		 $accountModel = new AccountModel();
		   
		  $appsess = substr($sess,2,4);
		   $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		   $fac = $accountModel->getfac_code($data['stddetails'][0]->stdfaculty_id);
		   $pcode = $accountModel->getprog_code($data['stddetails'][0]->stdcourse);
		   $dnos = $accountModel->getstdno($data['stddetails'][0]->stdcourse);
		   
		   
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    $admdate = $accountModel->getadmdate($prog);
		    
		   $app_no = "$fac/$appsess/$pcode/$dnos";
		   $data['app_no'] =  $app_no;
		    $data['cs_session'] =  $sess;
		    $data['admdate'] =  $admdate;
		   
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat, 'app_no' => $app_no ];
        
		 
        
       	 echo view('student/admlettap',$data );
	 
    }
	
	public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
	
	
	public function fees()
    {
		 $accountModel = new AccountModel();
		 
		 
	 
		 $studentModel = new StudentModel();
		
      
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		 
		 
	  	 $prog = $data['stddetails'][0]->stdprogramme_id; 
	   $sess = $accountModel->getsess($prog);
	     $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess);
	   
	  	   $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat, 'fpay' => $fpay ];
	  	 //check if portal is closed
		 
		   $pstatus = $accountModel->portalclosing($prog);  
		  if ($pstatus == '0'){
			 echo '<script type="text/javascript">
			alert("Portal is CLOSED to Fee Payment");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		  $stateor = $data['stddetails'][0]->state_of_origin;
		  if ($stateor == 20){
		      $ind = 1;
		      
		  }else{
		      $ind = 2;
		      
		  }
		 $feeModel = new FeeModel();
		 
		 //check if late payment is enabled
		 
	 	   $latepay = $accountModel->getlatepay($prog);    
		 $data['feedetails'] =  $feeModel->getfeedetails($prog,$fac,$level,$new_return, $ind, $sess, $latepay);
		 
		// print_r($data['feedetails']); exit;
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/fees',$data);
		  echo view('student/footer');  
    }
	
	public function paynow()
    {
        
        
		 $accountModel = new AccountModel();
		 
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		
		
	 
		    $sess = $accountModel->getsess($prog);
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		 
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		   
		   $stateor = $data['stddetails'][0]->state_of_origin;
		  if ($stateor == 20){
		      $ind = 1;
		      
		  }else{
		      $ind = 2;
		      
		  }
		   
		 $feeModel = new FeeModel();
		 
	 	//  $checklatepay = $accountModel->getlatepay();  
	 	
	 	
	 	//check eligibilty
		  $exclude = $accountModel->exclude($appno);
		  
		   if ($exclude) {
				  echo '<script type="text/javascript">
			alert("You are Eligible for Partial Fees Payment not School Fees");
			window.location = "'.base_url('student/').'";
		</script>';
			 }
		 
		 
		  $latepay = $accountModel->getlatepay($prog);    
		  
	 
		 
		 
		 $feedetails =  $feeModel->getfeedetails($prog,$fac,$level,$new_return, $ind, $sess, $latepay);
		 
	
		 
		  if (empty($feedetails)) {
				  echo '<script type="text/javascript">
			alert("No Fee Details had been generated or Configured\nKindly confirm from bursary");
			window.location = "'.base_url('student/fees').'";
		</script>';
			 }else{
				
				foreach($feedetails as $fee_detail){
			$totalamt += $fee_detail->amount; 
		}
		
				 ///get RRR
			define("MERCHANTID", "5155065960");
		    define("SERVICETYPEID", "6752225452"); // e revenue
			 define("APIKEY", "168405");
			 define("GATEWAYURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			 define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
			 $portalfee =1200;
			 $processingfee = 325;
			 $totalAmount = $totalamt + $processingfee;
           	 	$mytotal_amount = number_format($totalAmount);
				$merchantId = MERCHANTID;
				$timesammp=DATE("dmyHis");		
				$orderID = $timesammp;
				$payerName = "$surname $firstname $othernames - $appno";
				$payerEmail =  $semail;
				$payerPhone =  $sgsm;
				$responseurl = PATH . "/remitaresponse.php";
				$hash_string = MERCHANTID . SERVICETYPEID . $orderID . $totalAmount . APIKEY;
				$hash = hash('sha512', $hash_string);
				$itemtimestamp = $timesammp;


				$itemid1="itemid1";
				$itemid2="itemid2";
				$itemid3="itemid3";
				
				$beneficiaryName="Katsina State College of Nursing";
				$beneficiaryName2="Katsina State College of Nursing";
				$beneficiaryName3="Atarah Consulting and Mentoring";

				$beneficiaryAccount="1006379307";  //revenue
				$beneficiaryAccount2="1006486193"; //custody
				$beneficiaryAccount3="0061171696"; //atarah

				$bankCode="082";
				$bankCode2="082";
				$bankCode3="232";

				$techfee = $portalfee + $processingfee;
				$school_share = $totalAmount - $techfee;
				
				
				//get revenue
				$rev_amt = $feeModel->getfee_amt_split($prog,$fac,$level,$new_return,$ind, $sess, "revenue", $latepay);//revenue
				foreach($rev_amt as $rev_amts){
			$revenue += $rev_amts->amount; 
		     }
		//get custody
		$cus_amt = $feeModel->getfee_amt_split($prog,$fac,$level,$new_return,$ind, $sess, "custody", $latepay);//custody
				foreach($cus_amt as $cus_amts){
			$custody += $cus_amts->amount; 
		     }
				 
				 
 
				$beneficiaryAmount ="$revenue";
				$beneficiaryAmount2 ="$custody";
				$beneficiaryAmount3 ="$techfee";

				$deductFeeFrom=0;
				$deductFeeFrom2=0;
				$deductFeeFrom3=1;

	
			   	 $content = '{"serviceTypeId":"'.SERVICETYPEID
					.'"'.",".'"amount":"'.$totalAmount
					.'","orderId":"'.$orderID
					.'"'.',"payerName":"'. $payerName
					.'"'.',"payerEmail":"'.$payerEmail
					.'"'.",".'"payerPhone":"'.$payerPhone
					.'","lineItems":[
					{"lineItemsId":"'.$itemid1.'","beneficiaryName":"'.$beneficiaryName.'","beneficiaryAccount":"'.$beneficiaryAccount.'","bankCode":"'.$bankCode.'","beneficiaryAmount":"'.$beneficiaryAmount.'","deductFeeFrom":"'.$deductFeeFrom.'"},
					{"lineItemsId":"'.$itemid2.'","beneficiaryName":"'.$beneficiaryName2.'","beneficiaryAccount":"'.$beneficiaryAccount2.'","bankCode":"'.$bankCode2.'","beneficiaryAmount":"'.$beneficiaryAmount2.'","deductFeeFrom":"'.$deductFeeFrom2.'"},
					{"lineItemsId":"'.$itemid3.'","beneficiaryName":"'.$beneficiaryName3.'","beneficiaryAccount":"'.$beneficiaryAccount3.'","bankCode":"'.$bankCode3.'","beneficiaryAmount":"'.$beneficiaryAmount3.'","deductFeeFrom":"'.$deductFeeFrom3.'"}
					]}'; 
  
					$curl = curl_init();
					curl_setopt_array($curl, array(
 					 CURLOPT_URL => GATEWAYURL,
  					CURLOPT_RETURNTRANSFER => true,
  					CURLOPT_SSL_VERIFYPEER => false,
  					CURLOPT_ENCODING => "",
  					CURLOPT_MAXREDIRS => 10,
 				 	CURLOPT_TIMEOUT => 30,
  					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					CURLOPT_CUSTOMREQUEST => "POST",
  					CURLOPT_POSTFIELDS => $content,
  					CURLOPT_HTTPHEADER => array(
    				"Authorization: remitaConsumerKey=$merchantId,remitaConsumerToken=$hash",
    				"Content-Type: application/json",
    				"cache-control: no-cache"
  					),
					));

					$json_response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);
//var_dump($json_response);  exit;
					$jsonData = substr($json_response, 7, -1);
					$response = json_decode($jsonData, true);  
					$statuscode = $response['statuscode'];
					if($statuscode=='025'){
        $rrr = trim($response['RRR']); 
 					

//end get RRR
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
		foreach($feedetails as $feedetail){
			 
		
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $feedetail->field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $feedetail->amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "Remita",
			'fee_id' => $feedetail->item_id,
			'fee_type' => "fees",
			'rrr' => $rrr,
        ]; 
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  RRR for Payment is '.$rrr.' \n Payment can be made using your ATM Card or at any Bank Branch");
			window.location = "paymentslip/'.$rrr.'";
		</script>';
			
					}else{
					    
					    	echo '<script type="text/javascript">
			alert("There is an issue generating Remita RRR\n Kindly check back later and bear with Us");
			window.location = "fees";
		</script>';
					    
					}
					
					
					
				 
		
			 }
    }
	
	public function paymentslip()
    {   
		 
		  $studentModel = new StudentModel();

        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat ];
        $data['transdetails'] =  $studentModel->gettransdetails($this->request->uri->getSegment(3));
		 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/payslip',$data);
		  echo view('student/footer');  
		 
    }
	
	public function pay_slip()
    {   
		 
		  $studentModel = new StudentModel();
          $accountModel = new AccountModel();
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat ];
        $data['transdetails'] =  $studentModel->gettransdetails($this->request->uri->getSegment(3));
		$data['stddetails'] =  $accountModel->getacctdetails($data['transdetails'][0]->log_id);
		$data['stdphoto'] = $data['stddetails'][0]->std_photo;
		 
		 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/pay_slip',$data);
		  echo view('student/footer');  
		 
    }
	
	public function ofee()
    {
		 $accountModel = new AccountModel();
		  
		 
		 
		 $studentModel = new StudentModel();
		 $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		 
		 $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess);
		 
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat,  'fpay' => $fpay ];
		 
         
		
		 $prog = $data['stddetails'][0]->stdprogramme_id;
		 
		  $studentstatus = $data['stddetails'][0]->std_status;
		  	 $setmat = $data['stddetails'][0]->matset;
		 
 	 if ($studentstatus == 'new' and $setmat == "0"){
 	      echo '<script type="text/javascript">
			alert("Confirm your generated Registration Number...");
			window.location = "'.base_url('student/matreg').'";
		</script>';
 	     exit;
 	 }
		 
		 
		 
		 $feeModel = new FeeModel();
		 $data['feedetails'] =  $feeModel->getofeedetails($prog);
		// print_r($data['feedetails']); exit;
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/ofee',$data);
		  echo view('student/footer');  
    }
	
	
	
	public function payofee()
    {
		
		$selfee =  $this->request->getVar('selfee'); 
		
		if (empty($selfee)) {
				  echo '<script type="text/javascript">
			alert("No Fee had been selected, Kindly select Fee item(s) to proceed");
			window.location = "'.base_url('student/ofee').'";
		</script>';
			 }else{
		    $feeModel = new FeeModel();
			//foreach ($selfee as $selfees) {
	 		 $totalamt = $feeModel->getofee_amt($selfee);
			//}
		}
		
		//get account type
		$accttype = $feeModel->getacct_type($selfee);
		  
		
		 
		 $accountModel = new AccountModel();
		 
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		
		  
		    $sess = $accountModel->getsess($prog);
		    
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		  $state = $data['stddetails'][0]->state_of_origin;
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		   
		
				 ///get RRR
			define("MERCHANTID", "5155065960");
			
		 
			
			//switch service type & acctno
			if ($totalamt > 15000 or $acctype == 'custody') {
			
			 define("SERVICETYPEID", "7059813768"); // ecustody fee 
			 $acctno = "1006486193";
			}else{
				define("SERVICETYPEID", "5135210542"); // processing fee 
			 $acctno = "1006379307";
			}
			 
			 
			 define("APIKEY", "168405");
			 define("GATEWAYURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			 define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
			 $portalfee = 325;
			 $totalAmount = $totalamt + $portalfee;
           	 	$mytotal_amount = number_format($totalAmount);
				$merchantId = MERCHANTID;
				$timesammp=DATE("dmyHis");		
				$orderID = $timesammp;
				$payerName = "$surname $firstname $othernames - $appno";
				$payerEmail =  $semail;
				$payerPhone =  $sgsm;
				$responseurl = PATH . "/remitaresponse.php";
				$hash_string = MERCHANTID . SERVICETYPEID . $orderID . $totalAmount . APIKEY;
				$hash = hash('sha512', $hash_string);
				$itemtimestamp = $timesammp;


				$itemid1="itemid1";
				$itemid2="itemid2";
				
				$beneficiaryName="Katsina State College of Nursing";
				$beneficiaryName2="Atarah Consulting and Mentoring";

				$beneficiaryAccount="$acctno";  //revenue
				$beneficiaryAccount2="0061171696"; //atarah

				$bankCode="082";
				$bankCode2="232";

				
				$school_share = $totalAmount - $portalfee;
				 
 
				$beneficiaryAmount ="$school_share";
				$beneficiaryAmount2 ="$portalfee";
			 

				$deductFeeFrom=0;
				$deductFeeFrom2=1;
			 
	
 			 	$content = '{"serviceTypeId":"'.SERVICETYPEID
					.'"'.",".'"amount":"'.$totalAmount
					.'","orderId":"'.$orderID
					.'"'.',"payerName":"'. $payerName
					.'"'.',"payerEmail":"'.$payerEmail
					.'"'.",".'"payerPhone":"'.$payerPhone
					.'","lineItems":[
					{"lineItemsId":"'.$itemid1.'","beneficiaryName":"'.$beneficiaryName.'","beneficiaryAccount":"'.$beneficiaryAccount.'","bankCode":"'.$bankCode.'","beneficiaryAmount":"'.$beneficiaryAmount.'","deductFeeFrom":"'.$deductFeeFrom.'"},
					{"lineItemsId":"'.$itemid2.'","beneficiaryName":"'.$beneficiaryName2.'","beneficiaryAccount":"'.$beneficiaryAccount2.'","bankCode":"'.$bankCode2.'","beneficiaryAmount":"'.$beneficiaryAmount2.'","deductFeeFrom":"'.$deductFeeFrom2.'"}
					]}';  
  
					$curl = curl_init();
					curl_setopt_array($curl, array(
 					 CURLOPT_URL => GATEWAYURL,
  					CURLOPT_RETURNTRANSFER => true,
  					CURLOPT_SSL_VERIFYPEER => false,
  					CURLOPT_ENCODING => "",
  					CURLOPT_MAXREDIRS => 10,
 				 	CURLOPT_TIMEOUT => 30,
  					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					CURLOPT_CUSTOMREQUEST => "POST",
  					CURLOPT_POSTFIELDS => $content,
  					CURLOPT_HTTPHEADER => array(
    				"Authorization: remitaConsumerKey=$merchantId,remitaConsumerToken=$hash",
    				"Content-Type: application/json",
    				"cache-control: no-cache"
  					),
					));

					$json_response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);
                 // var_dump($json_response); exit;
					$jsonData = substr($json_response, 7, -1);
					$response = json_decode($jsonData, true); 

					$statuscode = $response['statuscode'];
					if($statuscode=='025'){
        $rrr = trim($response['RRR']); 
 					

//end get RRR
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
		//foreach($selfee as $feedetail){
			$field_name = $feeModel->getofee_name($selfee); 
		    $field_amount = $feeModel->getofee_amt($selfee); 
			
			
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $field_amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "Remita",
			'fee_id' => $selfee,
			'fee_type' => "ofees",
			'rrr' => $rrr,
        ]; 
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
//}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  RRR for Payment is '.$rrr.' \n Payment can be made using your ATM Card or at any Bank Branch");
			window.location = "paymentslip/'.$rrr.'";
		</script>';
			
					}
					
					
			 }
				 
		public function creg()
    {
		 $accountModel = new AccountModel();
		 $feeModel = new FeeModel();
		 
		
		
		 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $progid = $data['stddetails'][0]->stdprogramme_id;
		   
		   
		    $sess = $accountModel->getsess($progid);
		    
		    
		   //check if portal is closed
		 
		     $pstatus = $accountModel->portalclosing($progid);    
		  if ($pstatus == '0'){
			 echo '<script type="text/javascript">
			alert("Portal is CLOSED to Course Registration");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
		  
		  $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
		  $latepay = $accountModel->getlatepay($progid);   
		  

        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel , 'fpay' => $fpay ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $stdcourse =  $data['stddetails'][0]->stdcourse;
		 $appno = $data['stddetails'][0]->matric_no;
		 $new_return = $data['stddetails'][0]->std_status;
		  $stateor = $data['stddetails'][0]->state_of_origin;
		  if ($stateor == 20){
		      $ind = 1;
		      
		  }else{
		      $ind = 2;
		      
		  }
		 
		   $feesamt=  $feeModel->getcorrectfeeamt($progid,$fac,$level,$new_return, $ind, $sess, $latepay);
		   
		    $exclude = $accountModel->exclude($appno);  
		  
		   
		 
		 
		  if ($fpay < $feesamt and empty($exclude)){
		     echo '<script type="text/javascript">
			alert("Fee Amount Paid is less than the Actual School Fees");
			window.location = "'.base_url('student/fees').'";
		</script>';
 	     exit; 
		  }
		 
		 
		  $studentstatus = $data['stddetails'][0]->std_status;
		  	 $setmat = $data['stddetails'][0]->matset;
		 
 	 if ($studentstatus == 'new' and $setmat == "0"){
 	      echo '<script type="text/javascript">
			alert("Confirm your generated Registration Number...");
			window.location = "'.base_url('student/matreg').'";
		</script>';
 	     exit;
 	 }
		 
		 $courseModel = new CourseModel();
		 $data['fcoursedetails'] =  $courseModel->getcoursedetails($stdcourse,$fac,$level,'First Semester');
		  $data['scoursedetails'] =  $courseModel->getcoursedetails($stdcourse,$fac,$level,'Second Semester');
		  
		  if ($stdcourse == 2) {
		    $data['tcoursedetails'] =  $courseModel->getcoursedetails($stdcourse,$fac,$level,'Third Semester');  
		  }
		  
		  //check if student registered courses
		  
		   $data['checkcreg'] =  $courseModel->checkcoursereg($sess, session()->get('log_id'));
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/course',$data);
		  echo view('student/footer');  
    }
	
	
	
	
	
	public function dcreg()
    {
		 $accountModel = new AccountModel();
		 
		 
		 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		   $progid = $data['stddetails'][0]->stdprogramme_id;
		   
		   
		    $sess = $accountModel->getsess($progid);
		    
		    
		  //check if portal is closed
		 
		   $pstatus = $accountModel->portalclosing($progid);  
		  if ($pstatus == '0'){
			 echo '<script type="text/javascript">
			alert("Portal is CLOSED to Course Registration");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
		
		
		  $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel , 'fpay' => $fpay ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $stdcourse =  $data['stddetails'][0]->stdcourse;
		 
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($sess,'First Semester', session()->get('log_id'));
		   $data['scourse_details'] =  $courseModel->getregcourse_details($sess,'Second Semester',session()->get('log_id') );
		   
		   	  if ($stdcourse == 2) {
		    $data['tcoursedetails'] = 
		    $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		    
		    
		  }
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/dcourse',$data);
		  echo view('student/footer');  
    }
	
	
	public function rcreg()
    {
		 $accountModel = new AccountModel();
	 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  
		  $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		    
		  $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel , 'fpay' => $fpay ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		   $stdcourse =  $data['stddetails'][0]->stdcourse;  
		 
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($sess,'First Semester', session()->get('log_id'));
		   $data['scourse_details'] =  $courseModel->getregcourse_details($sess,'Second Semester',session()->get('log_id') );
		   
		   if ($stdcourse == 2) {
		    $data['tcourse_details'] =   $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		  }
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/rcourse',$data);
		  echo view('student/footer');  
    }
	
	
	
	
	
	public function hcreg()
    {
		 $accountModel = new AccountModel();
	 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  
		  $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		  $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel , 'fpay' => $fpay ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $stdcourse =  $data['stddetails'][0]->stdcourse;
		 
		 $courseModel = new CourseModel();
		 
		  
		  $data['course_history'] =  $courseModel->getcourse_history(session()->get('log_id') );
		   
		   
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/hcourse',$data);
		  echo view('student/footer');  
    }
	
	
	
	
	
	
	
	
		
			 
    public function pcourse()
    {
		
		$selcourse =  $this->request->getVar('sel_course'); 
		if (empty($selcourse)) {
				  echo '<script type="text/javascript">
			alert("No Course(s) had been selected, Kindly select Course(s) to proceed");
			window.location = "'.base_url('student/creg').'";
		</script>';
			 }else{
		   
			$selectedcourses = $selcourse;
		$accountModel = new AccountModel();
	 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		   $dlevel = $data['stddetails'][0]->level_name;
		    $stdcourse =  $data['stddetails'][0]->stdcourse;
		    $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		   $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  ];
		   $courseModel = new CourseModel();
		   $data['fcoursedetails'] =  $courseModel->getcourse_details($selectedcourses,'First Semester');
		    $data['scoursedetails'] =  $courseModel->getcourse_details($selectedcourses,'Second Semester');
		    
		    if ($stdcourse == 2){
		    $data['tcoursedetails'] =  $courseModel->getcourse_details($selectedcourses,'Third Semester');
		    }
		    
		    echo view('student/header', $datah);
	  		 echo view('student/sidebar');  
       		 echo view('student/previewcourse',$data);
			  echo view('student/footer'); 
		}
	
       	 
    } 
	
	
	 public function savecourse()
    {
		
		$selcourse =  $this->request->getVar('sel_course'); 
		$cregdate = date('Y-m-d');
		if (empty($selcourse)) {
				  echo '<script type="text/javascript">
			alert("No Course(s) had been selected, Kindly select Course(s) to proceed");
			window.location = "'.base_url('student/creg').'";
		</script>';
			 }else{
		     $accountModel = new AccountModel();
		      $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		     $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		     
		     
		 
			$courseModel = new CourseModel();
			
		foreach($selcourse as $selcourses){
		$data['course_details'] =  $courseModel->getcourse_detail($selcourses);	

		$datas = [
            'log_id' => session()->get('log_id'),
            'thecourse_id'  => $selcourses,
			'c_unit' => $data['course_details'][0]->thecourse_unit,
			'clevel_id' => $data['course_details'][0]->levels,
			'cyearsession' => $sess,
			'csemester' => $data['course_details'][0]->semester,
			'cdate_reg' => $cregdate,
			'c_title' => $data['course_details'][0]->thecourse_title,
			'c_code' => $data['course_details'][0]->thecourse_code 
        ]; 	
			
	 	$studentModel = new StudentModel();
		$studentModel->save_courses($datas);
		
}
		 
		 echo '<script type="text/javascript">
			alert("Selected Courses have been successfully Registered\nProceed to Print your registered courses");
			window.location = "'.base_url('student/rcreg').'";
		</script>';
		
		}
	
       	 
    } 
	
	
	  public function rcourse()
    {
		
		$selcourse =  $this->request->getVar('sel_course'); 
		if (empty($selcourse)) {
				  echo '<script type="text/javascript">
			alert("No Course(s) had been selected, Kindly select Course(s) to remove");
			window.location = "'.base_url('student/creg').'";
		</script>';
			 }else{
		   
		$studentModel = new StudentModel();
	
		foreach($selcourse as $selcourses){
		
		 $studentModel->remove_courses($selcourses);
		}
		
		 
		    echo '<script type="text/javascript">
			alert("Selected Courses have been successfully Removed");
			window.location = "'.base_url('student/rcreg').'";
		</script>';
		    
		}
	
       	 
    } 
	
		public function hview()
    {
		 $accountModel = new AccountModel();
		 
		 
		  
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		   $progid = $data['stddetails'][0]->stdprogramme_id;
		   
		   
		    $sess = $accountModel->getsess($progid);
		  
		  //check if portal is closed
		 
		   $pstatus = $accountModel->portalclosing($progid);  
		  if ($pstatus == '0'){
			 echo '<script type="text/javascript">
			alert("Portal is CLOSED for Hostel Allocation");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
		  
		  //hostel details
		  
		   $hostelModel = new HostelModel();
		   
		  $myhostel= $hostelModel->gethostelname($data['stddetails'][0]->std_hostel);
		  $myroom= $hostelModel->getroomno($data['stddetails'][0]->std_room);
		  $mybedspace= $data['stddetails'][0]->std_bedspace;
		  
		  
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel,   'myhostel' => $myhostel, 
		 'myroom' => $myroom, 'mybedspace' => $mybedspace ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		  $gender = $data['stddetails'][0]->gender;
		  $progid = $data['stddetails'][0]->stdprogramme_id;
		 
		  $studentModel = new StudentModel();
		  $data['hostelpay'] =  $studentModel->chk_fee(session()->get('log_id'), $sess, 11); 
		 
		 
		  $data['hosteldetails'] =  $hostelModel->gethosteldetails($fac,$gender,$progid, $level);
			  
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/hostel',$data);
		  echo view('student/footer');  
    }
		
	public function rview()
    {
		 $accountModel = new AccountModel();
	 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		  $gender = $data['stddetails'][0]->gender;
		 $progid = $data['stddetails'][0]->stdprogramme_id;
		 $studentModel = new StudentModel();
		 $data['hostelpay'] =  $studentModel->chk_fee(session()->get('log_id'), $sess, 15); 
		 
		  $hostelModel = new HostelModel();
		  $hdata['roomdetails']  =  $hostelModel->getroomdetails($fac, $gender, $this->request->uri->getSegment(3), $progid, $level);
		 // print_r($hdata['roomdetails']);
		//  echo '<br><br>';  
		  
		  
		  foreach ($hdata['roomdetails'] as $key => $value) {
							
			 
			
			$datas[$key] = array(
				"hid" => $value->hid,
				"roomid" =>$value->roomid,
				"hostelname" =>$value->hostelname,
				"roomno" =>$value->roomno,
				"no_space" =>$value->no_space,
				"allot_bedspace" => $hostelModel->getava_bedspace($value->hid,$value->roomid),
				
 
			);
		} 
		
		
		  $data['roomdetails']  =  $datas;
			 
			// print_r( $rdata['roomdetails']);
			
			     
			 
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/rooms',$data);
		  echo view('student/footer');  
    } 
     
	 
	 
	 public function allocateroom()
    { 
	
	$hostelid = $this->request->uri->getSegment(3);
	$roomid = $this->request->uri->getSegment(4);
	$totspace = $this->request->uri->getSegment(5);
	$sess = $this->request->uri->getSegment(6);
		if (empty($roomid) or empty($hostelid)) {
				  echo '<script type="text/javascript">
			alert("No Room had been selected, Kindly select Room for allocation");
			window.location = "'.base_url('student/hview').'";
		</script>';
			 }else{
		 
	//CHECK if there is space in room and hostel
	
	      $hostelModel = new HostelModel();
		   $ava_bedspace  =  $hostelModel->getava_bedspace($hostelid, $roomid);
		  
		   if ($ava_bedspace >= $totspace){
			   echo '<script type="text/javascript">
			alert("All Spaces in Room had allocated, Kindly select another Room for allocation");
			window.location = "'.base_url('student/rview/'.$hostelid).'";
		</script>';
		   }else{
			    $assign_bedspace = $ava_bedspace + 1;
			   $studentModel = new StudentModel();
			  
			  
			   $data = [  'std_hostel' => $hostelid,
			              'std_room' => $roomid,
						  'std_bedspace' => $assign_bedspace
			
			]; 
			
			$datas = [     'std_id'   => session()->get('log_id'),
			              'std_hostel' => $hostelid,
			              'std_room' => $roomid,
						  'csession' => $sess
			
			];
			
		       $studentModel->allot_room($data, session()->get('log_id'));
		       $studentModel->savehostelinfo($datas);
		 echo '<script type="text/javascript">
			alert("Your Room Allocation is Successful");
			window.location = "'.base_url('student/hview').'";
		</script>';
		   }
		}
		
		
		
		 
    } 
	
	public function printcourse()
    {
		 $accountModel = new AccountModel();
		 
		
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		 
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $dept = $data['stddetails'][0]->departments_name;
		 $matno = $data['stddetails'][0]->matric_no;
		  $stdcourse = $data['stddetails'][0]->programme_option;
		  $fullname = $data['stddetails'][0]->surname. ' '. $data['stddetails'][0]->firstname.' '.$data['stddetails'][0]->othernames;
		  $stdphoto = $data['stddetails'][0]->std_photo;
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>$matno,
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  , 'dept' => $dept,
		  'stdcourse' => $stdcourse, 'fullname' => $fullname, 'stdphoto' => $stdphoto ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $stdcourse =  $data['stddetails'][0]->stdcourse;
		 
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($sess,'First Semester', session()->get('log_id'));
		   $data['scourse_details'] =  $courseModel->getregcourse_details($sess,'Second Semester',session()->get('log_id') );
		   
		   if ($stdcourse == 2) {
		    $data['tcourse_details'] =   $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		  }
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/cregform',$data);
		  echo view('student/footer');  
    }
	
	
	public function printhostel()
    {
		 $accountModel = new AccountModel();
	 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		 
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $dept = $data['stddetails'][0]->departments_name;
		 $matno = $data['stddetails'][0]->matric_no;
		  $stdcourse = $data['stddetails'][0]->programme_option;
		  $fullname = $data['stddetails'][0]->surname. ' '. $data['stddetails'][0]->firstname.' '.$data['stddetails'][0]->othernames;
		  $stdphoto = $data['stddetails'][0]->std_photo;
		  
		  //hostel details
		  
		   $hostelModel = new HostelModel();
		   
		  $myhostel= $hostelModel->gethostelname($data['stddetails'][0]->std_hostel);
		  $myblock = $hostelModel->getblockname($data['stddetails'][0]->std_hostel);
		  $myroom= $hostelModel->getroomno($data['stddetails'][0]->std_room);
		  $mybedspace= $data['stddetails'][0]->std_bedspace;
		  
		  
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>$matno,
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  , 'dept' => $dept,
		  'stdcourse' => $stdcourse, 'fullname' => $fullname, 'stdphoto' => $stdphoto, 'myhostel' => $myhostel, 'myblock' => $myblock, 'myroom' => $myroom
		  , 'mybedspace' => $mybedspace ];
        
		 
		 
		 
		 		   
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/hostelp',$data);
		  echo view('student/footer');  
    }
	
	public function payhistory()
    {
		$studentModel = new StudentModel();
          $accountModel = new AccountModel();
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal',  'cs_session'=> $sess ];
        $data['transdetails'] =  $studentModel->gettranshistory(session()->get('log_id'));
		 
		 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/phistory',$data);
		  echo view('student/footer');  
    }
	
	public function preceipt()
    {   
		 
		  $studentModel = new StudentModel();
          $accountModel = new AccountModel();
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 
		 'cs_session'=> $sess];
        $data['transdetails'] =  $studentModel->gettrans_details($this->request->uri->getSegment(3));
		$data['stddetails'] =  $accountModel->getacctdetails($data['transdetails'][0]->log_id);
		$data['stdphoto'] = $data['stddetails'][0]->std_photo;
		 $data['dept'] = $data['stddetails'][0]->departments_name;
		 $data['cs_session'] = $sess;
	  	 $studentstatus = $data['stddetails'][0]->std_status;
		  	 $setmat = $data['stddetails'][0]->matset;
		 
 	 if ($studentstatus == 'new' and $setmat == "0"){
 	      echo '<script type="text/javascript">
			alert("Confirm your generated Registration Number...");
			window.location = "'.base_url('student/matreg').'";
		</script>';
 	     exit;
 	 }
		 
		 $data['title'] = "CONAMKAT .:: Home | Student Portal";
		// echo view('student/header', $datah);
	  	// echo view('student/sidebar');  
       	 echo view('student/preceipt',$data);
		 // echo view('student/footer');  
		 
    }
	
	
	public function vcourse()
    {
		 $accountModel = new AccountModel();
		 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		    
		 $dsess = $this->request->uri->getSegment(3);
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $dept = $data['stddetails'][0]->departments_name;
		 $matno = $data['stddetails'][0]->matric_no;
		  $stdcourse = $data['stddetails'][0]->programme_option;
		  $fullname = $data['stddetails'][0]->surname. ' '. $data['stddetails'][0]->firstname.' '.$data['stddetails'][0]->othernames;
		  $stdphoto = $data['stddetails'][0]->std_photo;
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>$matno,
		 'cs_session'=> $dsess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  , 'dept' => $dept,
		  'stdcourse' => $stdcourse, 'fullname' => $fullname, 'stdphoto' => $stdphoto ];
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
	 	 $std_course =  $data['stddetails'][0]->stdcourse;  
		 
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($dsess,'First Semester', session()->get('log_id'));
		   $data['scourse_details'] =  $courseModel->getregcourse_details($dsess,'Second Semester',session()->get('log_id') );
		   
		    if ($std_course == 2) {
		    $data['tcourse_details'] =   $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		  }
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/cregform',$data);
		  echo view('student/footer');  
    }
	
	
	public function hfee()
    {
		 $accountModel = new AccountModel();
		 
	 
		 
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		   $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		    
		 $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat,  'fpay' => $fpay ];
        
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
	  
	 
	  $studentstatus = $data['stddetails'][0]->std_status;
		 $setmat = $data['stddetails'][0]->matset;
		  $progid = $data['stddetails'][0]->stdprogramme_id;
		  
		 $pstatus = $accountModel->portalclosing($progid);  
		  if ($pstatus == '0'){
			 echo '<script type="text/javascript">
			alert("Portal is CLOSED to Hostel/Accomodation Payment");
			window.location = "'.base_url('student/').'";
		</script>';
			exit;
		} 
		 
 	 if ($studentstatus == 'new' and $setmat == "0"){
 	      echo '<script type="text/javascript">
			alert("Confirm your generated Registration Number...");
			window.location = "'.base_url('student/matreg').'";
		</script>';
 	     exit;
 	 }
 	 
 	 
		 $feeModel = new FeeModel();
		 $data['feedetails'] =  $feeModel->gethfeedetails();
	
		
		$data['hostelpay'] =  $studentModel->chk_fee(session()->get('log_id'), $sess, 11); 
		
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		  $gender = $data['stddetails'][0]->gender;
		  $progid = $data['stddetails'][0]->stdprogramme_id;
		  
		  
		   if ($progid == 2){
 	      echo '<script type="text/javascript">
			alert("Sorry, Post Basic Nursing is not entitled to Hostel Allocation");
			window.location = "'.base_url('student/').'";
		</script>';
 	     exit;
 	 }
 	 
		  
		$hostelModel = new HostelModel();
		$data['hosteldetails'] =  $hostelModel->gethosteldetails($fac,$gender,$progid, $level);
		

		foreach ($data['hosteldetails'] as $key => $value) {
							
	
			$datas[$key] = array(
				"hid" => $value->hid,
				"hostelname" =>$value->hostelname,
				"total_space" =>$value->totspace,
			 	"allotedbedspace" => $hostelModel->getallot_bedspace($value->hid)
			);
		} 
	
	 	 $data['alotdetails']  =  $datas;
		  
	 //print_r($data['alotdetails']);
		
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/hfee',$data);
		  echo view('student/footer');  
    }
	
	
	
	
	public function hreserve()
    {
		 $accountModel = new AccountModel();
		  
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  
		  $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  
		  //hostel details
		  
		   $hostelModel = new HostelModel();
		   
		  $myhostel= $hostelModel->gethostelname($data['stddetails'][0]->std_hostel);
		  $myblock = $hostelModel->getblockname($data['stddetails'][0]->std_hostel);
		  $myroom= $hostelModel->getroomno($data['stddetails'][0]->std_room);
		  $mybedspace= $data['stddetails'][0]->std_bedspace;
		  
		  
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel,   'myhostel' => $myhostel,  'myblock' => $myblock,
		 'myroom' => $myroom, 'mybedspace' => $mybedspace ];
		 
		  
        
		 
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		  $gender = $data['stddetails'][0]->gender;
		  $progid = $data['stddetails'][0]->stdprogramme_id;
		 
		 $studentModel = new StudentModel();
		 $data['hostelpay'] =  $studentModel->chk_fee(session()->get('log_id'), $sess, 11); 
		 
		 
		 $data['hosteldetails'] =  $hostelModel->gethosteldetails($fac,$gender,$progid, $level);
			  
			
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/myhostel',$data);
		  echo view('student/footer');  
    }
	
	
	public function print_biodata()
    {
		 $accountModel = new AccountModel();
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $appyear,  'pstat' => $pstat,  'csstat' => $csstat ];
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
       	  
       	 echo view('student/profilep',$data);
		  
    }
	
	
	public function printcourses()
    {
		 $accountModel = new AccountModel();
		// $sess = $accountModel->getsess();
		 $sess = $this->request->uri->getSegment(3);
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		 
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $dept = $data['stddetails'][0]->departments_name;
		 $matno = $data['stddetails'][0]->matric_no;
	 	  $stdcourses = $data['stddetails'][0]->programme_option;
		  $fullname = $data['stddetails'][0]->surname. ' '. $data['stddetails'][0]->firstname.' '.$data['stddetails'][0]->othernames;
		  $stdphoto = $data['stddetails'][0]->std_photo;
       
        
	  
		 $fac = $data['stddetails'][0]->stdfaculty_id;
	  	 $level = $data['stddetails'][0]->stdlevel;
	   	 $stdcourse =  $data['stddetails'][0]->stdcourse;  
		 		
      $data  = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>$matno,
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  , 'dept' => $dept,
		  'stdcourses' => $stdcourses, 'fullname' => $fullname, 'stdphoto' => $stdphoto ];
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($sess,'First Semester', session()->get('log_id'));
		  
		  if (empty($data['fcourse_details'])) {
		      echo '<script type="text/javascript">
			alert("No Course had been registered in this Session");
			window.location = "'.base_url('student/').'";
		</script>';
		  }
		  
		  
		  
		  
		   $data['scourse_details'] =  $courseModel->getregcourse_details($sess,'Second Semester',session()->get('log_id') );
		   
		    if ($stdcourse == 2) {
		    $data['tcourse_details'] = $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		  }
	
	    
       	 echo view('student/creg_form',$data);
		 
    }
    
    public function remitaresponse()
	{
		  $stdid =  session()->get('log_id') ;
	        $orderId = $this->request->uri->getSegment(3);
	         define("MERCHANTID", "5155065960");
			 define("APIKEY", "168405");			
			 define("CHECKSTATUSURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc"); 
			 
			  
				  $mert =  MERCHANTID;
				  $api_key =  APIKEY;
				  $concatString = $orderId . $api_key . $mert;
		          $hash = hash('sha512', $concatString);
		          $url 	= CHECKSTATUSURL . '/' . $mert  . '/' . $orderId . '/' . $hash . '/' . 'status.reg';
				  $ch = curl_init();
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL,$url);
				$result=curl_exec($ch);
				curl_close($ch);
				$response = json_decode($result, true);
				$response_code = $response['status'];
				$response_message = $response['message'];
				if($response_code == '01' || $response_code == '00') { 
				 $rrr = $response['RRR'];
				 $orderId = $response['orderId'];
				 $ttime = $response['transactiontime'];
				 $payment_date = date('Y-m-d H:i:s');
				$pt_date  = date("Y-m-d", strtotime($payment_date));
				
				$data = [
            'pay_status'  => 'Paid',
			'trans_date' => $payment_date,
            't_date'  => $pt_date 
			
        ]; 
		
 
				$studentModel = new StudentModel();
				$studentModel->update_transaction($data,$rrr);
				
				echo '<script type="text/javascript">
			alert("'.$response_message.'\nYour Payment is Successfully and your account will be updated.");
				window.location = "'.base_url('student/payhistory').'";
		</script>';
			}else{
		
		 echo '<script type="text/javascript">
			alert("Payment Not Made\n Reason: '.$response_message.'");
			window.location = "'.base_url('student/').'";
		</script>';
		
		
		
		} 
	 
	}
	
	public function matreg()
    {
        $accountModel = new AccountModel();
		  
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
		    
		    
         $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
		 
		   if (empty($fpay)) { 
		       
		       	 echo '<script type="text/javascript">
			alert("Pay your Fees before you can generate Registration Number");
			window.location = "'.base_url('student/').'";
		</script>';
		       
		       exit;
		   } 
		 
		 
		    $appsess = substr($sess+1,2,4);
		   $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		   $fac = $accountModel->getfac_code($data['stddetails'][0]->stdfaculty_id);
		   $pcode = $accountModel->getprog_code($data['stddetails'][0]->stdcourse);
	  	   $dnos = $studentModel->getstdregno($data['stddetails'][0]->stdcourse, $sess, session()->get('log_id'));
	
	
 
	
	
		    $app_no = "$fac$pcode$appsess$dnos";
		 
		  
		 
        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $appyear,  'pstat' => $pstat,  'regno' => $app_no ];
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
       	 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/regmat',$data);
		  echo view('student/footer');  
    }
    
    
    public function updateregno()
    {
		
		
		 if($this->request->getMethod()=='post')
        { 
		  $accountModel = new AccountModel();
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		  $prog = $data['stddetails'][0]->stdprogramme_id; 
		    $sess = $accountModel->getsess($prog);
         $studentModel = new StudentModel();
		 $fpay = $studentModel->get_feeamt(session()->get('log_id'), $sess); 
		 
		   if (empty($fpay)) { 
		       
		       	 echo '<script type="text/javascript">
			alert("Pay your Fees before you can generate Registration Number");
			window.location = "'.base_url('student/').'";
		</script>';
		       
		       exit;
		   } 
		 
		 
		    $appsess = substr($sess+1,2,4);
		   $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		   $fac = $accountModel->getfac_code($data['stddetails'][0]->stdfaculty_id);
		   $pcode = $accountModel->getprog_code($data['stddetails'][0]->stdcourse);
	  	   $dnos = $studentModel->getstdregno($data['stddetails'][0]->stdcourse, $sess, session()->get('log_id'));

		    $app_no = "$fac$pcode$appsess$dnos";
			 $matricno = $data['stddetails'][0]->matric_no;	
				
			$datas = [
            'matric_no' => "$app_no",
            'matset'  => "$matricno" 
        ]; 
        
        $datal = [
            'log_username' => "$app_no"
        ]; 
        
       // print_r($datas);
       // print_r($datal);
				
			//	exit;
				$studentModel->update_sregno($datas, session()->get('log_id'));
				$studentModel->update_lregno($datal, session()->get('log_id'));
				
				
			
				 echo '<script type="text/javascript">
			alert("Registration Number have been successfully Updated");
			window.location = "'.base_url('student/').'";
		</script>';
		}else{
			 echo '<script type="text/javascript">
			alert("Error Updating Biodata");
			window.location = "'.base_url('student/').'";
		</script>';
		}
    }
    
    public function requeryrrr()
	{
		 
		 $data = [];
		 
			$studentModel = new StudentModel();
			 $stdid =  session()->get('log_id') ;
			 $rs = $studentModel->getrrr(session()->get('log_id'));
			 if (empty($rs)) {
				  echo '<script type="text/javascript">
			alert("No Transaction had been generated\nKindly generate payment using the `Fee Payment` Link");
			window.location = "'.base_url('student/').'";
		</script>';
			 }else{
			 
			 define("MERCHANTID", "5155065960");
			 define("APIKEY", "168405");			
			 define("CHECKSTATUSURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc");
			
			
			  foreach ($rs as $r) {
				  
				  $orderId =  $r->rrr;	  
				  $mert =  MERCHANTID;
				  $api_key =  APIKEY;
				  $concatString = $orderId . $api_key . $mert;
		          $hash = hash('sha512', $concatString);
		          $url 	= CHECKSTATUSURL . '/' . $mert  . '/' . $orderId . '/' . $hash . '/' . 'status.reg';
				  $ch = curl_init();
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL,$url);
				$result=curl_exec($ch);
				curl_close($ch);
				$response = json_decode($result, true);
				$response_code = $response['status'];
				$response_message = $response['message'];
				if($response_code == '01' || $response_code == '00') { 
				 $rrr = $response['RRR'];
				 $orderId = $response['orderId'];
				 $ttime = $response['transactiontime'];
				 $payment_date = date('Y-m-d H:i:s');
				$pt_date  = date("Y-m-d", strtotime($payment_date));
				
			 
				 	$data = [
            'pay_status'  => 'Paid',
			'trans_date' => $payment_date,
            't_date'  => $pt_date 
			
        ]; 
			
				$studentModel->update_transaction($data,$rrr );
				
				echo '<script type="text/javascript">
			alert("'.$response_message.'\nYour Payment is Successfully and your account will be updated.");
				window.location = "'.base_url('student/payhistory').'";
		</script>';
			}else{
		
		 echo '<script type="text/javascript">
			alert("Payment Not Made\n Reason: '.$response_message.'");
			window.location = "'.base_url('student/payhistory').'";
		</script>';
		
		
		
		}  

			  }
			  }
			  exit;
              
  
	}
	
		public function paysundry()
    {
		
	 
	 	    $totalamt = 3000;  
			 
		 
		//get account type
		$accttype = "revenue";
		  
		
		 
		 $accountModel = new AccountModel();
		 
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		  $state = $data['stddetails'][0]->state_of_origin;
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		   
	 
		    $sess = $accountModel->getsess($prog);
		    
		    
				 ///get RRR
			define("MERCHANTID", "5155065960");
		    define("SERVICETYPEID", "5135210542"); // processing fee 
			 $acctno = "1006379307";
		 
			 
			 
			 define("APIKEY", "168405");
			 define("GATEWAYURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			 define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
			 $portalfee = 325;
			 $totalAmount = $totalamt + $portalfee;
           	 	$mytotal_amount = number_format($totalAmount);
				$merchantId = MERCHANTID;
				$timesammp=DATE("dmyHis");		
				$orderID = $timesammp;
				$payerName = "$surname $firstname $othernames - $appno";
				$payerEmail =  $semail;
				$payerPhone =  $sgsm;
				$responseurl = PATH . "/remitaresponse.php";
				$hash_string = MERCHANTID . SERVICETYPEID . $orderID . $totalAmount . APIKEY;
				$hash = hash('sha512', $hash_string);
				$itemtimestamp = $timesammp;


				$itemid1="itemid1";
				$itemid2="itemid2";
				
				$beneficiaryName="Katsina State College of Nursing";
				$beneficiaryName2="Atarah Consulting and Mentoring";

				$beneficiaryAccount="$acctno";  //revenue
				$beneficiaryAccount2="0061171696"; //atarah

				$bankCode="082";
				$bankCode2="232";

				
				$school_share = $totalAmount - $portalfee;
				 
 
				$beneficiaryAmount ="$school_share";
				$beneficiaryAmount2 ="$portalfee";
			 

				$deductFeeFrom=0;
				$deductFeeFrom2=1;
			 
	
 			  	$content = '{"serviceTypeId":"'.SERVICETYPEID
					.'"'.",".'"amount":"'.$totalAmount
					.'","orderId":"'.$orderID
					.'"'.',"payerName":"'. $payerName
					.'"'.',"payerEmail":"'.$payerEmail
					.'"'.",".'"payerPhone":"'.$payerPhone
					.'","lineItems":[
					{"lineItemsId":"'.$itemid1.'","beneficiaryName":"'.$beneficiaryName.'","beneficiaryAccount":"'.$beneficiaryAccount.'","bankCode":"'.$bankCode.'","beneficiaryAmount":"'.$beneficiaryAmount.'","deductFeeFrom":"'.$deductFeeFrom.'"},
					{"lineItemsId":"'.$itemid2.'","beneficiaryName":"'.$beneficiaryName2.'","beneficiaryAccount":"'.$beneficiaryAccount2.'","bankCode":"'.$bankCode2.'","beneficiaryAmount":"'.$beneficiaryAmount2.'","deductFeeFrom":"'.$deductFeeFrom2.'"}
					]}';  
  
					$curl = curl_init();
					curl_setopt_array($curl, array(
 					 CURLOPT_URL => GATEWAYURL,
  					CURLOPT_RETURNTRANSFER => true,
  					CURLOPT_SSL_VERIFYPEER => false,
  					CURLOPT_ENCODING => "",
  					CURLOPT_MAXREDIRS => 10,
 				 	CURLOPT_TIMEOUT => 30,
  					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					CURLOPT_CUSTOMREQUEST => "POST",
  					CURLOPT_POSTFIELDS => $content,
  					CURLOPT_HTTPHEADER => array(
    				"Authorization: remitaConsumerKey=$merchantId,remitaConsumerToken=$hash",
    				"Content-Type: application/json",
    				"cache-control: no-cache"
  					),
					));

					$json_response = curl_exec($curl);
					
				//	var_dump($json_response); exit;
					$err = curl_error($curl);
					curl_close($curl);

					$jsonData = substr($json_response, 7, -1);
					$response = json_decode($jsonData, true); 

					$statuscode = $response['statuscode'];
					if($statuscode=='025'){
        $rrr = trim($response['RRR']); 
 					

//end get RRR
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
	 
			$field_name = "Sundry"; 
		    $field_amount = $totalamt; 
			
			
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $field_amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "Remita",
			'fee_id' => 23,
			'fee_type' => "fees",
			'rrr' => $rrr,
        ]; 
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
//}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  RRR for Payment is '.$rrr.' \n Payment can be made using your ATM Card or at any Bank Branch");
			window.location = "paymentslip/'.$rrr.'";
		</script>';
			
					}
					
					
			 }
	
	
		public function testpaynow()
    {
        
        
		 $accountModel = new AccountModel();
		  
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		 
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		   
		    
		    $sess = $accountModel->getsess($prog);
		    
		   
		   $stateor = $data['stddetails'][0]->state_of_origin;
		  if ($stateor == 20){
		      $ind = 1;
		      
		  }else{
		      $ind = 2;
		      
		  }
		   
		 $feeModel = new FeeModel();
		 $feedetails =  $feeModel->getfeedetails($prog,$fac,$level,$new_return, $ind, $sess);
		 
	
		 
		  if (empty($feedetails)) {
				  echo '<script type="text/javascript">
			alert("No Fee Details had been generated or Configured\nKindly confirm from bursary");
			window.location = "'.base_url('student/fees').'";
		</script>';
			 }else{
				
				foreach($feedetails as $fee_detail){
			$totalamt += $fee_detail->amount; 
		}
		
				 ///get RRR
			define("MERCHANTID", "5155065960");
			 define("SERVICETYPEID", "6752225452"); // e revenue
			 define("APIKEY", "168405");
			 define("GATEWAYURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			 define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
			 $portalfee =1200;
			 $processingfee = 325;
			 $totalAmount = $totalamt + $processingfee;
           	 	$mytotal_amount = number_format($totalAmount);
				$merchantId = MERCHANTID;
				$timesammp=DATE("dmyHis");		
				$orderID = $timesammp;
				$payerName = "$surname $firstname $othernames - $appno";
				$payerEmail =  $semail;
				$payerPhone =  $sgsm;
				$responseurl = PATH . "/remitaresponse.php";
				$hash_string = MERCHANTID . SERVICETYPEID . $orderID . $totalAmount . APIKEY;
				$hash = hash('sha512', $hash_string);
				$itemtimestamp = $timesammp;


				$itemid1="itemid1";
				$itemid2="itemid2";
				$itemid3="itemid3";
				
				$beneficiaryName="Katsina State College of Nursing";
				$beneficiaryName2="Katsina State College of Nursing";
				$beneficiaryName3="Atarah Consulting and Mentoring";

				$beneficiaryAccount="1006379307";  //revenue
				$beneficiaryAccount2="1006486193"; //custody
				$beneficiaryAccount3="0061171696"; //atarah

				$bankCode="082";
				$bankCode2="082";
				$bankCode3="232";

				$techfee = $portalfee + $processingfee;
				$school_share = $totalAmount - $techfee;
				
				
				//get revenue
				$rev_amt = $feeModel->getfee_amt_split($prog,$fac,$level,$new_return,$ind, $sess, "revenue");//revenue
				foreach($rev_amt as $rev_amts){
			$revenue += $rev_amts->amount; 
		     }
		     echo $revenue;
		     
		//get custody
		$cus_amt = $feeModel->getfee_amt_split($prog,$fac,$level,$new_return,$ind, $sess, "custody");//custody
				foreach($cus_amt as $cus_amts){
			$custody += $cus_amts->amount; 
		     }
				 
				 
 
				$beneficiaryAmount ="$revenue";
				$beneficiaryAmount2 ="$custody";
				$beneficiaryAmount3 ="$techfee";

				$deductFeeFrom=0;
				$deductFeeFrom2=0;
				$deductFeeFrom3=1;

	
			  echo	 $content = '{"serviceTypeId":"'.SERVICETYPEID
					.'"'.",".'"amount":"'.$totalAmount
					.'","orderId":"'.$orderID
					.'"'.',"payerName":"'. $payerName
					.'"'.',"payerEmail":"'.$payerEmail
					.'"'.",".'"payerPhone":"'.$payerPhone
					.'","lineItems":[
					{"lineItemsId":"'.$itemid1.'","beneficiaryName":"'.$beneficiaryName.'","beneficiaryAccount":"'.$beneficiaryAccount.'","bankCode":"'.$bankCode.'","beneficiaryAmount":"'.$beneficiaryAmount.'","deductFeeFrom":"'.$deductFeeFrom.'"},
					{"lineItemsId":"'.$itemid2.'","beneficiaryName":"'.$beneficiaryName2.'","beneficiaryAccount":"'.$beneficiaryAccount2.'","bankCode":"'.$bankCode2.'","beneficiaryAmount":"'.$beneficiaryAmount2.'","deductFeeFrom":"'.$deductFeeFrom2.'"},
					{"lineItemsId":"'.$itemid3.'","beneficiaryName":"'.$beneficiaryName3.'","beneficiaryAccount":"'.$beneficiaryAccount3.'","bankCode":"'.$bankCode3.'","beneficiaryAmount":"'.$beneficiaryAmount3.'","deductFeeFrom":"'.$deductFeeFrom3.'"}
					]}'; 
  
					$curl = curl_init();
					curl_setopt_array($curl, array(
 					 CURLOPT_URL => GATEWAYURL,
  					CURLOPT_RETURNTRANSFER => true,
  					CURLOPT_SSL_VERIFYPEER => false,
  					CURLOPT_ENCODING => "",
  					CURLOPT_MAXREDIRS => 10,
 				 	CURLOPT_TIMEOUT => 30,
  					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					CURLOPT_CUSTOMREQUEST => "POST",
  					CURLOPT_POSTFIELDS => $content,
  					CURLOPT_HTTPHEADER => array(
    				"Authorization: remitaConsumerKey=$merchantId,remitaConsumerToken=$hash",
    				"Content-Type: application/json",
    				"cache-control: no-cache"
  					),
					));

					$json_response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);

					$jsonData = substr($json_response, 7, -1);
					$response = json_decode($jsonData, true);var_dump($response);  exit;
					$statuscode = $response['statuscode'];
					if($statuscode=='025'){
        $rrr = trim($response['RRR']); 
 					

//end get RRR
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
		foreach($feedetails as $feedetail){
			 
		
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $feedetail->field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $feedetail->amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "Remita",
			'fee_id' => $feedetail->item_id,
			'fee_type' => "fees",
			'rrr' => $rrr,
        ]; 
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  RRR for Payment is '.$rrr.' \n Payment can be made using your ATM Card or at any Bank Branch");
			window.location = "paymentslip/'.$rrr.'";
		</script>';
			
					}else{
					    
					    	echo '<script type="text/javascript">
			alert("There is an issue generating Remita RRR\n Kindly check back later and bear with Us");
			window.location = "fees";
		</script>';
					    
					}
					
					
					
				 
		
			 }
    }
    
   public function printexam_card()
    {
		 $accountModel = new AccountModel();
		// $sess = $accountModel->getsess();
		 $sess = $this->request->uri->getSegment(3);
		  $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		 
		  $school = $data['stddetails'][0]->faculties_name;
		  $dlevel = $data['stddetails'][0]->level_name;
		  $dept = $data['stddetails'][0]->departments_name;
		 $matno = $data['stddetails'][0]->matric_no;
	 	  $stdcourses = $data['stddetails'][0]->programme_option;
		  $fullname = $data['stddetails'][0]->surname. ' '. $data['stddetails'][0]->firstname.' '.$data['stddetails'][0]->othernames;
		  $stdphoto = $data['stddetails'][0]->std_photo;
       $progname = $data['stddetails'][0]->programme_name;
        
	  
		 $fac = $data['stddetails'][0]->stdfaculty_id;
	  	 $level = $data['stddetails'][0]->stdlevel;
	   	 $stdcourse =  $data['stddetails'][0]->stdcourse;  
		 		
      $data  = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>$matno,
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat , 'school' => $school , 'dlevel' => $dlevel  , 'dept' => $dept,
		  'stdcourses' => $stdcourses, 'fullname' => $fullname, 'stdphoto' => $stdphoto, 'progname' => $progname ];
		 $courseModel = new CourseModel();
		 
		  
		  $data['fcourse_details'] =  $courseModel->getregcourse_details($sess,'First Semester', session()->get('log_id'));
		  
		  if (empty($data['fcourse_details'])) {
		      echo '<script type="text/javascript">
			alert("No Course had been registered in this Session");
			window.location = "'.base_url('student/').'";
		</script>';
		  }
		  
		  
		  
		  
		   $data['scourse_details'] =  $courseModel->getregcourse_details($sess,'Second Semester',session()->get('log_id') );
		   
		    if ($stdcourse == 2) {
		    $data['tcourse_details'] = $courseModel->getregcourse_details($sess,'Third Semester',session()->get('log_id') );
		  }
	
	    
       	 echo view('student/ecard',$data);
		 
    }
    
    
    	public function paynow_partial()
    {
        
        
		 $accountModel = new AccountModel();
	  	 
		 
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		 
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		    
		    $sess = $accountModel->getsess($prog);
		   
		   $stateor = $data['stddetails'][0]->state_of_origin;
		  if ($stateor == 20){
		      $ind = 1;
		      
		  }else{
		      $ind = 2;
		      
		  }
		  
		  //check eligibilty
		  $exclude = $accountModel->exclude($appno);
		  
		   if (empty($exclude)) {
				  echo '<script type="text/javascript">
			alert("You are not Eligible for this service");
			window.location = "'.base_url('student/fees').'";
		</script>';
			 }
		   
		 $feeModel = new FeeModel();
		 
	 	//  $checklatepay = $accountModel->getlatepay();  
		 
		 
		  $latepay = $accountModel->getlatepay($prog);    
		  
	 
		 
		 
		 $feedetails =  $feeModel->getfeedetails_partial($prog,$fac,$level,$new_return, $ind, $sess, $latepay);
		 
	
		 
		  if (empty($feedetails)) {
				  echo '<script type="text/javascript">
			alert("No Fee Details had been generated or Configured\nKindly confirm from bursary");
			window.location = "'.base_url('student/fees').'";
		</script>';
			 }else{
				
				foreach($feedetails as $fee_detail){
			$totalamt += $fee_detail->amount; 
		}
		
				 ///get RRR
			define("MERCHANTID", "5155065960");
		    define("SERVICETYPEID", "6752225452"); // e revenue
			 define("APIKEY", "168405");
			 define("GATEWAYURL", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
			 define("GATEWAYRRRPAYMENTURL", "https://login.remita.net/remita/ecomm/finalize.reg");
			 define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
			 $portalfee =1200;
			 $processingfee = 325;
			 $totalAmount = $totalamt + $processingfee;
           	 	$mytotal_amount = number_format($totalAmount);
				$merchantId = MERCHANTID;
				$timesammp=DATE("dmyHis");		
				$orderID = $timesammp;
				$payerName = "$surname $firstname $othernames - $appno";
				$payerEmail =  $semail;
				$payerPhone =  $sgsm;
				$responseurl = PATH . "/remitaresponse.php";
				$hash_string = MERCHANTID . SERVICETYPEID . $orderID . $totalAmount . APIKEY;
				$hash = hash('sha512', $hash_string);
				$itemtimestamp = $timesammp;


				$itemid1="itemid1";
				$itemid2="itemid2";
				$itemid3="itemid3";
				
				$beneficiaryName="Katsina State College of Nursing";
				$beneficiaryName2="Katsina State College of Nursing";
				$beneficiaryName3="Atarah Consulting and Mentoring";

				$beneficiaryAccount="1006379307";  //revenue
				$beneficiaryAccount2="1006486193"; //custody
				$beneficiaryAccount3="0061171696"; //atarah

				$bankCode="082";
				$bankCode2="082";
				$bankCode3="232";

				$techfee = $portalfee + $processingfee;
				$school_share = $totalAmount - $techfee;
				
				
				//get revenue
				if ($stateor == 20){
				 
			$revenue  = 4000; 
				}else{
				  	$revenue  = 34000;  
				}
		//get custody
		 
			$custody  = 2700; 
		     
				 
				 
 
				$beneficiaryAmount ="$revenue";
				$beneficiaryAmount2 ="$custody";
				$beneficiaryAmount3 ="$techfee";

				$deductFeeFrom=0;
				$deductFeeFrom2=0;
				$deductFeeFrom3=1;

	
			     	 $content = '{"serviceTypeId":"'.SERVICETYPEID
					.'"'.",".'"amount":"'.$totalAmount
					.'","orderId":"'.$orderID
					.'"'.',"payerName":"'. $payerName
					.'"'.',"payerEmail":"'.$payerEmail
					.'"'.",".'"payerPhone":"'.$payerPhone
					.'","lineItems":[
					{"lineItemsId":"'.$itemid1.'","beneficiaryName":"'.$beneficiaryName.'","beneficiaryAccount":"'.$beneficiaryAccount.'","bankCode":"'.$bankCode.'","beneficiaryAmount":"'.$beneficiaryAmount.'","deductFeeFrom":"'.$deductFeeFrom.'"},
					{"lineItemsId":"'.$itemid2.'","beneficiaryName":"'.$beneficiaryName2.'","beneficiaryAccount":"'.$beneficiaryAccount2.'","bankCode":"'.$bankCode2.'","beneficiaryAmount":"'.$beneficiaryAmount2.'","deductFeeFrom":"'.$deductFeeFrom2.'"},
					{"lineItemsId":"'.$itemid3.'","beneficiaryName":"'.$beneficiaryName3.'","beneficiaryAccount":"'.$beneficiaryAccount3.'","bankCode":"'.$bankCode3.'","beneficiaryAmount":"'.$beneficiaryAmount3.'","deductFeeFrom":"'.$deductFeeFrom3.'"}
					]}'; 
  
					$curl = curl_init();
					curl_setopt_array($curl, array(
 					 CURLOPT_URL => GATEWAYURL,
  					CURLOPT_RETURNTRANSFER => true,
  					CURLOPT_SSL_VERIFYPEER => false,
  					CURLOPT_ENCODING => "",
  					CURLOPT_MAXREDIRS => 10,
 				 	CURLOPT_TIMEOUT => 30,
  					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  					CURLOPT_CUSTOMREQUEST => "POST",
  					CURLOPT_POSTFIELDS => $content,
  					CURLOPT_HTTPHEADER => array(
    				"Authorization: remitaConsumerKey=$merchantId,remitaConsumerToken=$hash",
    				"Content-Type: application/json",
    				"cache-control: no-cache"
  					),
					));   

					$json_response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);
 //var_dump($json_response);  exit;
					$jsonData = substr($json_response, 7, -1);
					$response = json_decode($jsonData, true);  
					$statuscode = $response['statuscode'];
					if($statuscode=='025'){
        $rrr = trim($response['RRR']); 
 					

//end get RRR
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
		foreach($feedetails as $feedetail){
			 
		
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $feedetail->field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $feedetail->amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "Remita",
			'fee_id' => $feedetail->item_id,
			'fee_type' => "fees",
			'rrr' => $rrr,
        ]; 
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  RRR for Payment is '.$rrr.' \n Payment can be made using your ATM Card or at any Bank Branch");
			window.location = "paymentslip/'.$rrr.'";
		</script>';
			
					}else{
					    
					    	echo '<script type="text/javascript">
			alert("There is an issue generating Remita RRR\n Kindly check back later and bear with Us");
			window.location = "fees";
		</script>';
					    
					}
					
					
					
				 
		
			 }
    }
    
    
    public function payhostelfee()
    {
		
		$selfee =  $this->request->getVar('selfee'); 
		
		if (empty($selfee)) {
				  echo '<script type="text/javascript">
			alert("No Fee had been selected, Kindly select Fee item(s) to proceed");
			window.location = "'.base_url('student/ofee').'";
		</script>';
			 }else{
		    $feeModel = new FeeModel();
			//foreach ($selfee as $selfees) {
	 		 $totalamt = $feeModel->getofee_amt($selfee);
			//}
		}
		
		//get account type
		$accttype = $feeModel->getacct_type($selfee);
		  
		
		 
		 $accountModel = new AccountModel();
		 
         $data['stddetails'] =  $accountModel->getacctdetails(session()->get('log_id'));
		$prog = $data['stddetails'][0]->stdprogramme_id;
		
		  
		    $sess = $accountModel->getsess($prog);
		    
		 $fac = $data['stddetails'][0]->stdfaculty_id;
		 $level = $data['stddetails'][0]->stdlevel;
		 $new_return = $data['stddetails'][0]->std_status;
		  $state = $data['stddetails'][0]->state_of_origin;
		  $appno = $data['stddetails'][0]->matric_no;
		  $surname = $data['stddetails'][0]->surname;
		  $firstname = $data['stddetails'][0]->firstname;
		  $othernames = $data['stddetails'][0]->othernames;
		   $semail = $data['stddetails'][0]->student_email;
		   $sgsm = $data['stddetails'][0]->student_mobiletel;
		   $stdcourse = $data['stddetails'][0]->stdcourse;
		
 
	    $tid = session()->get('log_id').$timesammp;
		$fdate = date('Y-m-d h:i:s');
		$tdate = date('Y-m-d');
		
	        	$rrr = 'F'.$tid.DATE("dmyHis");;
					 $pc_status = "091";
 		 if($pc_status == '091'){
    
        
        
        
		//foreach($selfee as $feedetail){
			$field_name = $feeModel->getofee_name($selfee); 
		    $field_amount = $feeModel->getofee_amt($selfee); 
			
			
		$data = [
            'log_id' => session()->get('log_id'),
            'trans_name'  => $field_name,
			'trans_no' => $tid,
			'user_faculty' => $fac,
			'trans_amount' => $field_amount,
			'generated_date' => $fdate,
			'trans_date' => $fdate,
			't_date' => $tdate,
			't_date' => $tdate,
			'levelid' => $level,
			'trans_year' => $sess,
			'fullnames' => "$surname $firstname $othernames",
			'prog_id' => $prog,
			'stdcourse' => $stdcourse,
			'appno' => $appno,
			'channel' => "ATMCard",
			'fee_id' => $selfee,
			'fee_type' => "ofees",
			'rrr' => $rrr,
        ];  
       // print_r($data);
       // exit;
	 	$studentModel = new StudentModel();
		$studentModel->save_transaction($data);
		
//}
			echo '<script type="text/javascript">
			alert("You will be redirected to the payment gateway\n Your  Payment Reference for Payment is '.$rrr.' \n Payment can be made ONLY Online with  your ATM Card");
			window.location = "hostelpaymentslip/'.$rrr.'";
		</script>';
			
					}
					
					
			 }
			 

	public function hostelpaymentslip()
    {   
		 
		  $studentModel = new StudentModel();

        $datah = ['title' => 'CONAMKAT .:: Home | Student Portal', 'matno'=>session()->get('matno'),
		 'cs_session'=> $sess,  'pstat' => $pstat,  'csstat' => $csstat ];
        $data['transdetails'] =  $studentModel->gettransdetails($this->request->uri->getSegment(3));
		 echo view('student/header', $datah);
	  	 echo view('student/sidebar');  
       	 echo view('student/hostelpayslip',$data);
		  echo view('student/footer');  
		 
    }
    
    	public function  fpaystatus ()
    {
		  $flw_ref = $_REQUEST['flw_ref'];
		  $tran_id =  $_REQUEST['transaction_id'];
		   $txnref =  $_REQUEST['tx_ref'];
		 
		  $studentModel = new StudentModel();
		 
		 $curl = curl_init();
     	 curl_setopt_array($curl, array(
   		 CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$tran_id."/verify",
   		 CURLOPT_RETURNTRANSFER => true,
   		 CURLOPT_ENCODING => "",
  		  CURLOPT_MAXREDIRS => 10,
   		 CURLOPT_TIMEOUT => 0,
   		 CURLOPT_FOLLOWLOCATION => true,
   		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   		 CURLOPT_CUSTOMREQUEST => "GET",
   		 CURLOPT_HTTPHEADER => array(
    		  "Content-Type: application/json",
    	  "Authorization: Bearer FLWSECK-6acc7a074a5c6b00a990ea87ca374649-X"
     
    ),
  ));


  $response = curl_exec($curl);

  curl_close($curl);

  $txn_api = json_decode($response);

  //var_dump($txn_api); exit;
 	  	$flw_amount = $txn_api->data->amount;    
       $flw_id = $txn_api->data->id;  
         $flw_tx_ref = $txn_api->data->tx_ref; 
      $flw_flw_ref = $txn_api->data->flw_ref; 
         $flw_c_status = $txn_api->data->status;    
		
	 	$amtpaid =   $studentModel->getamtpaid(session()->get('log_id'), $flw_tx_ref) + 325 ;
		

		
      if($flw_c_status=='successful' and ($flw_amount >= $amtpaid )){
  				$payment_date = date('Y-m-d H:i:s');
				$pt_date  = date("Y-m-d", strtotime($payment_date));
				
			  	 $data =  [ 
				 'pay_status' => 'Paid',
				'flw_id' =>  $flw_id,
				'flw_flw_ref' =>  $flw_flw_ref,
				'trans_date' => $payment_date, 
				't_date'  => $pt_date
					] ; 
				//	print_r($data);
					
					
				//	exit;
				
			$studentModel->update_ftransaction($data, $flw_tx_ref);	
				
		 
		 
		    echo "<script> alert('Your transaction was successful!, you can print your payment receipt.');         window.location.href='payhistory';</script>";
	  }else{
		  
		  echo "<script>  alert('There Was An Error, Your Transaction Was Not Successful, Please Try Again!!');
            window.location.href='hfee';</script>";
	  }
 
         
    }
    
    
}

?>