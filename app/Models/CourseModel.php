<?php 
namespace App\Models;
use CodeIgniter\Model;

class CourseModel extends Model
{
    
  public function getcoursedetails($stdcourse,$fac,$level, $sem)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('courses');
		$builder->select('thecourse_id, thecourse_title, thecourse_code, thecourse_unit, semester');
		$builder->where('theschool_id',$fac);
		$builder->where('levels',$level);
		$builder->where('stdcourse',$stdcourse);
		$builder->where('semester',$sem);
		$builder->orderBy( 'thecourse_code', 'ASC');	
		 
		$result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		 
	 public function getcourse_details($selectedcourses, $sem)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('courses');
		$builder->select('thecourse_id, thecourse_title, thecourse_code, thecourse_unit, semester');
		$builder->where('semester',$sem);
		$builder->whereIn('thecourse_id',$selectedcourses);
	    $result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
			
	public function getcourse_detail($selectedcourses)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('courses');
		$builder->select('levels, thecourse_title, thecourse_code, thecourse_unit, semester');
		$builder->where('thecourse_id',$selectedcourses);
	    $result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		 public function getregcourse_details($sess, $sem, $sid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('course_reg');
		$builder->select('*');
		$builder->where('log_id',$sid);
		$builder->where('csemester',$sem);
		$builder->where('cyearsession',$sess);
	    $result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		 public function checkcoursereg($sess, $sid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('course_reg');
		$builder->select('stdcourse_id');
		$builder->where('log_id',$sid);
		$builder->where('cyearsession',$sess);
	    $result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		
		 public function getcourse_history($sid)
	 	{
		 $db = \Config\Database::connect();
		$builder = $db->table('course_reg');
		$builder->select('cyearsession, level_name, clevel_id, cdate_reg');
		$builder->join('stdlevel','course_reg.clevel_id=stdlevel.level_id');
		$builder->where('log_id',$sid);
		$builder->groupBy('cyearsession');
		$builder->orderBy('cyearsession');
		
	    $result= $builder->get();
	 
       return  $arr =  $result->getResult();
		}
		
		 
}