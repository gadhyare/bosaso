<?php 
 
class homeModel extends Model{
    public  $rowss;
 
    public function index(){
        if(isset($_POST['red'])){
             $this->changeThemeColor('#e40017');
        } 
        
        if (isset($_POST['brown'])) {
            $this->changeThemeColor('#85586F');
        } 
        
        if (isset($_POST['green'])) {
            $this->changeThemeColor('#506464');
        } 
        
        if (isset($_POST['orange'])) {
            $this->changeThemeColor('#ff7b54');
        }
        if (isset($_POST['pink'])) {
            $this->changeThemeColor('#cc0e74');
        }
        if (isset($_POST['bluegray'])) {
            $this->changeThemeColor('#344352');
        }
        if (isset($_POST['purple'])) {
            $this->changeThemeColor('#544667');
        } 
        if(isset($_SESSION["log_id"])):
            $id = $_SESSION["log_id"];
            $this->query("SELECT * FROM todo WHERE JSON_CONTAINS(user_id,  '[\"" . $id . "\"]') AND active = 1   ORDER BY id ASC");

            $rows = $this->resultSet();
            return $rows;
        endif;
 
    }




    public function changeThemeColor($color)
    {
        $this->query('UPDATE users SET  themeColor= :themeColor  WHERE usrid=:id');
        $this->bind(':themeColor',  $color);
        $this->bind(':id',  $_SESSION['log_id']);
        $this->execute();
    }
    
 


   

}