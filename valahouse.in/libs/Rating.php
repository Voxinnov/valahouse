<?php	 	

	class Rating extends MySql{
	
	
	function listRating(){
		
		
		


		$query = "SELECT * FROM `rating` c WHERE c.`rating_id`!='' ORDER BY `rating_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}

		function addRating($inputs){
					$insert	=	array('rating_date'=>$this->addFilter($this->escapeHtml($inputs['date'])),
				                    	'rating_clns'=>$this->addFilter($this->escapeHtml($inputs['clns'])),
				                    	'rating_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'rating_service'=>$this->addFilter($this->escapeHtml($inputs['service']))
										);
				
				$this->insert($insert,"rating");	
				
				return true;
				
				
			}
	



	function getRating(){
		$query	=	"SELECT * FROM `rating`";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	function getAllRatingDetails()
	{
		$query = "SELECT * FROM rating";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
		function getAllRatingDetailsMonth($from,$to)
	{
		$query = "SELECT * FROM rating WHERE rating_date BETWEEN '$from' AND '$to' ";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
			function getAllRatingDetailsMonthlowcln($from,$to)
	{
		$query = "SELECT count(rating_id) as lcln FROM rating WHERE rating_clns<3 AND rating_date BETWEEN '$from' AND '$to' ";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
			function getAllRatingDetailsMonthlowsrv($from,$to)
	{
		$query = "SELECT count(rating_id) as lsrv FROM rating WHERE rating_service<3 AND rating_date BETWEEN '$from' AND '$to' ";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
	
			function getAllRatingDetailsMonthhighcln($from,$to)
	{
		$query = "SELECT count(rating_id) as hcln FROM rating WHERE rating_clns>=3 AND rating_date BETWEEN '$from' AND '$to' ";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
			function getAllRatingDetailsMonthhighsrv($from,$to)
	{
		$query = "SELECT count(rating_id) as hsrv FROM rating WHERE rating_service>=3 AND rating_date BETWEEN '$from' AND '$to' ";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
	
}
?>