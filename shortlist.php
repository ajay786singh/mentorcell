<?php include('config.php');
$colegid = $_REQUEST['sort'];
$userids = $_REQUEST['userids'];
$course_id = $_REQUEST['courseid'];
	$data = mysql_query("SELECT * FROM tbl_shortlist WHERE collegeid = '".$colegid."' AND userid = '".$userids."' AND course_id = '".$course_id."'");
	$countdata = mysql_num_rows($data);
	if($countdata<=0){
		$insert = mysql_query("INSERT INTO tbl_shortlist(collegeid, userid, course_id)VALUES('".$colegid."', '".$userids."', '".$course_id."')");
		echo "Add Shorlist Successfully";
	}else{
		echo "Already Add College in Shortlist";
	}
	
?>


		