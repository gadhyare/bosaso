<?php class coulessonModel extends Model
{


    public function index()
    {
        /**
         * getl all recoreds from table in database 
         */
        if(isset($_GET['id']) && $_GET['id'] != ""){
            $this->query("SELECT * FROM cou_lesson WHERE cou_id=:cou_id ORDER BY les_id DESC");
            $this->bind(":cou_id" , $_GET['id']);
            $row = $this->resultSet();
            if ($row) {
                return json_encode($this->resultSet());
            }
        } else {
            header("refresh:0;url=" . ROOT_URL . "/courses");
        }

    }


    public function add()
    {
        /**
         * Add new Record to the table of database 
        */
        $op = new khas();
        if (isset($_POST['add_rec'])) {
            foreach( $_POST['cou_title'] as $item){
                if($item == ""){
                    continue;
                }else{
                    $this->query("INSERT INTO  cou_lesson (  cou_id ,  les_link  ) VALUES (:cou_id ,  :les_link)");
                    $this->bind(":cou_id"  , $op->pro_field($_GET['id']));
                    $this->bind(":les_link"  , $op->pro_field($item ));
                    $this->execute();
             
                }
                
            }
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
            }

            

             
        }
    }



    /**
     * update record in database 
     */

    public  function update()
    {
        $op = new khas();
        $id = $op->pro_field($_GET['id']);
        if (isset($_POST['edit_submit'])) {
            $this->query("SELECT * FROM cou_lesson WHERE les_id=:id");
            $this->bind(":id", $id);
            $UpdateRow = $this->resultSet();
            if ($UpdateRow) {
                $this->query("UPDATE cou_lesson SET les_link=:les_link WHERE les_id=:id");
                $this->bind(":les_link", $op->pro_field($_POST['les_link']));
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }


        $this->query("SELECT * FROM cou_lesson WHERE les_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            return $this->resultSet();
        }
    }



    /**
     * Delete Only One Record from database 
     */

    public   function delete()
    {
        $op = new Khas();
        $id = $op->pro_field($_GET['id']);
        
        if (isset($_POST['delete_items'])) {
            
            $this->query("SELECT * FROM cou_lesson WHERE les_id=:id");
            $this->bind(":id", $id);
            $delRow = $this->resultSet();
            if ($delRow) {
                $this->query("DELETE  FROM cou_lesson WHERE les_id=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0;url=" . ROOT_URL . '/coulesson');
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }

        $this->query("SELECT * FROM cou_lesson WHERE les_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            return $this->resultSet();
        }
    }




    public function show()
    {
        $op = new khas();
        if(isset($_GET['id'])){
            $id = $op->pro_field($_GET['id']);
            $this->query("SELECT * FROM cou_lesson WHERE les_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }            
        }

    }
}
