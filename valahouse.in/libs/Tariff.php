<?php	 	

	class Tariff extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	
	/*
			 * Edit Testimonials
			*/			
		function editTariff($inputs){
		$insert	=	array('acmdtn_ttl'=>$inputs['ttl_acmdtn'],
							'acmdtn_dscrptn'=>$inputs['dscrptn_acmdtn'],
							 'tarrif_ttl'=>$inputs['ttl_tariff'],
							 'tarrif_dscrptn'=>$inputs['dscrptn_tariff'],
							 'singleroom_rate'=>$inputs['singleroom_rate'],
							 'dblerm_rate'=>$inputs['doubleroom_rate'],
							 'tariff_incld'=>$inputs['tariff_include'],
							 'tariff_excld'=>$inputs['tariff_exclude'],
							 'tarrif_stus'=>$inputs['status']
										
										
										
							);
							//print_r($insert); exit;	
				$this->update($insert,"tarrif",'`tarrif_id`='.$inputs['id']);		
				return true;
			}
	


	function getTariff(){
		$query	=	"SELECT * FROM `tarrif`";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	function getAllTariffDetails()
	{
		$query = "SELECT * FROM tarrif where tarrif_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
}
?>