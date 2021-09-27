<?php 
namespace App\Models;
use CodeIgniter\Model;

class FeeModel extends Model
{
    
  public function getfeedetails($prog,$fac,$level,$new_return,$state, $sess,$latepay)
	 	{
	 	    
		$db = \Config\Database::connect();
		$builder = $db->table('fees_amt');
		$builder->select('amount,item_id, field_name');
		$builder->join('field','fees_amt.item_id=field.field_id');
		if ($latepay == 0) {
		$builder->where('item_id!=', '24');
		}
		$builder->where('item_id!=', '25');
		$builder->where('sessionid',$sess);
		$builder->where('prog_id',$prog);
		$builder->GroupStart();
		$builder->where('fac_id',$fac);
		$builder->orWhere('fac_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('level_id',$level);
		$builder->orWhere('level_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('resident_status','0');
		$builder->orWhere('resident_status',$state);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('new_return','general');
		$builder->orWhere('new_return',$new_return);
		$builder->groupEnd();
		 
 
		/*$where = "sessionid = '$sess' AND prog_id = '$prog' AND (fac_id='$fac' OR fac_id='0') AND (level_id='$level' OR level_id='0') AND 
		 (resident_status = 'general' OR resident_status = '$state') AND
		 (new_return = 'general' OR new_return = '$new_return')
		 ";
      $builder->where($where);
		 $result= $builder->get();
		 $sql = $builder->getCompiledSelect();
 echo $sql; exit;
		 //echo	 $db->getLastQuery(); exit;
		 */	 
		 $result= $builder->get();
		 
      return    $arr =  $result->getResult();
		}
		

		
		public function getofeedetails($prog)
	 	{
		$groups = [11];
		$db = \Config\Database::connect();
		$builder = $db->table('ofield');
		$builder->select('of_id,ofield_name,of_amount');
		$builder->havingNotIn('of_id', $groups);
		$builder->where('of_status',1);
		$builder->where('of_prog',$prog);
		$builder->orWhere('of_prog',0);	
		$builder->orderBy('ofield_name','ASC');	 
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		
		public function gethfeedetails()
	 	{
		$groups = [11];
		$db = \Config\Database::connect();
		$builder = $db->table('ofield');
		$builder->select('of_id,ofield_name,of_amount');
		$builder->having('of_id', $groups);
		$builder->orderBy('ofield_name','ASC');	 
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		public function getofee_amt($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('ofield');
		$builder->select('of_amount');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		return      $arr[0]->of_amount;
		}
		
		public function getofee_name($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('ofield');
		$builder->select('ofield_name');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		return      $arr[0]->ofield_name;
		}
		
		
		public function getfee_amt_split($prog,$fac,$level,$new_return,$state, $sess, $acctype,$latepay)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('fees_amt');
		$builder->select('amount');
		$builder->join('field','fees_amt.item_id=field.field_id');
		$builder->where('sessionid',$sess);
		if ($latepay == 0) {
		$builder->where('item_id!=', '24');
		}
		$builder->where('item_id!=', '25');
		$builder->where('accttype',"$acctype");
		$builder->where('prog_id',$prog);
		$builder->GroupStart();
		$builder->where('fac_id',$fac);
		$builder->orWhere('fac_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('level_id',$level);
		$builder->orWhere('level_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('resident_status','0');
		$builder->orWhere('resident_status',$state);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('new_return','general');
		$builder->orWhere('new_return',$new_return);
		$builder->groupEnd();
	 	 
		 $result= $builder->get();
		 
      return    $arr =  $result->getResult();
		}
		
		
		public function getacct_type($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('ofield');
		$builder->select('of_accttype');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		$acctype =    $arr[0]->of_accttype;
		
		return $acctype;
		}
		
		
			public function getallofeedetails()
	 	{
	 
		$db = \Config\Database::connect();
		$builder = $db->table('posfield');
		$builder->select('of_amount, of_id,ofield_name');
		$builder->orderBy('ofield_name','ASC');	 
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		
		public function getposfee_amt($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('posfield');
		$builder->select('of_amount');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		return      $arr[0]->of_amount;
		}
		
		public function getposfee_name($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('posfield');
		$builder->select('ofield_name');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		return      $arr[0]->ofield_name;
		}
		
		
		public function getposacct_type($sid)
	 	{
		$db = \Config\Database::connect();
		$builder = $db->table('posfield');
		$builder->select('of_accttype');
		$builder->where('of_id',$sid);
		$result= $builder->get();
		$arr =  $result->getResult();
		$acctype =    $arr[0]->of_accttype;
		
		return $acctype;
		}
		
		
		public function getcorrectfeeamt($prog,$fac,$level,$new_return,$state, $sess,$latepay)
	 	{
	 	    
		$db = \Config\Database::connect();
		$builder = $db->table('fees_amt');
		$builder->selectSum('amount');
		$builder->join('field','fees_amt.item_id=field.field_id');
		if ($latepay == 0) {
		$builder->where('item_id!=', '24');
		}
		$builder->where('item_id!=', '25');
		$builder->where('sessionid',$sess);
		$builder->where('prog_id',$prog);
		$builder->GroupStart();
		$builder->where('fac_id',$fac);
		$builder->orWhere('fac_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('level_id',$level);
		$builder->orWhere('level_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('resident_status','0');
		$builder->orWhere('resident_status',$state);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('new_return','general');
		$builder->orWhere('new_return',$new_return);
		$builder->groupEnd();
 
		 $result= $builder->get();
		 
		//  echo	 $db->getLastQuery(); exit;
		 $arr =  $result->getResult();
		return      $arr[0]->amount;
		 
       
		}
		
		
		 public function getfeedetails_partial($prog,$fac,$level,$new_return,$state, $sess,$latepay)
	 	{
	 	    
	 	    $groups = [25,8,9,10,15,16,17,18];
	 	    
		$db = \Config\Database::connect();
		$builder = $db->table('fees_amt');
		$builder->select('amount,item_id, field_name');
		$builder->join('field','fees_amt.item_id=field.field_id');
		if ($latepay == 0) {
		$builder->where('item_id!=', '24');
		}
		$builder->havingIn('item_id', $groups);
		$builder->where('sessionid',$sess);
		$builder->where('prog_id',$prog);
		$builder->GroupStart();
		$builder->where('fac_id',$fac);
		$builder->orWhere('fac_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('level_id',$level);
		$builder->orWhere('level_id',0);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('resident_status','0');
		$builder->orWhere('resident_status',$state);
		$builder->groupEnd();
		$builder->GroupStart();
		$builder->where('new_return','general');
		$builder->orWhere('new_return',$new_return);
		$builder->groupEnd();
		 
 	 $result= $builder->get();
	 
		 // echo	 $db->getLastQuery(); exit;
		  	 
	
		 
      return    $arr =  $result->getResult();
		}
		
		
}