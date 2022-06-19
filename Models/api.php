<?php class apiModel extends Model{
  
    public function index(){
        
 
        $this->query('SELECT * FROM ban_info ORDER BY ban_id ASC');
		$rows = $this->resultSet();
        return $rows;
    }


 

}