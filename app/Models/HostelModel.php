<?php 
namespace App\Models;
use CodeIgniter\Model;

class HostelModel extends Model
{
    
  public function gethosteldetails($fac,$gender,$progid, $levelid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('hostels');
		$builder->join('hostelroom','hostelroom.hostelid = hostels.hid');
		$builder->select('hostels.hid,hostels.hostelname,  count(roomid) as totroom, sum(no_space) as totspace');
		$builder->where('school',$fac);
		$builder->where('gender',$gender);
		$builder->where('room_status',1);
		$builder->where('hostel_status',1);
		$builder->where('levelid',$levelid);
		$builder->where('progid',$progid);
		$builder->groupBy( 'hostelid', 'ASC');	
	//	 $sql = $builder->getCompiledSelect();
 //echo $sql;  exit;
		 
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
	public function getroomdetails($fac,$gender, $hid, $progid, $level)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('hostelroom');
		$builder->join('hostels','hostelroom.hostelid = hostels.hid');
		$builder->select('hid, roomid, hostelname,  roomno, no_space ');
		$builder->where('school',$fac);
		$builder->where('gender',$gender);
		$builder->where('hostelid',$hid);
		$builder->where('progid',$progid);
		$builder->where('levelid',$level);
		$builder->where('room_status',1);
		$builder->where('hostel_status',1);
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		
		
	public function getava_bedspace($hid, $roomid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('stdprofile');
		$builder->select('count(std_id) as tot');
		$builder->where('std_hostel',$hid);
		$builder->where('std_room',$roomid);
		$result= $builder->get();
	     $arr =  $result->getResult();
		return      $arr[0]->tot;
       
		}
		
		public function gethostelname($hid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('hostels');
		$builder->select('hostelname');
		$builder->where('hid',$hid);
		$result= $builder->get();
       $arr =  $result->getResult();
		return      $arr[0]->hostelname;
		}
		
		public function getblockname($hid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('hostels');
		$builder->select('blockname');
		$builder->where('hid',$hid);
		$result= $builder->get();
       $arr =  $result->getResult();
		return      $arr[0]->blockname;
		}
		
		public function getroomno($hid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('hostelroom');
		$builder->select('roomno');
		$builder->where('roomid',$hid);
		$result= $builder->get();
       $arr =  $result->getResult();
		return      $arr[0]->roomno;
		}
		 
		 public function getallot_bedspace($hid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('stdprofile');
		$builder->select('count(std_id) as tot');
		$builder->where('std_hostel',$hid);
		$result= $builder->get();
	     $arr =  $result->getResult();
		return      $arr[0]->tot;
       
		}
		
}