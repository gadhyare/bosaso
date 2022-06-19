<?php class Abillity
{
    public $userName;
    public $userApl;
    public $get_usr_rol;
    public $arr = [];

    public function __construct()
    {
        $this->userApl  = (isset($_SESSION['log_role'])) ? $_SESSION['log_role'] : "user";
        $this->userName = (isset($_SESSION['log_user'])) ? $_SESSION['log_user'] : '';
    }

    public function chkLink($val)
    {
        $log_role = isset($_SESSION['log_role']) ? $_SESSION['log_role'] : 'emptylog_role';
        if ($log_role ) {
            $b = $log_role;
            $t = $this->$b();
            if (array_key_exists($val, $this->arr)) {
                return true;
            } else {
                return false;
            }
            return;
        }
    }


    public function chkapli(){
        if( isset($_SESSION['log_role'])  && $_SESSION['log_role'] == "manager" ){
            return true;
        } else{
            return false;
        }
        return ;
    }

    public  function get_menu($fun , $color)
    {
        $op = new khas;
        if (isset($_SESSION['log_role']) || $_SESSION['log_role'] != '') {
            if (method_exists(get_class($this), $fun)) {
                $this->$fun();
                foreach ($this->arr  as $kay => $val) {
                    echo '<a href="' . ROOT_URL . '/' . $kay . '" class="list-group-item w-100  rounded-0   shadow-0 text-white py-1 pr-1 pl-3 hover" style="font-size: 14px !important;background-color:'.$color.'"  id="' . $kay . '">'   . $op->lang($val) . '</a>';
                }
            } else {
                echo 'Sorry';
                die;
            }
        } else {
            die;
        }
    }
    /**
     * here we can change background color of active navabar 
     * @param string $nav
     */

    public function active_navbar(string $nav)
    {
        if ($_GET['controller'] == $nav) {
            return "#1AB196";
        }else{
            return "#344352";
        }
    }



    public function   emptylog_role()
    {
        $op = new khas;
        $this->arr = array(
            "home"          => $op->lang("home"),
            "user"          => $op->lang("users"),
            "api"           => "api"
        );
    }


    public function   manager()
    {
        $op = new Khas;
        $this->arr = array(
            "home"                   => $op->lang("home"),
            "student"                => $op->lang("students Affairs"),
            "employees"            => $op->lang("employee Information"),
            "edulevel"              => $op->lang("edulevel"),
            "faculty"                => $op->lang("Faculties"),
            "academics"         => $op->lang("academics"),
            "department"        => $op->lang("shifts"),
            "section"           => $op->lang("sections"),
            "group"             => $op->lang("groups"),
            "programs"          => $op->lang("programs"),
            "level"             => $op->lang("levels"),
            "subject"           => $op->lang("subjects"),
            "exams"             => $op->lang("exams"),
            "finance"           => $op->lang("finance"),
            "settings"          => $op->lang("settings"),
            "todolist"          => $op->lang("todolist"),
            "user"              => $op->lang("users"),
            "baninfo"           => $op->lang("bank accounts"),
            "filemanager"       => $op->lang("file manager"),
            "usrprofile"        => $op->lang("user profile") 
             
        );

        return $this->arr;
    }

    public function   Director_of_the_Department()
    {
        $op = new khas;
        $this->arr = array(
            "home"              => $op->lang("home"),
            "student"           => $op->lang("students Affairs"),
            "employees"         => $op->lang("employee Information"),
            "edulevel"          => $op->lang("edulevel"),
            "faculty"           => $op->lang("Faculties"),
            "academics"         => $op->lang("academics"),
            "department"        => $op->lang("shifts"),
            "section"           => $op->lang("sections"),
            "group"             => $op->lang("groups"),
            "programs"          => $op->lang("programs"),
            "level"             => $op->lang("levels"),
            "subject"           => $op->lang("subjects"),
            "exams"             => $op->lang("exams"),
            "finance"           => $op->lang("finance"),
            "filemanager"       => $op->lang("file manager"),
            "usrprofile"        => $op->lang("user profile")
        );

        return $this->arr;
    }
    

    public function   admin()
    {
        $op = new khas;
        $this->arr = array(
            "home"          => $op->lang("home"),
            "student"       => $op->lang("students Affairs"),
            "faculty"       => $op->lang("Faculties"),
            "department"    => $op->lang("shifts"),
            "section"       => $op->lang("sections"),
            "group"         => $op->lang("groups"),
            "level"         => $op->lang("levels"),
            "subject"       => $op->lang("subjects"),
            "settings"      => $op->lang("settings"),
            "exams"         => $op->lang("exams"), 
            "todolist"      => $op->lang("todolist"),
            "user"          => $op->lang("users"),
            "filemanager"  => $op->lang("file manager"),
            "usrprofile"     => $op->lang("user profile"),
        );
        return $this->arr;
    }


    public function   students_Affairs()
    {
        $op = new khas;
        $this->arr = array(
            "home"          => $op->lang("home"),
            "student"       => $op->lang("students Affairs"),
            "department"    => $op->lang("shifts"),
            "section"       => $op->lang("sections"),
            "group"         => $op->lang("groups"),
            "level"         => $op->lang("levels"),
            "subject"       => $op->lang("subjects"),
            "exams"         => $op->lang("exams"),
            "todolist"      => $op->lang("todolist"),
            "usrprofile"     => $op->lang("user profile")
        );
        return $this->arr;
    }
    public function   exams()
    {
        $op = new khas;
        $this->arr =  array(
            "home"          => $op->lang("home"),
            "exams"         => $op->lang("exams"),
            "todolist"      => $op->lang("todolist"),
            "usrprofile"     => $op->lang("user profile")
        );
        return $this->arr;
    }
    public function   finance()
    {
        $op = new khas;
        $this->arr =  array(
            "home"          => $op->lang("home"),
            "finance"       => $op->lang("finance"),
            "todolist"      => $op->lang("todolist"),
            "usrprofile"     => $op->lang("user profile")
        );
        return $this->arr;
    }
 
 
    public function top_menu($fun)
    {
        if (isset($_SESSION['log_role']) || $_SESSION['log_role'] != '') {
            if (method_exists(get_class($this), $fun)) {
                $this->$fun();
                foreach ($this->arr  as $kay => $val) {
                    echo '<a class="nav-link text-white col-6" href="' . ROOT_URL . '/' . $kay . '">' . $val . '</a>';
                }
            } else {
                die('Sorry');
            }
        } else {
             die('Sorry');
        }
    }
    public function get_menu_to_home($fun,$color)
    {
        if (isset($_SESSION['log_role']) || $_SESSION['log_role'] != '') {
            if (method_exists(get_class($this), $fun)) {
                $this->$fun();
                foreach ($this->arr  as $kay => $val) {
                    echo '<a href="'. ROOT_URL . '/' . $kay . '" class="text-white  z-depth-1  p-1   col  border " style="font-size: 11px !important;background-color:'. $color.' !important">' . $val . '</a> ';
                }
            } else {
                die('Sorry');
            }
        } else {
            die('Sorry');
        }
    }

}

                                 