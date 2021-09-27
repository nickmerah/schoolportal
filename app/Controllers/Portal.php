<?php namespace App\Controllers;
use App\Models\AccountModel;
use App\Models\FeeModel;
use \CodeIgniter\Controller;


class Portal extends BaseController
{
	public function index()
	{
	    $accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	     $pmarquee = $accountModel->markuee();
				 
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $timer = ['timer' => "$pend", 'marquee' => "$pmarquee"];
         echo view('header', $data);
		 echo view('home', $timer);
         
	}
	 
	 
	 public function newreg()
	{
		
		$accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	     $pmarquee = $accountModel->markuee();
	     
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		$timer = ['timer' => $pend, 'marquee' => $pmarquee];
         echo view('header', $data);
		 echo view('new', $timer);
         
	}
	
	public function forgotpass()
	{  
	     $accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	     $pmarquee = $accountModel->markuee();
				 
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $timer = ['timer' => $pend, 'marquee' => $pmarquee];
         echo view('header', $data);
		 echo view('forgot', $timer);
         
	}
	
	public function login()
	{
		$accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	     $pmarquee = $accountModel->markuee();
	     
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $timer = ['timer' => $pend, 'marquee' => $pmarquee];
         echo view('header', $data);
		 echo view('login', $timer);
         
	}
	
	
	public function reginstructions()
	{
	    
	    $accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	    
		 		 
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $timer = ['timer' => "$pend" ];
         echo view('header', $data);
		 echo view('reg', $timer);
         
	}
	
	public function bio_data()
	{
		$this->session = \Config\Services::session();
        helper('uri');
        if(!session()->get('pid'))
        {
            header('Location: '.base_url());
            exit(); 
        }
	     $accountModel = new AccountModel();
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $datas['appdetails'] =  $accountModel->getappdetails(session()->get('pid'));
		  //print_r($datas['appdetails']);  
		 $datas['lgas'] = $accountModel->getlga($datas['appdetails'][0]->state);
		 $datas['bloodgroups'] = $accountModel->getbloodgroup();
		 $datas['genotypes'] = $accountModel->getgenotype();
		 
         echo view('header', $data);
		 echo view('biodata', $datas);
		  //echo view('footer');
         
	}
	
	
	public function pay_now()
	{
		 $accountModel = new AccountModel();
		 $feeModel = new FeeModel();
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
	 	 $datas['programmes'] = $accountModel->getprogramme();
		 $datas['ofeedetails'] =  $feeModel->getallofeedetails();
		 echo view('pos/header', $data);
		 echo view('pos/makepay', $datas);
		  echo view('pos/footer');
         
	}
	
	 
	
	public function vregister()
	{
		 $accountModel = new AccountModel();
		 $feeModel = new FeeModel();
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 
		  if($this->request->getMethod()=='post')
        {
            $rules = [
                'matno'=>'required',
                'fullnames'=>'required|min_length[4]',
                'phone'=>'required|min_length[11]',
                'email'=>'required|valid_email|min_length[6]',
                'prog'=>'required',
                'pitem'=>'required'
            ];
            
            
         //   if($this->validate($rules)){
                
              $matno =  $this->request->getVar('matno');
			 $fullnames =  $this->request->getVar('fullnames');
			  $phone = $this->request->getVar('phone');
			  $demail = $this->request->getVar('demail');
			  $prog = $this->request->getVar('prog');
			   $pitem = $this->request->getVar('pitem');
			    $dprog = $accountModel->getprogname($prog); 
			   
			    $itemamt = $feeModel->getposfee_amt($pitem); 
			      $itemname = $feeModel->getposfee_name($pitem);
			     $acctype = $feeModel->getposacct_type($pitem);
                
            $datas = [
            'matno' => $matno,
            'fullnames'  => $fullnames,
			'phone' => $phone,
            'email'  => $demail,
            'prog' => $prog,
             'pitem'  => $pitem, 
			'dprog' => $dprog,
             'itemname'  => $itemname,
             'itemamt'  => $itemamt
        ];     
                
          // print_r($datas);        
                
           /* }else{
                	echo '<script type="text/javascript">
			alert("Unable to Process Payment, Try Again");
			window.location = "'.base_url('portal/pay_now').'";
		</script>';exit;
            }*/
		 
        }else{
        	echo '<script type="text/javascript">
			alert("Unable to Process Payment, Try Again");
			window.location = "'.base_url('portal/pay_now').'";
		</script>'; exit;
        }
		 
	 	 
		 echo view('pos/header', $data);
		 echo view('pos/verifypayment', $datas);
		  echo view('pos/footer');
         
	}
	
	
		 
	
	public function paymentslip()
    {   
		 
		   $accountModel = new AccountModel();

        $datah = ['title' => 'COEL .:: Home | Student Portal'];
        $data['transdetails'] =  $accountModel->getofeedetails($this->request->uri->getSegment(3));
		 
		 echo view('pos/header', $datah);
		 echo view('pos/payslip', $data);
		  echo view('pos/footer');  
		 
    }
    
    public function remitaresponse()
	{
		   
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
		
 
				 $accountModel = new AccountModel();
				$accountModel->update_transaction($data,$rrr);
				
				echo '<script type="text/javascript">
			alert("'.$response_message.'\nYour Payment is Successfully and your account will be updated.");
				window.location = "'.base_url('portal/receipt/'.$rrr).'";
		</script>';
			}else{
		
		 echo '<script type="text/javascript">
			alert("Payment Not Made\n Reason: '.$response_message.'");
			window.location = "'.base_url('portal/getreceipt/').'";
		</script>';
		
		
		
		} 
	 
	}
	 
		public function receipt()
    {   
		 
		   $accountModel = new AccountModel();

        $datah = ['title' => 'COEL .:: Home | Student Portal'];
        $data['transdetails'] =  $accountModel->getofeedetails_paid($this->request->uri->getSegment(3));
		 
		 echo view('pos/header', $datah);
		 echo view('pos/paymentreceipt', $data);
		  echo view('pos/footer');  
		 
    }
    
    
    public function getreceipt()
    {   
		 
		   $accountModel = new AccountModel();

        $datah = ['title' => 'COEL .:: Home | Student Portal'];
        echo view('pos/header', $datah);
		 echo view('pos/qtrans');
		  echo view('pos/footer');  
		 
    }
    
    
     public function ctrans()
    {   
         $accountModel = new AccountModel();
		  $rrr = $this->request->getVar('rrr');
		  $pstat = $accountModel->gettransstatus($rrr);
		   if ($pstat == 'Paid'){
		       
		       	echo '<script type="text/javascript">
			alert("RRR already PAID, you will be redirected to print the receipt.");
				window.location = "'.base_url('portal/receipt/'.$rrr).'";
		</script>';
		       
		   }elseif($pstat == 'Pending'){
		       
		       	echo '<script type="text/javascript">
			alert("RRR Not PAID and will be sent for processing.");
				window.location = "'.base_url('portal/remitaresponse/'.$rrr).'";
		</script>';
		       
		   }else{
		       
		       echo '<script type="text/javascript">
			alert("Invalid RRR, Try Again!");
				window.location = "'.base_url('portal/getreceipt/').'";
		</script>';
		       
		   }
	  
		 
    }
    
    public function alogin()
	{
		$accountModel = new AccountModel();
	      $pend = $accountModel->enddate();  
	     $pmarquee = $accountModel->markuee();
	     
		 $data = ['title' => 'COEL .:: Home | Student Portal'];
		 $timer = ['timer' => $pend, 'marquee' => $pmarquee];
         echo view('header', $data);
		 echo view('alogin', $timer);
         
	}
    
} 
