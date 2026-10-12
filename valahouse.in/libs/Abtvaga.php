<?php       

    class Abtvaga extends MySql{
    
    
    
    function deleteList($list){
                    for($i=0;$i<count($list);$i++){
                            $this->delete('testimonials','`t_id`='.$list[$i]);
                    }
            }   
            
            
    
    
    /*
             * Edit Testimonials
            */          
        function editAbtvaga($inputs){
        $insert =   array('av_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
                                        'av_dscrpn'=>$inputs['dscrptn'],
                                        'av_stus'=>$inputs['status']
                                        
                                        
                                        
                            );
                            //print_r($insert); exit;   
                $this->update($insert,"abt_vgmn",'`av_id`='.$inputs['id']);       
                return true;
            }
    


    function getAbtvaga(){
        $query  =   "SELECT * FROM `abt_vgmn`";

        $rec        =   $this->fetchAll($query);
        return $rec;
    }

    function getAllAbtvagaDetails()
    {
        $query = "SELECT * FROM abt_vgmn where av_stus=1";
        $rec = $this->fetchAll($query);
        return $rec;    
    }
    
}
?>