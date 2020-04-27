<?php

$conn=new MySQLi("localhost","root","","tmsbrd");


class model
{
	
	 
	
	
	/* function select_reminder($conn)
	{
		

		 $sql="select * from `tbl_taskdata` where `ratings`='' AND `status`='Completed'"; 
		
	    $ex=$conn->query($sql);
		while($res=$ex->fetch_object())
		{
			$r[]=$res;
		}
		return $r;
		
		
	}*/
	
	 function select_allexcel($conn,$table)
	{
		$sql="select * from `$table`";
		
		return $ex=$conn->query($sql);
		
		
	}
	
	
	 function select_all($conn,$table)
	{
		$sql="select * from `$table` order by `task_id` desc";
	
		
		return $ex=$conn->query($sql);
		
		/*$r='';
		while($res=$ex->fetch_object())
		{
			$r[]=$res;
		}
		return $r;*/
	}
	
	
	
	
	
	/*
	 function select_all1($conn,$table)
	{
		$sql="select * from `$table`";
		
		return $ex=$conn->query($sql);
		
		$r='';
		while($res=$ex->fetch_object())
		{
			$r[]=$res;
		}
		return $r;
		}
	
	 function select_all2($conn,$table)
	{
		$sql="select * from `$table`";
		
		$ex=$conn->query($sql);
		
		$r='';
		while($res=$ex->fetch_object())
		{
			$r[]=$res;
		}
		return $r;
	}
	
	*/
	
	
	 function select_where($conn,$table,$where)
	{
		$condition="";
		
		foreach($where as $keys=>$values)
		{
			$condition=$condition."`$keys`='$values'";
		}
		
		 $sql="select * from `$table` where $condition";
		
	    $ex=$conn->query($sql);
		
		$r='';
		while($res=$ex->fetch_object())
		{
			$r[]=$res;
		}
		return $r;
		
	}
	
	 function select_where1($conn,$table,$where)
	{
		$condition="";
		
		foreach($where as $keys=>$values)
		{
			$condition=$condition."`$keys`='$values'";
		}
		
		
		$sql="select * from `$table` where $condition";
		
	    return $ex=$conn->query($sql);
		
	}
	
	
	
	
	function select_whereuser($conn,$table)
	{
		
		$sql="select `username` from `$table` where `usercategory`='member' or `usercategory`='admin'"; 
		
	    return $ex=$conn->query($sql);
		
	}
	
	
	 function insert($conn,$table,$data)
	{
		$keys=array_keys($data);
		$values=array_values($data);
		
		$fields=implode("`,`",$keys);
		$values=implode("','",$values);
		
	 $sql="insert into `$table`(`$fields`)values('$values')"; 
		
		return $ex=$conn->query($sql);
		
	}
	
	 function insert1($conn,$table,$data)
	{
		$keys=array_keys($data);
		$values=array_values($data);
		
		$fields=implode("`,`",$keys);
		$values=implode("','",$values);
		
	   $sql="insert into `$table`(`$fields`)values('$values')"; 
		
		return $ex=$conn->query($sql);
		
	}
	 function select_join_5($conn,$table1,$table2,$table3,$table4,$table5,$condition1,$condition2,$condition3,$condition4,$whr)
	
	{
		
		$sql="select * from `$table1` join `$table2` on $condition1 join `$table3` on $condition2 join `$table4` on $condition3 join `$table5` on $condition4 where $whr ";
		
		$ex=$conn->query($sql);
		
		return $ex;
	}
	
	 function select_join_5_2($conn,$table1,$table2,$table3,$table4,$table5,$condition1,$condition2,$condition3,$condition4,$where)
	
	{
		//echo
		$sql="select * from `$table1` join `$table2` on $condition1 join `$table3` on $condition2 join `$table4` on $condition3 join `$table5` on $condition4 where $where";
		//die;
		$ex=$conn->query($sql);
		
		return $ex;
	}
	
	
	
	function delete($conn,$table,$where)
	{
		$dkey=array_keys($where);
		$dval=array_values($where);
		
		$condition="";
		
		foreach($where as $dkey=>$dval)
		{
			$condition=$condition. "`$dkey` = '$dval'";
		}
		
	 $sql="delete from `$table` where $condition"; 
		
		$ex=$conn->query($sql);
		
		return $ex;
	}
	
	 function update($conn,$table,$data,$where)
	{
		$ukey=array_keys($data);
		$uval=array_values($data);
		
		$str="";
		
		foreach($data as $ukey=>$uval)
		{
			$str=$str."`$ukey`='$uval',";
		}
		$str=rtrim($str,",");
		
		$wkey=array_keys($where);
		$wval=array_values($where);
		
		$whr="";
		
		foreach($where as $wkey=>$wval)
		{
			$whr=$whr."`$wkey`='$wval'";
		}
		//$whr=rtrim($whr,",");
		
		$sql="update `$table` set $str where $whr";
		
		$ex=$conn->query($sql);
		
		return $ex;
	}
	/////////////////////////////////////////////////////////////////
	
	function search($conn,$table,$se)
		{
			
			 $sql="select * from `$table` where `status` like '$se%' OR `task_id` like '$se%' OR `taskuser` like '$se%' OR `assignto` like '$se%' OR `ratings` like '$se%'"; 
						return $ex=$conn->query($sql);
		}
	function search1($conn,$table,$se1)
		{
			
			$sql="select * from `$table` where `usercategory` like '$se1%' OR `location` like '$se1%' OR `username` like '$se1%'" ; 
						return $ex=$conn->query($sql);
		}
		
		function updatecon($conn,$table,$data,$where)
	{
		$str="";
		foreach($data as $k=>$v)
		{
			$str.="`$k`='$v',";
		}
		$str=rtrim($str,",");
		
		 
		$whr="";
		foreach($where as $k=>$v)
		{
			$whr.="`$k`='$v'"; //and `status`='active'(multi)
		}
		$whr=rtrim($whr,"and");
		
	   $sql4="update `$table` set $str where $whr";
	    return $ex4=$conn->query($sql4);
		
	}


		
		
		
		
		
		
		
		
		
	
}



	




?>