<?php 
namespace App\Models;
use CodeIgniter\Model;

class StudentModel extends Model
{
    
  public function save_transaction($data)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
        if($builder->insert($data))
        {
			return true;
        }
        else
        {
            return false;
        }
    }
	
	public function gettransdetails($rrr)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
		$builder->join('programme','stdtransaction.prog_id = programme.programme_id');
		$builder->join('faculties','stdtransaction.user_faculty=faculties.faculties_id');
		$builder->join('stdlevel','stdtransaction.levelid=stdlevel.level_id');
        $builder->where('rrr',$rrr);
		$builder->where('pay_status','Pending');
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	 public function save_courses($data)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('course_reg');
        if($builder->insert($data))
        {
			return true;
        }
        else
        {
            return false;
        }
    }
	
	 public function remove_courses($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('course_reg');
        $builder->where('thecourse_id',$sid);
        if($builder->delete())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	public function get_feeamt($cid,$sess)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('stdtransaction');
		$builder->select('sum(trans_amount) as amt');
		$builder->where('log_id',$cid);
		$builder->where('fee_type',"fees");
		$builder->where('pay_status',"Paid");
		$builder->where('trans_year',$sess);
		$result= $builder->get();
         $arr =  $result->getResult();
		return      $arr[0]->amt;
    }
	
	public function get_ofeeamt($cid,$sess)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('stdtransaction');
		$builder->select('sum(trans_amount) as amt');
		$builder->where('log_id',$cid);
		$builder->where('fee_type',"ofees");
		$builder->where('pay_status',"Paid");
		$builder->where('trans_year',$sess);
		$result= $builder->get();
         $arr =  $result->getResult();
		return      $arr[0]->amt;
    }
	
	public function get_creg($cid,$sess)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('course_reg');
		$builder->select('count(thecourse_id) as tot');
		$builder->where('log_id',$cid);
		$builder->where('cyearsession',$sess);
		$result= $builder->get();
         $arr =  $result->getResult();
		return      $arr[0]->tot;
    }
	
	
	public function chk_fee($cid,$sess, $feeid)
    {
       $db = \Config\Database::connect();
		$builder = $db->table('stdtransaction');
		$builder->select('pay_status, trans_amount');
		$builder->where('log_id',$cid);
		$builder->where('fee_type',"ofees");
		$builder->where('pay_status',"Paid");
		$builder->where('trans_year',$sess);
		$builder->where('fee_id',$feeid);
		$result= $builder->get();
        return  $result->getResult();
		 
    }
	
	public function allot_room($data,$sid )
    {
       $db = \Config\Database::connect();
        $builder = $db->table('stdprofile');
		$builder->where('std_logid',$sid);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
		 
    }
	
	public function get_hostel($sid)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('stdprofile');
		$builder->select('hostelname, roomno, std_bedspace ');
		$builder->join('hostels','stdprofile.std_hostel = hostels.hid');
		$builder->join('hostelroom','stdprofile.std_room = hostelroom.roomid');
		$builder->where('std_logid',$sid);
		$result= $builder->get();
	     return  $result->getResult();
		      
}

public function gettranshistory($stdid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
		$builder->select('sum(trans_amount) as amt, rrr, trans_date, trans_year, fee_type ');
		$builder->join('programme','stdtransaction.prog_id = programme.programme_id');
		$builder->join('faculties','stdtransaction.user_faculty=faculties.faculties_id');
		$builder->join('stdlevel','stdtransaction.levelid=stdlevel.level_id');
        $builder->where('log_id',$stdid);
		$builder->where('pay_status','Paid');
		 $builder->groupBy('fee_type, rrr');
        $result=$builder->get(); 
        return $result->getResult();
    }
	
	public function gettrans_details($rrr)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
		$builder->join('programme','stdtransaction.prog_id = programme.programme_id');
		$builder->join('faculties','stdtransaction.user_faculty=faculties.faculties_id');
		$builder->join('stdlevel','stdtransaction.levelid=stdlevel.level_id');
        $builder->where('rrr',$rrr);
		$builder->where('pay_status','Paid');
        $result=$builder->get(); 
        return $result->getResult();
    }
    
    public function update_transaction($data, $rrr)
    {
   
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
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
    
    public function getstdregno($stdcourse, $sess, $std_id)
    {
//echo $std_id= 13;
        $db = \Config\Database::connect();
		$builder = $db->table('stdprofile');
		$builder->select('std_logid');
		$builder->where('stdcourse',$stdcourse);
		$builder->where('std_status','new');
		$result=$builder->get();
		$arr =  $result->getResult();
		foreach ($arr as $arrs){
        $array[] = $arrs->std_logid; 
		}
      // print_r($array);
		 
	 	$builders= $db->table('stdtransaction');
		$builders->select('log_id');
		$builders->where('stdcourse',$stdcourse);
		$builders->where('pay_status','Paid');
		$builders->where('fee_type','fees');
		$builders->where('trans_year',$sess);
		$builders->havingIn('log_id', $array);
		$builders->groupBy('log_id');
		$builders->orderBy('trans_date');
		$results=$builders->get();
		$arrs =  $results->getResult();
		 
		 foreach ($arrs as $arrss){
        $countstid[] = $arrss->log_id; 
		}
		// print_r($countstid); exit;
		$countTotal = array_search("$std_id",$countstid) + 1;
        return $countTotal = str_pad($countTotal, 3, "0", STR_PAD_LEFT);  
 
    }
    
    	public function update_sregno($data, $std_id)
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
    
    
    public function update_lregno($data, $std_id)
    {
     
        $db = \Config\Database::connect();
        $builder = $db->table('stdlogin');
		$builder->where('log_id',$std_id);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getrrr($sid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
		$builder->select('rrr');
		$builder->where('log_id',$sid);
		$builder->where('pay_status','Pending');
        $result=$builder->get(); 
        return $result->getResult();
    }
    
    public function getamtpaid($appid, $flw_tx_ref)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('stdtransaction');
		$builder->select('trans_amount');
		$builder->where('rrr',$flw_tx_ref);
		$builder->where('pay_status','Pending');
		$builder->where('log_id',$appid);
		$result= $builder->get();
         $arr =  $result->getResult();
		return      $arr[0]->trans_amount;
		
    }
    
    	public function update_ftransaction($data, $flw_tx_ref)
    {
   
        $db = \Config\Database::connect();
        $builder = $db->table('stdtransaction');
		$builder->where('rrr',$flw_tx_ref);
        if($builder->update($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	
	public function savehostelinfo($datas)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('stdhostel');
        if($builder->insert($datas))
        {
			return true;
        }
        else
        {
            return false;
        }
    }
	
	
}