<?php 
namespace App\Models;
use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'stdlogin';

    protected $primaryKey = 'log_id';
    
    protected $allowedFields = ['log_surname', 'log_firstname', 'log_othernames', 'log_username', 'log_email', 'log_password','datereg'];
	
	protected $validationRules    = [
        'log_username'     => 'alpha_numeric_space|is_unique[stdlogin.log_username]',
        'log_email'        => 'required|valid_email',
        'log_password'     => 'required|min_length[4]',
        'log_surname' =>  'required|alpha_numeric_space',
		'log_firstname' =>  'required|alpha_numeric_space',
		'log_othernames' =>   'required|alpha_numeric_space'
		
    ];
 
    protected $validationMessages = [
        'log_email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
			
        ]
    ]; 
	
	
	public function getsess($progid)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('stdcurrent_session');
		$builder->select('cs_session');
		$builder->where('prog_id',$progid);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->cs_session;
		     
        
    }
	
	public function getacctdetails($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stdprofile');
		$builder->join('state','stdprofile.state_of_origin=state.state_id');
		$builder->join('lga','stdprofile.local_gov=lga.lga_id');
		$builder->join('programme','stdprofile.stdprogramme_id=programme.programme_id');
		$builder->join('faculties','stdprofile.stdfaculty_id=faculties.faculties_id');
		$builder->join('departments','stdprofile.stddepartment_id=departments.departments_id');
		$builder->join('dept_options','stdprofile.stdcourse=dept_options.do_id');
		$builder->join('stdlevel','stdprofile.stdlevel=stdlevel.level_id');
        $builder->where('std_logid',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function authreg($appno)
	 {

        $db = \Config\Database::connect();
		$builder = $db->table('portalaccess');
		$builder->select('pid, fullname');
		$builder->where('appno',$appno);
		$builder->where('status',0);
		$result= $builder->get();
       return  $arr =  $result->getResult();
		       
		     
        
    }
	
	
	public function getapp_pdetails($appno)
	 {

        $db = \Config\Database::connect();
		$builder = $db->table('portalaccess');
		$builder->select('*');
		$builder->where('pid',$appno);
		$result= $builder->get();
       return  $arr =  $result->getResult();
		       
		     
        
    }
	
	public function getappdetails($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('portalaccess');
        $builder->select('*');
		$builder->join('state','portalaccess.state = state.state_id');
		$builder->join('stdlevel','portalaccess.level=stdlevel.level_id', 'left');
		$builder->join('programme','portalaccess.prog = programme.programme_id');
		$builder->join('faculties','portalaccess.school=faculties.faculties_id');
	 	
	     $builder->where('pid',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	
	public function getlga($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lga');
		$builder->select('lga_id, lga_name');
		$builder->where('state_id',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function create_account($data)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('stdlogin');
        if($builder->insert($data))
        {
			return $db->insertID();
        }
        else
        {
            return false;
        }
    }
	
	public function create_std_account($datas)
    {
 
        $db = \Config\Database::connect();
        $builder = $db->table('stdprofile');
        if($builder->insert($datas))
        {
            
	
			return true;
        }
        else
        {
            return false;
        }
    }
	
	public function getdept_pdetails($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dept_options');
		$builder->select('dept_id, prog_id, do_id');
		$builder->where('prog_id',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	 
	 public function portalaccess($data, $appno)
    {
   
        $db = \Config\Database::connect();
        $builder = $db->table('portalaccess');
		$builder->where('appno',$appno);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	
	public function getgenotype()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('genotype');
		$builder->select('id, genotype');
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function getbloodgroup()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bloodgroup');
		$builder->select('id, bloodgroup');
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function getfac_code($fac)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('faculties');
		$builder->select('fcode');
		$builder->where('faculties_id',$fac);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->fcode;
		     
        
    }
	
	
	public function getstdno($sid)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('stdprofile');
		$builder->select('count(std_id) as dno');
		$builder->where('stdcourse',$sid);
		$builder->where('std_status','new');
		$result=$builder->get();
		$arr =  $result->getResult();
		$nos =  $arr[0]->dno;
        return   str_pad($nos, 3, "0", STR_PAD_LEFT);
    }
	
	public function getprog_code($fac)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('dept_options');
		$builder->select('dept_code');
		$builder->where('do_id',$fac);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->dept_code;
		     
        
    }
	
	
	public function update_biodata($data, $std_id)
    {
     
        $db = \Config\Database::connect();
        $builder = $db->table('stdprofile');
		$builder->where('std_logid',$std_id);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
     public function update_pass($rdata, $std_id, $semail)
    {
     
        $db = \Config\Database::connect();
        $builder = $db->table('stdlogin');
		$builder->where('log_id',$std_id);
		$builder->where('log_email',$semail);
        if($builder->update($rdata))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
     public function portalclosing($progid)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('stdportalstatus');
		$builder->select('p_status');
		$builder->where('prog_id',$progid);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $p_status =  $arr[0]->p_status;
		     
        
    }
    
    public function enddate()
    {

        $db = \Config\Database::connect();
		$builder = $db->table('schoolinfo');
		$builder->select('endreg_date');
		$result=$builder->get();
         $arr =  $result->getResult();
		  return   $cs_session =  $arr[0]->endreg_date;  
		     
        
    }
    
    public function markuee()
    {

        $db = \Config\Database::connect();
		$builder = $db->table('schoolinfo');
		$builder->select('markuee');
		$result=$builder->get();
         $arr =  $result->getResult();
		return     $arr[0]->markuee;
		     
        
    }
    
    public function getlatepay($progid)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('stdportalstatus');
		$builder->select('latepay');
		$builder->where('prog_id',$progid);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $latepay =  $arr[0]->latepay;
		     
        
    }
    
		public function getprogramme()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('programme');
		$builder->select('programme_id, programme_name');
        $result=$builder->get(); 
        return $result->getResult();
    }
    
    	public function getprogname($fac)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('programme');
		$builder->select('programme_name');
		$builder->where('programme_id',$fac);
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->programme_name;
		     
        
    }
    
    public function save_transaction($data)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('oPay');
        if($builder->insert($data))
        {
			return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getofeedetails($rrr)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('oPay');
		$builder->join('programme','oPay.prog_id = programme.programme_id');
		$builder->where('rrr',$rrr);
		$builder->where('pay_status','Pending');
        $result=$builder->get(); 
        return $result->getResult();
    }
    
     public function update_transaction($data, $rrr)
    {
   
        $db = \Config\Database::connect();
        $builder = $db->table('oPay');
		$builder->where('rrr',$rrr);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getofeedetails_paid($rrr)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('oPay');
		$builder->join('programme','oPay.prog_id = programme.programme_id');
		$builder->where('rrr',$rrr);
		$builder->where('pay_status','Paid');
        $result=$builder->get(); 
        return $result->getResult();
    }
    
    public function gettransstatus($rrr)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('oPay');
        $builder->select('pay_status');
        $builder->where('rrr',$rrr);
		 $result=$builder->get(); 
        $arr = $result->getResult();
        return  $arr[0]->pay_status; 
    }
    
    	public function exclude($appno)
	 {

        $db = \Config\Database::connect();
		$builder = $db->table('excludes');
		$builder->select('*');
		$builder->where('matno',$appno);
		$result= $builder->get();
       return  $arr =  $result->getResult();
		       
		     
        
    }
    
    public function getadmdate($progid)
    {

        $db = \Config\Database::connect();
		$builder = $db->table('dept_options');
		$builder->select('admletter_date');
		$builder->where('prog_id',$progid);
		$result=$builder->get();
         $arr =  $result->getResult();
		return     $arr[0]->admletter_date;
		     
        
    }
	/*
	public function appstartdate()
    {

        $db = \Config\Database::connect();
		$builder = $db->table('schoolinfo');
		$builder->select('appstartdate');
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->appstartdate;
		     
        
    }
 
	
	public function getnos()
    {

        $db = \Config\Database::connect();
       return   str_pad($db->table('applogin')->countAll()+1, 4, "0", STR_PAD_LEFT);
        
    }
	
	
	
	
	 public function getstdid($appno)
	 {

        $db = \Config\Database::connect();
		$builder = $db->table('applogin');
		$builder->select('log_id');
		$builder->where('log_username',$appno);
		$result= $builder->get();
         $arr =  $result->getResult();
		return      $arr[0]->log_id;
		     
        
    }
	
	
	public function getacctdetail($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('application_profile');
		$builder->where('std_logid',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	
	
public function getskool($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('faculties');
		$builder->select('faculties.faculties_name');
		$builder->join('departments','departments.fac_id = faculties.faculties_id');
		$builder->join('dept_options','dept_options.dept_id=departments.departments_id');
        $builder->where('dept_options.do_id',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function getrrr($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaction_app');
		$builder->select('rrr');
		$builder->where('log_id',$sid);
        $result=$builder->get(); 
        return $result->getResult();
    }
    
   
    
    
    
    
    public function appenddate()
    {

        $db = \Config\Database::connect();
		$builder = $db->table('schoolinfo');
		$builder->select('appenddate');
		$result=$builder->get();
         $arr =  $result->getResult();
		return    $cs_session =  $arr[0]->appenddate;
		     
        
    }
*/
	
}