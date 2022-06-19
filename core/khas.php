<?php require_once('Models.php'); ?>
<?php require_once('pdf.php'); ?>

<?php class Khas extends Model
{



    public function breadcrumb()
    {
        $controller_breadcrumb = $_GET['controller'];
        $action_breadcrumb = $_GET['action'];
        $dir = getcwd() . "/Views/" ?? '';
        if (isset($action_breadcrumb) && $action_breadcrumb != "") {
            $link  = "<a href='" . $this->siteSetting('siteUrl') . $controller_breadcrumb . "' class='text-danger'>" . $this->gar($controller_breadcrumb) . "</a>/" . $this->get_file_name($dir . $controller_breadcrumb . "/" . $action_breadcrumb . ".php");
            $_SESSION['link'] = $link;
        } else {
            $link  = "<a href='" . $this->siteSetting('siteUrl') . $controller_breadcrumb . "' class='text-dark'>" . $this->gar($controller_breadcrumb) . "</a>";
            $_SESSION['link'] = $link;
        }
    }


    public function lang($attr)
    {
        $lan_se = (defined(SYS_LANG)) ? SYS_LANG : "en";
        $contents = file_get_contents(DIR . SB . "lang" . SB . $lan_se . ".json");
        $results = json_decode($contents);

        if (!empty($results->$attr)) {
            return ucfirst($results->$attr);
        } else {
            return  ucfirst($attr);
        }
    }



    public function create_csrf()
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
            $_SESSION['token_expire'] = time();
        }

        return $_SESSION['token'];
    }



    public function csrf()
    {
        $csrf = $this->create_csrf();
        $max_time = 60 * 1;
        if ((time() >  $_SESSION['token_expire'] + $max_time)) {
            unset($_SESSION['token']);
            unset($_SESSION['token_expire']);
        }
        $this->create_csrf();
        return $csrf;
    }


    public function chek_csrf()
    {
        if ($_POST['token'] ===  $_SESSION['token']) {
            return true;
        } else {
            return false;
        }
    }


    public function get_main_style_sheet($css = "")
    {
        if (isset($_SESSION['lan_se'])) {
            if ($_SESSION['lan_se'] ==  "en") {
                $css = "ltr";
            } else {
                $css = $this->lang("dir");
            }
            return $css;
        }
    }



    public function getVersion($val)
    {
        $file = getcwd() . "/fileinfo.json";
        if (file_exists($file)) {
            $fop = file_get_contents($file);
            $data = json_decode($fop, true);
            return $data[$val];
        }
    }

    public function cleanText()
    {
    }

    function is_connected()
    {
        $connected = @fsockopen("https://gushari.xyz/upgrades/fileinfo.json", 443);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = true; //action when connected
            fclose($connected);
        } else {
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }


    public function getUpdate()
    {

        if (isset($_SESSION['update'])) {

            if ($_SESSION['update'] > $this->getVersion('version')) {
                $val = '<span class="danger-color-dark text-white btn p-0 "> <a href="' . ROOT_URL . '/settings/upgrade" class="text-white p-2 border-0"> <i class="fa fa-download"></i> ' . There_is_a_new_update . ' </a></span>';
            } else {
                $val = '<span class="success-color-dark text-white btn p-0">' . You_have_the_latest_update . ' </span>';
            }
            return $val;
        } else {
            $url = "https://gushari.xyz/upgrades/fileinfo.json";
            $fop = @file_get_contents($url);
            if ($fop) {
                $data = json_decode($fop, true);
                if ($data['version'] > $this->getVersion('version')) {
                    $val =   There_is_a_new_update;
                    $_SESSION['update'] = $data['version'];
                } else {
                    $val =   You_have_the_latest_update;
                }
                return $val;
            } else {
                return Cant_check_if_there_is_a_new_update;
            }
        }
    }


    public function getNewScriptVersionInfo()
    {
?>

        <table id="dtHorizontalExample" class="table  table-striped        z-depth-0" cellspacing="0" width="100%">
            <tr>
                <td class="p-0  border  "> <?= $this->lang("system name"); ?> </td>
                <td class="p-0  border text-center"> Idaarati </td>
            </tr>
            <tr>
                <td class="p-0  border "> <?= $this->lang("version"); ?> </td>
                <td class="p-0  border text-center"> <?php echo $this->getVersion('version'); ?> </td>
            </tr>
            <tr>
                <td class="p-0  border "> <?= $this->lang("update"); ?> </td>
                <td class="p-0  border text-center"> <?php echo $this->getUpdate(); ?> </td>
            </tr>
            <tr>
                <td class="p-0  border "> <?= $this->lang("develop"); ?> </td>
                <td class="p-0  border text-center"> Mohamoud Hussein Abdi </td>
            </tr>
            <tr>
                <td class="p-0  border "> <?= $this->lang("phone"); ?> </td>
                <td class="p-0  border text-center" style="direction: ltr">00252634115346-00252654115346</td>
            </tr>
            <tr>
                <td class="p-0  border "><?= $this->lang("email"); ?></td>
                <td class="p-0  border text-center"> <a href="mailto:gadhyare3@gmail.com"> <span><?= $this->lang("chat with me"); ?></span> <i class="fa  fa-comments-o text-success" class="text-primary"></i></a> </td>
            </tr>
            </tbody>
        </table>


        <?php
    }

    public function is_email($email)
    {
        $chemail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($chemail) {
            return true;
        } else {
            return false;
        }
    }



    public function chek_if_data_is_in($table, $field, $inpt)
    {
        $this->query("SELECT * FROM $table WHERE $field=:val");
        $this->bind(":val", $inpt);
        $row = $this->resultSet();
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function getThemeColor()
    {
        return $this->get_user_info($_SESSION['log_id'], 'themeColor');
    }


    public function siteSetting($val)
    {
        $this->query('SELECT * FROM settings');
        $settings = $this->resultSet();

        foreach ($settings as $setting) {
        }

        return $setting[$val];
    }

    /**
     * stringify 
     */
    public function siteEmailInfo($val)
    {
        $this->query('SELECT * FROM emailset');
        $settings = $this->resultSet();

        foreach ($settings as $setting) {
        }

        return $setting[$val];
    }

    function stringify($item)
    {
        return (string)$item;
    }

    public function setPosts($val)
    {
        if (isset($_POST[$val])) {
            return $_POST[$val];
        } else {
            return null;
        }
    }

    /**
     * here we can get folder name in arabic 
     * @param string keyname 
     * @param string user_appility
     */

    public function get_stting_arabic(string $keyname, string $user_appility)
    {
        $appility = new Abillity();
        $t = $this->stringify($user_appility);
        $appility_info = $appility->$t();
        if (array_key_exists($keyname, $appility_info)) {
            return  $appility_info[$keyname];
        }
    }


    public function gar(string $val)
    {
        $role = $this->stringify($_SESSION['log_role']);
        $arr = new Abillity();
        $trn_role = $arr->$role();
        return  $trn_role[$val] ?? '';
    }




    /**
     * here we can get user info
     * @param int user_id
     * @param string value
     */
    public function get_user_info(int $usrid, string $val)
    {
        $this->query('SELECT * FROM users WHERE usrid=:usrid');
        $this->bind(":usrid", $usrid);
        $rows = $this->resultSet();
        if ($rows) {
            foreach ($rows as $item) {
                $data = $item[$val];
            }
            return $data;
        }
    }
    /**
     * here we can transilate user role to arabic 
     * @param string role
     */
    public function tran_user_role_list(string $role)
    {
        $role_array = array(
            'manager' => 'مدير',
            'finance' => 'محاسب',
            'Director_of_the_Department' => 'مدير قسم',
            'admin' => 'الشؤون الإدارية',
            'students_Affairs' => 'شؤون الطلاب',
            'student' => 'طالب',
        );

        foreach ($role_array as $item => $val) {
            $sel = ($item == $role) ? "selected" : "";
            echo '<option value="' . $item . '" ' . $sel . '>' . $val . '</option>';
        }
    }
    /**
     * here we can transilate user role to arabic 
     * @param string role
     */
    public function tran_user_role(string $role)
    {
        $role_array = array(
            'manager' => 'مدير',
            'finance' => 'محاسب',
            'Director_of_the_Department' => 'مدير قسم',
            'admin' => 'الشؤون الإدارية',
            'students_Affairs' => 'شؤون الطلاب',
            'student' => 'طالب',
        );
        return $role_array[$role];
    }
    /**
     * here we can get file name in comment 
     * @param string filepath
     */

    /**
     * 
     */
    function get_gravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array())
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }


    public function get_file_name(string $filepath)
    {
        $file = $filepath;
        $searchfor = 'fileName:';

        // get the file contents, assuming the file to be readable (and exist)
        $contents = file_get_contents($file);

        // escape special characters in the query
        $pattern = preg_quote($searchfor, '/');
        // finalise the regular expression, matching the whole line
        $pattern = "/^.*$pattern.*\$/m";
        // search, and store all matching occurences in $matches
        if (preg_match_all($pattern, $contents, $matches)) {
            $filename = implode($matches[0]);
            return  str_replace("fileName:", "", str_replace("*", "", $filename));
        } else {
            return false;
        }
    }
    public function setSelectValue($sel)
    {
    }
    public function get_relType()
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $fd = ($dc === 1) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fd; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getLastStuInfo()
    {
        $this->query("SELECT * FROM stu_info ORDER BY stu_id DESC LIMIT 3");
        $row = $this->resultSet();
        if ($row) {
            return  $this->resultSet();
        }
    }

    public function getLastfee_trans()
    {
        $this->query("SELECT * FROM fee_trans ORDER BY sta_id DESC LIMIT 3");
        $row = $this->resultSet();
        if ($row) {
            return  $this->resultSet();
        }
    }


    public function FullProgInfo()
    {
        if ($_SESSION['log_role'] ==  "manager") :
            $this->query("SELECT *  from programs");
        else :

            $this->query("SELECT *  from programs   LEFT JOIN auth_roles ON programs.prog_id = auth_roles.prog_id
                        WHERE  auth_roles.usrid = :usrid");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
        endif;
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['prog_id']; ?>"><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }


    public function FullSelProgInfo($val)
    {
        if ($_SESSION['log_role'] == $this->stringify("manager") || $_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT *  from programs ORDER BY academics_id ASC");
        else :
            $this->query("SELECT *  from programs   LEFT JOIN auth_roles ON programs.prog_id = auth_roles.prog_id
                        WHERE  auth_roles.usrid = :usrid ORDER BY programs.academics_id ASC");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
        endif;
        $menu = $this->resultSet();

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['prog_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['prog_id']; ?>" <?php echo $sel; ?>><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }

    public function FullSelProgInfoByLev($val)
    {
        if ($_SESSION['log_role'] == $this->stringify("manager") || $_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT *  from programs WHERE  edulev_id =:edulev_id");
            $this->bind(":edulev_id",  $val);
        else :
            $this->query("SELECT programs.prog_id   AS prog_id , programs.fac_id AS fac_id,  programs.edulev_id AS edulev_id ,  programs.academics_id AS academics_id from programs  LEFT JOIN  auth_roles ON     programs.prog_id = auth_roles.prog_id
                            WHERE  auth_roles.usrid = :usrid AND programs.edulev_id =:edulev_id");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
            $this->bind(":edulev_id",  $val);
        endif;
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['prog_id']; ?>"><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }

    public function FullProgInfolisttxt()
    {
        if ($_SESSION['log_role'] == $this->stringify("manager") || $_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT *  from programs");
        else :

            $this->query("SELECT *  from programs   LEFT JOIN auth_roles ON programs.prog_id = auth_roles.prog_id
                        WHERE  auth_roles.usrid = :usrid");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
        endif;
        $menu = $this->resultSet();
        return $menu;
    }





    public function chkSelProgtxt($prog_id)
    {
        if ($_SESSION['log_role'] == $this->stringify("manager") || $_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT *  from programs");
        else :
            $this->query("SELECT *  from programs   LEFT JOIN auth_roles ON programs.prog_id = auth_roles.prog_id
                            WHERE  auth_roles.usrid = :usrid AND auth_roles.prog_id=:prog_id");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
            $this->bind(":prog_id", $prog_id);
        endif;
        $row = $this->resultSet();
        if ($row) {
            return true;
        } else {
            die($this->err_message());
        }
    }

    public function chkSelProg($prog_id)
    {
        if ($_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT *  from programs");
        else :
            $this->query("SELECT *  from programs   LEFT JOIN auth_roles ON programs.prog_id = auth_roles.prog_id
                            WHERE  auth_roles.usrid = :usrid AND auth_roles.prog_id=:prog_id");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
            $this->bind(":prog_id", $prog_id);
        endif;
        $row = $this->resultSet();
        if ($row) {
            return true;
        } else {
            return false;
        }
    }


    public function FullSelProgInfoList($edulev_id)
    {
        $this->query("SELECT * FROM programs WHERE edulev_id=:edulev_id");
        $this->bind(":edulev_id", $edulev_id);
        $data = $this->resultSet();
        if ($data) {
            return $data;
        }
    }


    public function FullSelProgInfotxt($val)
    {
        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']);
        }
    }



    public function FullSelProgInfobyEdulevid($val)
    {

        $this->query("SELECT * FROM programs WHERE edulev_id=:id");
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>

            <option value="<?php echo $bv['prog_id']; ?>"><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }

    public function FullSelProgInfobyEdulevidList($val)
    {
        $this->query("SELECT * FROM programs WHERE edulev_id=:id");
        $this->bind(":id", $val);
        $row = $this->resultSet();
        return $row;
    }
    public function FulltextProgInfo($id)
    {

        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            foreach ($row as $item) {
                $data =    $this->GetSeleduleveltxt($item['edulev_id']) . ' - ' . $this->GetSelfacultytxt($item['fac_id']) . ' - ' . $this->GetSelacademicstxt($item['academics_id']);
            }

            return $data;
        }
    }


    public function GetSelProgInfoTxt($id)
    {
        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return    $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']);
        }
    }

    public function getSelrelType($val)
    {
        $this->query('SELECT * FROM strurel');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Rel_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Rel_id']; ?>" <?php echo $sel; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getStuName($val)
    {
        if (isset($_SESSION['stu_id_info'])) {
            $this->query("SELECT * FROM stu_info WHERE  stu_num=:id");
            $this->bind(":id", $_SESSION['stu_id_info']);
            $stuNames = $this->resultSet();
            foreach ($stuNames as $stuName) {
            }
            return  $stuName[$val];
        }
    }

    public function getFeeTansByInvoiceId($val)
    {

        $this->query("SELECT *   FROM fee_trans     WHERE  Invoice_id=:Invoice_id");
        $this->bind(":Invoice_id", $val);
        $Invoice  = $this->resultSet();
        if ($Invoice) {
            return $this->resultSet();
        }
    }

    public function getStuNameById($val)
    {

        $this->query("SELECT * FROM stu_info WHERE  stu_id=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        foreach ($stuNames as $stuName) {
            return   $stuName['StuName'];
        }
    }


    public function get_stu_id_lists(string  $val)
    {
        $this->query("SELECT * FROM stu_info");
        $stu_info = $this->resultSet();
        foreach ($stu_info as $stu_info_id) :
            $sel = ($stu_info_id['stu_id'] == $val) ? " selected" : "";
            echo "<option value='" . $stu_info_id['stu_id'] . "' " . $sel . ">" . $stu_info_id['stu_num'] . "</option>";
        endforeach;
    }




    public function getStuInfoByStunm($val, $data)
    {
        $this->query("SELECT * FROM stu_info WHERE  stu_num=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        foreach ($stuNames as $stuName) {
            return  $stuName[$data];
        }
    }

    public function getStuInfoById($val, $data)
    {
        $this->query("SELECT * FROM stu_info WHERE  stu_id=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        if ($stuNames) {
            foreach ($stuNames as $stuName) {
                return $stuName[$data];
            }
        }
    }

    public function getStuInfoByIdAndProgId($id, $prog_id, $data)
    {
        $this->query("SELECT * FROM  stu_acadimi  WHERE stu_id=:id AND prog_id=:prog_id");
        $this->bind(":id", $id);
        $this->bind(":prog_id", $prog_id);
        $row = $this->resultSet();
        if ($row) {
            foreach ($row as $item) {
                return  $item[$data];
            }
        }
    }

    public function getSelStuInfoByIdAndProgId($stu_ac_pro, $data)
    {
        $this->query("SELECT * FROM  stu_acadimi  WHERE stu_ac_pro=:id LIMIT 1");
        $this->bind(":id", $stu_ac_pro);
        $row = $this->resultSet();
        if ($row) {
            foreach ($row as $item) {
                $data = $item[$data];
            }

            return $data;
        }
    }



    /**
     * here we can get all programs that the selected student is inroll it
     * @param int $id
     * @return int
     */
    public function get_sel_student_prgrams(int $id)
    {

        $this->query("SELECT * FROM  subject    WHERE   prog_id=:prog_id");
        $this->bind(":prog_id", $id);
        $rows = $this->resultSet();
        if ($rows) {
            foreach ($rows as $items) {
                echo '<option value="' . $items['sub_id'] . '">' . $items['subject_name'] . '</option>';
            }
        }
    }



    public function getPayReso()
    {
        $this->query('SELECT * FROM paymentres');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>"><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }

    public function getPayResoTxt($val)
    {
        $this->query('SELECT * FROM paymentres WHERE Pay_Res_id=:id');
        $this->bind(":id", $val);
        $menus = $this->resultSet();
        foreach ($menus as $bvs) {
            echo $bvs['PaymentRes'];
        }
    }

    public function getSelPayReso($val)
    {
        $this->query('SELECT * FROM paymentres');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Pay_Res_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>" <?php echo $sel; ?>><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }


    public function getFeeamout($prog_id, $Pay_Res_id)
    {
        $this->query("SELECT * FROM feeinfo WHERE prog_id=:prog_id AND Pay_Res_id=:Pay_Res_id AND active=1");
        $this->bind(":prog_id", $prog_id);
        $this->bind(":Pay_Res_id", $Pay_Res_id);
        $row = $this->resultSet();
        foreach ($row as $item) {
            return $item['fee_amount'];
        }
    }



    public function get_department()
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $fd = ($dc === 1) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['dep_id']; ?>" <?php echo $fd; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getSelDepartment($val)
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['dep_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['dep_id']; ?>" <?php echo $sel; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getSelDepartmentTxt($val)
    {
        $this->query('SELECT * FROM department WHERE dep_id=:id ');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $bv['department_name'];
        }
    }

    public function GetSelProgram($val)
    {
        $this->query('SELECT * FROM programs WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['prog_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['prog_id']; ?>" <?php echo $sel; ?>><?php echo $bv['prog_name']; ?></option>
        <?php
        }
    }

    public function Getedulevel()
    {
        $this->query('SELECT * FROM edulevel WHERE active=1');
        $row = $this->resultSet();
        foreach ($row as $item) {
            echo '<option value="' . $item['edulev_id'] . '" >' . $item['edulev_name'] . '</option>';
        }
    }


    public function GetSeledulevel($id)
    {
        $this->query('SELECT * FROM edulevel');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($id === $bv['edulev_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['edulev_id']; ?>" <?php echo $sel; ?>><?php echo $bv['edulev_name']; ?></option>
        <?php
        }
    }

    public function GetSeleduleveltxt($id)
    {
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $bv['edulev_name'];
        }
    }

    public function GetSeledulevelInfotxt($id, $val)
    {
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        //foreach ($menu as $bv) {

        return implode(array_column($menu, $val));
        //}
    }


    public function GetSellevels($val)
    {
        $this->query('SELECT * FROM levels  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['lev_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['lev_id']; ?>" <?php echo $sel; ?>><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }

    public function GetSellevelsTxt($val)
    {
        $this->query('SELECT * FROM levels  WHERE lev_id=:id');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) {
            return $bv['level_name'];
        }
    }


    public function GetSelfaculty($val)
    {
        $this->query('SELECT * FROM faculty  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['fac_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['fac_id']; ?>" <?php echo $sel; ?>><?php echo $bv['fac_name']; ?></option>
        <?php
        }
    }

    public function GetSelfacultytxt($id)
    {
        $this->query('SELECT * FROM faculty  WHERE fac_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return $bv['fac_name'];
        }
    }

    public function GetSelfacultyinfotxt($id, $val)
    {
        $this->query('SELECT * FROM faculty  WHERE fac_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        //foreach ($menu as $bv) {
        return  implode(array_column($menu, $val));
        //}
    }


    public function GetSelgroups($val)
    {
        $this->query('SELECT * FROM groups  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['grp_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['grp_id']; ?>" <?php echo $sel; ?>><?php echo $bv['group_name']; ?></option>
        <?php
        }
    }

    public function GetSelgroupsTxt($val)
    {
        $this->query('SELECT * FROM groups  WHERE grp_id=:id ');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            $data =  $bv['group_name'];
        }
        return $data;
    }


    public function GetSelFeeinfo($id, $val)
    {
        $this->query('SELECT * FROM paymentinfo  WHERE Invoice_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        // foreach ($menu as $bv) {
        // }
        return implode(array_column($menu, $val));
    }


    public function getStuInfoByInvoiceNum($id)
    {
        $this->query('SELECT * FROM paymentinfo  WHERE Invoice_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
        }
        return  $bv['stu_id'];
    }


    public function GetSelacademics($val)
    {
        $this->query('SELECT * FROM academics  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['academics_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['academics_id']; ?>" <?php echo $sel; ?>><?php echo $bv['academics']; ?></option>
        <?php
        }
    }

    public function GetSelacademicstxt($id)
    {
        $this->query('SELECT * FROM academics  WHERE academics_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $bv['academics'];
        }
    }

    public function GetSelacademicsInfotxt($id, $val)
    {
        $this->query('SELECT * FROM academics  WHERE academics_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        //foreach ($menu as $bv) {
        return implode(array_column($menu,  $val));
        //}
    }
    public function getprog_id($val)
    {
        if ($_SESSION['log_role'] == $this->stringify("manager") || $_SESSION['log_role'] == $this->stringify("manager")) :
            $this->query("SELECT * FROM subject WHERE prog_id=:prog_id AND active = 1");
            $this->bind(":prog_id",  $val);
        else :
            $this->query("SELECT DISTINCT subject.prog_id as   prog_ids , subject.sub_id as sub_id , subject.subject_name as subject_name  FROM subject   
                            LEFT JOIN auth_roles 
                            ON subject.prog_id = subject.prog_id
                          WHERE  auth_roles.usrid = :usrid AND   subject.prog_id=:prog_id");
            $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
            $this->bind(":prog_id",  $val);
        endif;
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['sub_id']; ?>"><?php echo   $bv['subject_name']  ?> </option>
        <?php
        }
    }

    public function getSelprogramInfoById($id, $val)
    {

        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id",  $id);
        $menu = $this->resultSet();
        return implode(array_column($menu, $val));
    }

    public function get_section()
    {
        $this->query('SELECT * FROM section WHERE active=1 ');
        $menu = $this->resultSet();
        $sc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fs = ($sc === 1) ? 'selected' : ''; ?>
            <?php $sc++; ?>
            <option value="<?php echo $bv['sec_id']; ?>" <?php echo $fs; ?>><?php echo $bv['section_name']; ?></option>
        <?php
        }
    }


    public function getActiveInfo($val)
    {
        if ($val == 1) {
            return "مفعل";
        } else {
            return "غير مفعل";
        }
    }

    public function is_active($val)
    {
        if ($val == 1) {
            echo '<option value="1">'.$this->lang("active").'</option><option value="2">'.$this->lang("non active") .'</option>';
        } else {
            echo '<option value="2">'.$this->lang("non active") .'</option><option value="1">'.$this->lang("active").'</option>';
        }
    }
    public function getSelesection($val)
    {
        $this->query('SELECT * FROM section WHERE active=1 ');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['sec_id']) ? ' selected' : ''; ?>
            <option value="<?php echo $bv['sec_id']; ?>" <?php echo $sel; ?>><?php echo $bv['section_name']; ?></option>
        <?php
        }
    }

    public function getSelesectionTxt($val)
    {
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            $sel = ($val == $bv['sec_id']) ? 'selected' : '';
            return $bv['section_name'];
        }
    }

    public function get_group()
    {
        $this->query('SELECT * FROM groups WHERE active=1 ');
        $menu = $this->resultSet();
        $gc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fg = ($gc === 1) ? 'selected' : ''; ?>
            <?php $gc++; ?>
            <option value="<?php echo $bv['grp_id']; ?>" <?php echo $fg; ?>><?php echo $bv['group_name']; ?></option>
        <?php
        }
    }

    public function get_level()
    {
        $this->query('SELECT * FROM levels WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['lev_id']; ?>" <?php echo $fl; ?>><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }

    public function get_subject()
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name'] . ' | ' . $bv['subject_code']; ?></option>

        <?php
        }
    }

    public function get_subject_code(int $id)
    {
        $this->query('SELECT * FROM subject WHERE  sub_id=:sub_id');
        $this->bind(":sub_id", $id);
        $row = $this->resultSet();
        foreach ($row as $item) {
            $data = $item['subject_code'];
        }

        return $data;
    }

    public function getsubjectByPro($id)
    {
        $this->query("SELECT * FROM subject WHERE");
        $menu = $this->resultSet();
    }

    public function get_ex_level()
    {
        $this->query('SELECT * FROM levels WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['id']; ?>"><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }
    public function get_ex_subject()
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name']; ?></option>

        <?php
        }
    }


    public function getSeleExsubject($val)
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['sub_id']) ? 'selected' : ''; ?>

            <option value="<?php echo $bv['sub_id']; ?>" <?php echo $sel; ?>><?php echo $bv['subject_name']; ?></option>
        <?php
        }
    }

    public function getSelExsubTxt($val)
    {
        $this->query('SELECT * FROM subject WHERE  sub_id=:val');
        $this->bind(":val", $val);
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) {
        }

        return @$bv['subject_name'];
    }


    public function getSeleExsubjectByProgId($val)
    {
        $this->query('SELECT * FROM subject WHERE prog_id=:prog_id AND  active=1 ');
        $this->bind(":prog_id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $fl = ($bv['sub_id'] == 1) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['sub_id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name']; ?></option>
        <?php
        }
    }

    public function getSelExsubByProgIdTxt($prog_id, $sub_id)
    {
        $this->query('SELECT * FROM subject WHERE     prog_id=:prog_id AND   sub_id=:sub_id');
        $this->bind(":prog_id", $prog_id);
        $this->bind(":sub_id", $sub_id);
        $menu = $this->resultSet();
        if ($menu) {
            foreach ($menu as $bv) {
                return $bv['subject_name'];
            }
        }
    }


    public function getSelpaymentres($val)
    {
        $this->query('SELECT * FROM paymentres WHERE active=1 ');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Pay_Res_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>" <?php echo $sel; ?>><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }


    public function getSelpaymentrestxt($val)
    {
        $this->query('SELECT * FROM paymentres WHERE Pay_Res_id=:Pay_Res_id AND  active=1 ');
        $this->bind(":Pay_Res_id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            echo $bv['PaymentRes'];
        }
    }

    public function get_students_number()
    {
        $this->query('SELECT * FROM stu_info WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['StuNum'] . ' | ' . $bv['StuName']; ?></option>
        <?php
        }
    }

    public function get_user_status()
    {
        $this->query('SELECT * FROM users');
        $user_st = $this->resultSet();
        $usr_st = 1;
        foreach ($user_st as $st) { ?>
            <?php $fl = ($usr_st === 1) ? 'selected' : ''; ?>
            <?php $usr_st++; ?>
            <option value="1"> مفعل </option>
            <option value="2"> غير مفعل </option>
            <?php
        }
    }


    public function get_last_stu_num()
    {
        $this->query('SELECT * FROM stu_info');
        $results = $this->resultSet();
        if ($this->rowCount() > 0) {
            foreach ($results as $rows) {
            }
            return  $rows['stu_id'] + 1;
        } else {
            return  1;
        }
    }



    /**
     * here we can get number of registerd students 
     * 
     */
    public function get_stu_num()
    {
        $this->query('SELECT * FROM stu_info');
        $results = $this->resultSet();
        if ($this->rowCount() > 0) {
            return $this->rowCount();
        } else {
            return  0;
        }
    }

    public function countfaculty()
    {
        $this->query('SELECT COUNT(fac_id) AS  fac_id FROM faculty');
        $rows = $this->resultSet();
        return $rows[0]['fac_id'];
    }


    public function countPrograms()
    {
        $this->query('SELECT COUNT(prog_id) AS  prog_id FROM programs');
        $rows = $this->resultSet();
        return $rows[0]['prog_id'];
    }

    public function countSection()
    {
        $this->query('SELECT COUNT(sec_id) AS  sec_id FROM section');
        $rows = $this->resultSet();
        return $rows[0]['sec_id'];
    }

    public function countGrp()
    {
        $this->query('SELECT COUNT(grp_id) AS  grp_id FROM groups');
        $rows = $this->resultSet();
        return $rows[0]['grp_id'];
    }


    public function countLev()
    {
        $this->query('SELECT COUNT(lev_id) AS  lev_id FROM levels');
        $rows = $this->resultSet();
        return $rows[0]['lev_id'];
    }

    public function countSub()
    {
        $this->query('SELECT COUNT(sub_id) AS  sub_id FROM subject');
        $rows = $this->resultSet();
        return $rows[0]['sub_id'];
    }



    public function countUsers()
    {
        $this->query('SELECT COUNT(usrid) AS  usrid FROM users');
        $rows = $this->resultSet();
        return $rows[0]['usrid'];
    }


    public function get_last_registed_students()
    {
        $this->query('SELECT * FROM stu_info ORDER BY id DESC LIMIT 10');
        $rows = $this->resultSet();
        return $rows;
    }



    public function PrintSub()
    {
        $this->query('SELECT * FROM  levels limit 3');
        $rows  = $this->resultSet();

        return json_encode($rows);
    }




    public function get_student_rel()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('SELECT * FROM stu_rel  INNER JOIN stu_info ON stu_rel.StuNum =:id');
        $this->bind(':id',  $post['stu_num']);
        $stu_rel_select = $this->resultSet();
        foreach ($stu_rel_select as $relinfo) :

        endforeach;
        echo $relinfo['relname'];;
    }


    public function getSeltudent_rel($val)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('SELECT * FROM strurel  WHERE stu_id=:id');
        $this->bind(':id',  $val);
        $stu_rel_select = $this->resultSet();
        foreach ($stu_rel_select as $relinfo) :
        endforeach;
        echo $relinfo['relname'];;
    }


    public function showStuRecordLev()
    {
        $id = intval($_GET['id']);
        if ($id) {
            $this->query('SELECT * FROM exams WHERE stu_num =:stu_num');
            $this->bind(':stu_num', $id);
            $this->single();
            $rows = $this->resultSet();
            return $rows;
        }
    }

    public function report_with_no_customized($id,   $prog_id)
    {
        $x = 1;
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
            $this->bind(':stu_id', $id);
            $this->bind(':prog_id', $prog_id);

            $rows = $this->resultSet();
            $no = 1;
            $mysub = 1;
            foreach ((array) $rows as $stulev) : ?>
                <?php $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']); ?>
                <?php $CurrentLevId = $stulev['lev_id']; ?>
                <table class="table border-0 text-center  m-auto">
                    <tr>
                        <td class="p-1 ">
                        <?=$this->lang("level");?>: <?php echo $gettStulev; ?>
                        </td>
                    </tr>
                </table>
                <table class="print-table text-center   m-auto">
                    <tr>
                        <td class="p-0 text-dark text-center" rowspan="2"> م</td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("subject");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("code");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("marks");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("credit Hours");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("grade");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("total");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("point");?> </td>
                    </tr>
                    <tbody>
                        <?php
                        $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                        $this->bind(':stu_id', $id);
                        $this->bind(':lev_id', $CurrentLevId);
                        $rowss = $this->resultSet();
                        $x = 1;
                        foreach ($rowss as $ecStuLev) :
                            $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att']; ?>
                            <?php $exSatuse = ($total < 50) ? 'class ="ex-Failed  "' : ''; ?>
                            <?php $bgexSatuse = ($total < 50) ? 'ex-Failed p-0 rounded-0 ' : 'bg-white p-0 rounded-0  '; ?>
                            <tr>
                                <td class="p-1 text-center" width="5%"> <?php echo $x++; ?> </td>
                                <td class="p-1 text-center" width="15%"><?php echo $this->getSelExsubTxt($ecStuLev['sub_id']); ?> </td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex_code']; ?></td>
                                <td class="p-1 text-center"> <?php echo $total; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex_crid']; ?></td>
                                <td class="p-1 text-center"> <?php echo $this->get_gpa($total); ?></td>
                                <td class="p-1 text-center"> <?php echo  $ecStuLev['sub_gradPoint']; ?></td>
                                <td class="p-1 text-center"> <?php echo  $ecStuLev['sub_Point']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <tbody>
                </table>
                <?php $this->getexamInfo($_GET['id'], $_GET['prog_id'], $stulev['lev_id']); ?>
            <?php
            endforeach;
        }
    }

    public function report_with_no_customizedpdf($id,   $prog_id, $stu_ac_pro, $firstString, $secondtString, $therdString, $foruthString)
    {

        $pdf = new pdf();
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
            $this->bind(':stu_id', $id);
            $this->bind(':prog_id', $prog_id);

            $rows = $this->resultSet();
            $no = 1;
            $mysub = 1;
            $con = "";
            $stu_name = $this->getStuInfoById($id, 'StuName');
            $stu_num  = $this->getStuInfoById($id, 'stu_num');
            $prog_id  = $this->GetSelProgInfoTxt($prog_id);
            $sec_id   = $this->getSelesectionTxt($this->getSelStuInfoByIdAndProgId($stu_ac_pro,  'sec_id'));
            $dep_id   = $this->getSelDepartmentTxt($this->getSelStuInfoByIdAndProgId($stu_ac_pro, 'dep_id'));
            $grp_id   = $this->GetSelgroupsTxt($this->getSelStuInfoByIdAndProgId($stu_ac_pro, 'grp_id'));
            $regDate = $_SESSION['regDate'];
            $endDate = $_SESSION['endDate']; 
            $dir = (LANG_DIR === 'rtl') ? ' text-align:right' : ' text-align:left';
            $con .= '<table   cellspacing="0" cellpadding="3" style="border: 0.25px solid #333; " >
                    <tr>
                        <td class="p-1" style="font-size:16px; '.$dir.';border: 0.25px solid #333;" colspan="3"> '.$this->lang("name") .': ' . $stu_name . '</td>
                        <td class="p-1" style="font-size:16px; '.$dir.';border: 0.25px solid #333;"  > '.$this->lang("id number") .': <span style="direction:rtl">' . $stu_num . '</span></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size:14px; '.$dir.';border: 0.25px solid #333;" colspan="2"> '.$this->lang("program") .': ' . $prog_id . '</td>
                        <td class="p-1" style="font-size:16px; '.$dir.';border: 0.25px solid #333;"  > '.$this->lang("register date") .': ' . $regDate . '</td>
                        <td class="p-1" style="font-size:16px; '.$dir.';border: 0.25px solid #333;"  > '.$this->lang("graduate date") .': ' . $endDate . '</td>
                    </tr>                
                    
                </table> <br><br><br>';
            foreach ((array) $rows as $stulev) :
                $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']);
                $CurrentLevId = $stulev['lev_id'];
                $con .= '<br><br>
                <table  cellspacing="0" cellpadding="3">
                    <tr>
                        <td class="p-1" style="font-size:16px; border: 0.25px solid #333;">
                            '.$this->lang("level") .': ' . $gettStulev . '
                        </td>
                    </tr>
                </table>';

                $con .= $this->get_top_trans();

                $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                $this->bind(':stu_id', $id);
                $this->bind(':lev_id', $CurrentLevId);
                $rowss = $this->resultSet();
                $x = 1;
                $con .= '<table  cellspacing="0" cellpadding="3">';
                foreach ($rowss as $ecStuLev) :
                    $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att'];
                    if ($_GET["teans_type"] ==  "true") :
                        $con .= '<tr>
                                            <td  style="font-size:14px;border:1px solid #333;" width="5%">' . $x++  . '</td>
                                            <td  style="font-size:12px;border:1px solid #333;" width="20%"> ' . $this->getSelExsubTxt($ecStuLev['sub_id']) . '</td>
                                            <td  style="font-size:12px;border:1px solid #333;" > ' .  $ecStuLev['ex_code'] . '</td> 
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $ecStuLev['ex_crid'] . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $this->get_gpa($total) . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $ecStuLev['sub_gradPoint'] . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;" colspan="2"> ' .  $ecStuLev['sub_Point'] . '</td>
                                        </tr>';
                    endif;
                    if ($_GET["teans_type"] ==  "false") :
                        $con   .= '<tr>
                                            <td  style="font-size:14px;border:1px solid #333;" width="5%">' . $x++  . '</td>
                                            <td  style="font-size:12px;border:1px solid #333;" width="20%"> ' . $this->getSelExsubTxt($ecStuLev['sub_id']) . '</td>
                                            <td  style="font-size:12px;border:1px solid #333;"  > ' .  $ecStuLev['ex_code'] . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $total . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $ecStuLev['ex_crid'] . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $this->get_gpa($total) . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $ecStuLev['sub_gradPoint'] . '</td>
                                            <td  style="font-size:14px;border:1px solid #333;"> ' .  $ecStuLev['sub_Point'] . '</td>
                                        </tr>';
                    endif;
                endforeach;

                $con .= '</table>' . $this->getexamInfo($_GET['id'], $_GET['prog_id'], $stulev['lev_id']);;


            endforeach;

            if ($_GET["teans_type"] ==  "true") :
                $getPointTotal = number_format((float) $this->getGrandTotal($_GET['id'], $_GET['prog_id'], 'GGPA'), 2, ".", "");
                $vals = '<br><br><br><table style="font-size:14px; text-align:right; "><tr><td> '. $this->lang("total number of hours").': ' . $this->getcrdTotal($_GET['id'], $_GET['prog_id']) . '</td> ';
                $vals .= '<td style="font-size:14px; text-align:left; ">  '. $this->lang("overall rating").'  : ' . $getPointTotal . '</td></tr></table>';
                $vals .= '<br><hr> ';
                $vals .= '<br><table style="font-size:14px; text-align:center; ">';
                $vals .=   '<tr><td>  '. $this->lang("egree requirements completed") . $prog_id . ' </td></tr>';
                $vals .=   '<tr><td> ' . $this->siteSetting('siteName') . ' </td></tr>';
                $vals .=   '<tr><td> Web: ' . rtrim($this->siteSetting('rel_site'), '/') . '  </td></tr>';
                $vals .=   '<tr><td> Email: ' . $this->siteSetting('siteEmail') . '  </td></tr>';
                $vals .=   '<tr><td> Tel: ' . $this->siteSetting('sitePhones') . '  </td></tr>';
                if ($this->siteSetting('siteName') == 'Gollis university') :
                    $vals .=   '<tr><td>  New Grade Point Average was addepted on date : 2010  </td></tr>';
                endif;
                $vals .= '</table>';
            else :
                $vals = '';
            endif;
            $con .= $vals;
            $this->pdfData($this->lang("transcript"), $this->lang("student transcript"), $con, $firstString, $secondtString, $therdString, $foruthString);
        }
    }


    public function get_top_trans()
    {

        if ($_GET["teans_type"] ==  "true") :
            $val  = '<table  cellspacing="0" cellpadding="3"> 
                                        <tr>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  width="5%" >'.$this->lang("no").'</td>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"   width="20%"> '.$this->lang("course").' </td>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("code").'</td> 
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("redit hours").' </td>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("grade").' </td>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  >  '.$this->lang("total marks").' </td>
                                            <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333" colspan="2"  > '.$this->lang("course point").' </td>
                                        </tr></table>
                                        ';

        else :
            $val  = '<table  cellspacing="0" cellpadding="3"><tr>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  width="5%" >'.$this->lang("no").'</td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"   width="20%"> '.$this->lang("course").' </td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("code").'</td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  >  '.$this->lang("marks").' </td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("redit hours").' </td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("grade").' </td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  >  '.$this->lang("total marks").' </td>
                                                <td  style="font-size:14px; text-align:center; background-color:#eee;border: 1px solid #333"  > '.$this->lang("course point").' </td>
                                            </tr></table>
                                            ';
        endif;

        $con = $val;
        return $con;
    }




    public function report_with_customized(int  $id, int $prog_id)
    {


        $x = 1;
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
            $this->bind(':stu_id', $id);
            $this->bind(':prog_id', $prog_id);

            $rows = $this->resultSet();
            $no = 1;
            $mysub = 1;
            foreach ((array) $rows as $stulev) : ?>
                <?php $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']); ?>
                <?php $CurrentLevId = $stulev['lev_id']; ?>
                <br>
                <table class="print-table text-center   m-auto" id="tableOfTotal">
                    <tr>
                        <td class="p-0 text-dark text-center" width="5%">  <?=$this->lang("no");?></td>
                        <td class="p-0 text-dark text-center" width="10%">  <?=$this->lang("course");?> </td>
                        <td class="p-0 text-dark text-center" width="10%"> <?=$this->lang("max mark");?></td>
                        <td class="p-0 text-dark text-center" width="10%"> <?=$this->lang("min mark");?></td>
                        <td class="p-0 text-dark text-center" width="15%"> <?=$this->lang("marks in number");?> </td>
                        <td class="p-0 text-dark text-center" width="25%"> <?=$this->lang("marks in letter");?> </td>
                        <td class="p-0 text-dark text-center" width="5%"> <?=$this->lang("grade");?> </td>
                    </tr>
                    <tbody>
                        <?php
                        $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                        $this->bind(':stu_id', $id);
                        $this->bind(':lev_id', $CurrentLevId);
                        $rowss = $this->resultSet();
                        $x = 1;
                        foreach ($rowss as $ecStuLev) :
                            $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att']; ?>
                            <?php $exSatuse = ($total < 50) ? 'class ="ex-Failed  "' : ''; ?>
                            <?php $bgexSatuse = ($total < 50) ? 'ex-Failed p-0 rounded-0 ' : 'bg-white p-0 rounded-0  '; ?>
                            <tr>
                                <td class="p-1 text-center" width="5%"> <?php echo $x++; ?> </td>
                                <td class="p-1 text-center" width="15%"><?php echo $this->getSelExsubTxt($ecStuLev['sub_id']); ?> </td>
                                <td class="p-1 text-center"> 100</td>
                                <td class="p-1 text-center"> 50</td>
                                <td class="p-1 text-center"> <?php echo $total; ?></td>
                                <td class="p-1 text-center"> <?php echo  intval($total); ?> </td>
                                <td class="p-1 text-center"> <?php echo $this->get_gpa(intval($total)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <tbody>
                </table>
                <?php $this->getexamInfo($this->getStuInfoByStunm($_GET['id'], 'stu_id'), $_GET['prog_id'], $stulev['lev_id']); ?>
            <?php
            endforeach;
        }
    }

    public function get_stuLev($id, $prog_id)
    {

 

        $i = 1;
        $x = 1;
        $p = 1;
        $v = 1;
        $subname = 1;
        $sessions = 1;
        $sessionsVal = 1;
        $ty = 1;
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
            $this->bind(':stu_id', $id);
            $this->bind(':prog_id', $prog_id);
            $this->single();
            $rows = $this->resultSet();
            $no = 1;
            $mysub = 1;
            foreach ((array) $rows as $stulev) : ?>
                <?php $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']); ?>
                <?php $CurrentLevId = $stulev['lev_id']; ?>


                <table class="table border-0 text-center  m-auto">
                    <tr>
                        <td class="p-1 ">
                            <?=$this->lang("level"). ":". $gettStulev; ?>
                        </td>
                    </tr>
                </table>

                <table class="print-table text-center   m-auto">
                    <tr>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("no");?></td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("subject");?> </td>
                        <td class="p-0 text-dark text-center" colspan="3">
                        <?=$this->lang("first tearm");?>
                        </td>
                        <td class="p-0 text-dark text-center" colspan="3">
                        <?=$this->lang("second tearm");?>
                        </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("attendance");?> </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> <?=$this->lang("total");?></td>
                        <td class="p-0 text-dark text-center" rowspan="2">  <?=$this->lang("grade");?></td>
                        <?php if ($_GET['action'] == 'stuGpa') : ?>
                            <td class="p-0 text-dark text-center" rowspan="2">  <?=$this->lang("operation");?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("questions");?></td>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("assignment");?></td>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("test");?></td>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("questions");?></td>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("assignment");?></td>
                        <td class="p-0 text-dark text-center"> <?=$this->lang("test");?> </td>
                    </tr>
                    <tbody>
                        <?php
                        $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                        $this->bind(':stu_id', $id);
                        $this->bind(':lev_id', $CurrentLevId);
                        $rowss = $this->resultSet();
                        $x = 1;
                        foreach ($rowss as $ecStuLev) :
                            $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att']; ?>
                            <?php $exSatuse = ($total < 50) ? 'class ="ex-Failed  "' : ''; ?>
                            <?php $bgexSatuse = ($total < 50) ? 'ex-Failed p-0 rounded-0 ' : 'bg-white p-0 rounded-0  '; ?>
                            <tr>
                                <td class="p-1 text-center" width="5%"> <?php echo $x++; ?> </td>
                                <td class="p-1 text-center" width="15%">
                                    <span style="font-size:80% !important;"> <?php echo $this->getSelExsubTxt($ecStuLev['sub_id']); ?> </span>
                                </td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['qu1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['as1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['qu2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['as2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['att']; ?></td>
                                <td class="p-1 text-center"> <?php echo $total; ?></td>
                                <td class="p-1 text-center"> <?php echo $this->get_gpa($total); ?></td>
                                <?php if ($_GET['action'] == 'stuGpa') : ?>
                                    <td class="p-1 text-center">
                                        <a href="<?php echo ROOT_URL; ?>/exams/updatestuexam/<?php echo $ecStuLev['ex_id']; ?>/<?php echo $_GET['action']; ?>" target="_blank" class="unique-color-dark  text-white rounded-0  px-1 ml-1 py-0  mt-2"> <i class="fa fa-pencil p-1" aria-hidden="true"></i> </a>
                                        <a href="<?php echo ROOT_URL; ?>/exams/stdelexam/<?php echo $ecStuLev['ex_id']; ?>/<?php echo $_GET['action']; ?>" target="_blank" class="danger-color-dark  text-white rounded-0  px-1 ml-1 py-0  mt-2"> <i class="fa fa-trash-o p-1" aria-hidden="true"></i> </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                <?php endforeach;
                    endforeach;
                    echo '</table>';
                }
            }



            public function get_stuLevGPA($id, $prog_id)
            {
                if ($this->customize_report()) {
                    $this->report_with_customized($id,   $prog_id);
                } else {
                    $this->report_with_no_customized($id,   $prog_id);
                }
            }

            public function  getLevContinueTotal($id, $prog_id, $lev, $val)
            {
                if ($this->customize_report()) {
                    $this->query("SELECT exams.stu_id,exams.prog_id, exams.lev_id, 
                                Sum(as1+qu1+ex1+as2+qu2+ex2+att) AS total, 
                                Sum(exams.sub_Point) AS sub_Point, Sum(exams.ex_crid) AS ex_crid, Sum(exams.as1+exams.qu1+exams.ex1+exams.as2+exams.qu2+exams.ex2+exams.att)/count(exams.stu_id) AS CRGPA
                                FROM exams
                                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                    $this->bind(":stu_id", $id);
                    $this->bind(":prog_id", $prog_id);
                    $this->bind(":lev_id", $lev);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $rows) {
                            return $rows[$val];
                        }
                    } else {
                        echo SUCCESS;
                    }
                } else {
                    $this->query("SELECT  exams.stu_id as stu_id, count( exams.stu_id) as coStu,  exams.prog_id as prog_id,  exams.lev_id as lev_id, 
                            Sum( exams.as1+ exams.qu1+ exams.ex1+ exams.as2+ exams.qu2+ exams.ex2+ exams.att) AS total, 
                            Sum( exams.sub_Point) AS sub_Point, Sum( exams.ex_crid) AS ex_crid, Sum( exams.sub_Point)/count( exams.stu_id) AS CRGPA
                            FROM  exams 
                            GROUP BY  exams.stu_id,  exams.prog_id,  exams.lev_id 
                            HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                    $this->bind(":stu_id", $id);
                    $this->bind(":prog_id", $prog_id);
                    $this->bind(":lev_id", $lev);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $rows) {
                            return $rows[$val];
                        }
                    } else {
                        echo SUCCESS;
                    }
                }
            }

            public function  getLevTotal($id, $prog_id, $lev, $val)
            {
                if ($this->customize_report()) {
                    $this->query("SELECT exams.stu_id, count(exams.stu_id) as coStu, exams.prog_id, exams.lev_id, 
                                Sum(as1+qu1+ex1+as2+qu2+ex2+att) AS total, 
                                Sum(exams.sub_Point) AS sub_Point, Sum(exams.ex_crid) AS ex_crid, Sum(exams.as1+exams.qu1+exams.ex1+exams.as2+exams.qu2+exams.ex2+exams.att)/count(exams.stu_id) AS CRGPA
                                FROM exams
                                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                    $this->bind(":stu_id", $id);
                    $this->bind(":prog_id", $prog_id);
                    $this->bind(":lev_id", $lev);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $rows) {
                            return $rows[$val];
                        }
                    } else {
                        echo SUCCESS;
                    }
                } else {
                    $this->query("SELECT exams.stu_id, count(exams.stu_id) as coStu, exams.prog_id, exams.lev_id, 
                            Sum(as1+qu1+ex1+as2+qu2+ex2+att) AS total, 
                            Sum(exams.sub_Point) AS sub_Point, Sum(exams.ex_crid) AS ex_crid, Sum(sub_Point)/count(exams.stu_id) AS CRGPA
                            FROM exams
                            GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                            HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                    $this->bind(":stu_id", $id);
                    $this->bind(":prog_id", $prog_id);
                    $this->bind(":lev_id", $lev);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $rows) {
                            return $rows[$val];
                        }
                    } else {
                        echo SUCCESS;
                    }
                }
            }


            public function  getcrdTotal($id, $prog_id)
            {

                $this->query("SELECT exams.stu_id, count(exams.stu_id) as coStu, exams.prog_id,Sum(exams.ex_crid) AS ex_crid
                                FROM exams
                                GROUP BY exams.stu_id, exams.prog_id
                                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                        return $rows['ex_crid'];
                    }
                } else {
                    echo SUCCESS;
                }
            }


            public function  getPointTotal($id, $prog_id, $val)
            {

                $this->query("SELECT stu_id, prog_id, lev_id, Sum(sub_Point)/Sum(ex_crid)   AS GGPA
                            FROM exams
                            GROUP BY stu_id, prog_id 
                            HAVING (((stu_id)=:stu_id) AND ((prog_id)=:prog_id) )");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }

                //$this->getGradeFromPoint(number_format((float) $this->getLevGrandTotal($id, $prog_id, $lev, 'GGPA'), 0, ".", ""));
            }

            public function  getLevTotal_with_custome_report($id, $prog_id, $lev, $val)
            {

                $this->query("SELECT exams.stu_id, count(exams.stu_id) as coStu, exams.prog_id, exams.lev_id, 
                        Sum(as1+qu1+ex1+as2+qu2+ex2+att) AS total, 
                        Sum(exams.sub_Point) AS sub_Point, Sum(exams.ex_crid) AS ex_crid, Sum(exams.as1+exams.qu1+exams.ex1+exams.as2+exams.qu2+exams.ex2+exams.att)/coStu AS CRGPA
                        FROM exams
                        GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                        HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }

            public function  getLevsub_gradPoint($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_gradPoint)/Sum(exams.ex_crid) AS CRGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }

            public function  getLevGrandTotal($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_Point)/Sum(exams.ex_crid)   AS GGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)<=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
                //$this->getGradeFromPoint(number_format((float) $this->getLevTotal($id, $prog_id, $lev, "CRGPA"), 0, ".", ""))ك
            }

            public function  getGrandTotal($id, $prog_id)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_Point)/Sum(exams.ex_crid)   AS GGPA
                            FROM exams
                            GROUP BY exams.stu_id, exams.prog_id  
                            HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows['GGPA'];
                } else {
                    echo SUCCESS;
                }
            }


            public function  getLevGrandTotal_with_custome_report($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_Point)/Sum(exams.ex_crid)   AS GGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)<=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }
            public function getexamInfo($id, $prog_id, $lev)
            {
                if ($this->customize_report()) :
                    $con = '
                    <hr style="margin:0;">
                    <table  border="1" cellspacing="0" cellpadding="3">
                        <tr>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" width="5%"> # </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"  width="20%" > '. $this->lang("total") .' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"   id="topTotal"> </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"   id="downTotal"> </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"   > ' . number_format($this->getLevTotal($id, $prog_id, $lev, 'total'), 0, ".", "") . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"  > ' .  intval(number_format($this->getLevTotal($id, $prog_id, $lev, 'total'), 0, ".", ""))  . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" colspan="2" > ' . $this->get_gpa(number_format((float) number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'total'), 0, ".", "") /   number_format((float) $this->count_subjects_inexam_by_level($id, $prog_id, $lev), 0, ".", ''), 0, ".", '')) . ' </td>
                        </tr>
                    </table>';
                else :
                    $con = '<table  cellspacing="0" cellpadding="3">
                        <tr>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" width="5%"> # </td>
                        
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" width="20%">'. $this->lang("g.total") .': ' . number_format((float) $this->getLevTotal($id, $prog_id, $lev, "total"), 0, ".", "") . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;"  >'. $this->lang("g.credit hours") .': ' . number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'ex_crid'), 0, ".", "") . '</td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" > '. $this->lang("") .' : ' . number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'CRGPA'), 0, ".", "") . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" > ت. الفصلي : ' . $this->getGradeFromPoint(number_format((float) $this->getLevTotal($id, $prog_id, $lev, "CRGPA"), 0, ".", "")) . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" > ن. التراكمية: ' . number_format((float) $this->getLevGrandTotal($id, $prog_id, $lev, 'GGPA'), 0, ".", "") . ' </td>
                            <td style="font-size:14px;background-color:#eee;border:1px solid #333;" colspan="2" > ت. التراكمي : ' . $this->getGradeFromPoint(number_format((float) $this->getLevGrandTotal($id, $prog_id, $lev, 'GGPA'), 0, ".", "")) . ' </td>
                        </tr>
                    </table>';
                endif;

                return $con;
            }


            public function count_subjects_inexam_by_level($id, $prog_id, $lev)
            {
                $this->query("SELECT COUNT( ex_id ) as ex_id FROM  exams  WHERE stu_id=:stu_id AND prog_id=:prog_id  AND lev_id=:lev_id");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows['ex_id'];
                }
            }
            public function get_gpa($totals)
            {
                if ($totals >= 96) {
                    $avg =  "*A";
                } elseif ($totals >= 91) {
                    $avg =  "A";
                } elseif ($totals >= 86) {
                    $avg =  "-A";
                } elseif ($totals >= 80) {
                    $avg =  "*B";
                } elseif ($totals >= 75) {
                    $avg =  "B";
                } elseif ($totals >= 70) {
                    $avg =  "-B";
                } elseif ($totals >= 65) {
                    $avg =  "*C";
                } elseif ($totals >= 60) {
                    $avg =  "C";
                } elseif ($totals >= 55) {
                    $avg =  "-C";
                } elseif ($totals >= 50) {
                    $avg =  "D";
                } else {
                    $avg =  "F";
                }
                return $avg;
            }
            public function getPoint($totals)
            {
                if ($totals >= 96) {
                    $getPon =  4;
                } elseif ($totals >= 91) {
                    $getPon =  3.75;
                } elseif ($totals >= 86) {
                    $getPon =  3.50;
                } elseif ($totals >= 80) {
                    $getPon =  3.25;
                } elseif ($totals >= 75) {
                    $getPon =  3;
                } elseif ($totals >= 70) {
                    $getPon =  2.75;
                } elseif ($totals >= 65) {
                    $getPon =  2.5;
                } elseif ($totals >= 60) {
                    $getPon =  2.25;
                } elseif ($totals >= 55) {
                    $getPon =  2;
                } elseif ($totals >= 50) {
                    $getPon =  1;
                } else {
                    $getPon =  0;
                }
                return $getPon;
            }

            public function getGradeFromPoint($Point)
            {
                if ($Point >= 4) {
                    $avg =  "A";
                    return $avg;
                } elseif ($Point >= 3.70) {
                    $avg =  "-A";
                    return $avg;
                } elseif ($Point >= 3.50) {
                    $avg =  "+B";
                    return $avg;
                } elseif ($Point >= 3.35) {
                    $avg =  "B";
                    return $avg;
                } elseif ($Point >= 3.00) {
                    $avg =  "-B";
                    return $avg;
                } elseif ($Point >= 2.70) {
                    $avg =  "+C";
                    return $avg;
                } elseif ($Point >= 3.35) {
                    $avg =  "C";
                    return $avg;
                } elseif ($Point >= 2) {
                    $avg =  "-C";
                    return $avg;
                } else {
                    $avg =  "F";
                    return $avg;
                }
            }






            public function upSub($crdhoure, $totals)
            {
                $result =  $crdhoure  * $totals;
                return $result;
            }

            public function getUsrAppilty($role = '')
            {
                $this->query('SELECT * FROM usr_rol WHERE role=:role');
                $this->bind(':role',  $role);
                $logrole = $this->resultSet();
                return $logrole;
            }




            public function getStuRelInfo()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM strurel WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :

                        return $row;

                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }

            public function getStuRelIquali()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM edu_quali WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :

                        return $row;

                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }


            public function getStudentacademicPro()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM stu_acadimi WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :
                        return $row;
                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }




            public function getallstuUpFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id)
            {
                $this->query("SELECT * FROM paymentinfo WHERE stu_id=:stu_id AND lev_id<:lev_id AND Pay_Res_id =:Pay_Res_id");
                $this->bind(":stu_id", $stu_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    $this->query("SELECT sum(want) AS TotalWant  FROM paymentinfo WHERE stu_id=:stu_id AND lev_id<:lev_id AND Pay_Res_id =:Pay_Res_id");
                    $this->bind(":stu_id", $stu_id);
                    $this->bind(":lev_id", $lev_id);
                    $this->bind(":Pay_Res_id", $Pay_Res_id);
                    $val = $this->resultSet();
                    foreach ($val as $rows) {
                        return $rows['TotalWant'];
                    }
                } else {
                    return  0;
                }
            }

            public function getallstupaidFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id,   $prog_id)
            {
                $this->query("SELECT paymentinfo.lev_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id, Sum(fee_trans.Discount) AS Discount, paymentinfo.prog_id as prog_id, Sum(fee_trans.amount) AS amount
                            FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                            GROUP BY paymentinfo.lev_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id,paymentinfo.prog_id
                            HAVING (((paymentinfo.lev_id)<:lev_id) AND ((paymentinfo.Pay_Res_id)=:Pay_Res_id) AND ((paymentinfo.prog_id)=:prog_id) AND ((paymentinfo.stu_id)=:stu_id))");
                $this->bind(":stu_id", $stu_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                        return    $this->getallstuUpFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id)    -  $rows['amount'] - $rows['Discount'];
                    }
                } else {
                    return  0;
                }
            }



            public function getallstupaidFeeCuLev($Invoice_id, $val)
            {
                $this->query("SELECT sum(Discount) AS Discount, sum(amount) AS amount FROM fee_trans  WHERE Invoice_id=:Invoice_id AND 	is_canceled=0");
                $this->bind(":Invoice_id", $Invoice_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return  $rows[$val];
                } else {
                    return  0;
                }
            }





            public function getstuFeetranstion($val)
            {
                $this->query("SELECT * FROM   fee_trans  WHERE Invoice_id=:Invoice_id");
                $this->bind(":Invoice_id", $val);
                $row = $this->resultSet();
                if ($row) {
                    return   $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getcurrentFeeInfo($id, $amount, $Discount)
            {
                $this->lang("total of payment");
                echo ($this->getallstupaidFeeCuLev($id, $amount) > 0)  ? $this->getallstupaidFeeCuLev($id, $amount) : 0; ?>
                $ | <?=$this->lang("total of discount");?>
                <?php echo ($this->getallstupaidFeeCuLev($id, $Discount) > 0) ? $this->getallstupaidFeeCuLev($id, $Discount) : 0; ?> 

        <?php
            }


            public function stufeelevplance($id, $amount, $Discount)
            {
                $this->query("SELECT * FROM   paymentinfo  WHERE Invoice_id=:Invoice_id AND 	is_canceled=0");
                $this->bind(":Invoice_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ((array) $row as $item) {
                        return   $item['want'] - $this->getallstupaidFeeCuLev($id, $amount) - $this->getallstupaidFeeCuLev($id, $Discount);
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getstuWantFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(paymentinfo.want) AS want
                FROM paymentinfo   GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))  ");
                $this->bind(":id", $val);
                $want = $this->resultSet();
                if ($want) {
                    foreach ($want as $rowswant) {
                        return $rowswant['want'];
                    }
                }
            }

            public function getstuDiscountFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(fee_trans.Discount) AS Discount
                FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))");
                $this->bind(":id", $val);
                $Discount = $this->resultSet();
                if ($Discount) {
                    foreach ($Discount as $Discountrows) {
                        return $Discountrows['Discount'];
                    }
                }
            }

            public function getstuPaidFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(fee_trans.amount) AS amount
                FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))");
                $this->bind(":id", $val);
                $amount = $this->resultSet();
                if ($amount) {
                    foreach ($amount as $amountrows) {
                        return $amountrows['amount'];
                    }
                }
            }

            public function getAllStuBlnace($val, $data)
            {

                $want =  $this->getstuWantFee($this->getStuInfoByStunm($val, $data));
                $Discount =  $this->getstuDiscountFee($this->getStuInfoByStunm($val, $data));
                $amount =  $this->getstuPaidFee($this->getStuInfoByStunm($val, $data));

                return $want - $Discount - $amount;
            }


            public function getstupaidfeetoupdate($id)
            {
                $this->query("SELECT * FROM   fee_trans  WHERE sta_id=:sta_id");
                $this->bind(":sta_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $row;
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }







            public function get_Rel_type($val)
            {
                switch ($val) {
                    case 1:
                        return "الأب";
                        break;
                    case 2:
                        return "الأم";
                        break;
                    case 3:
                        return "الأخ";
                        break;
                    case 4:
                        return "الأخت";
                        break;
                    case 5:
                        return "العم";
                        break;
                    case 6:
                        return "العمة";
                        break;
                    case 7:
                        return "الخال";
                        break;
                    case 8:
                        return "الخالة";
                        break;
                    case 9:
                        return "الجد";
                        break;
                    case 10:
                        return "الجدة";
                        break;
                    case 11:
                        return "غير ذلك";
                        break;
                    default:
                        return "غير ذلك";
                }
            }

            public function getrel_lev($val)
            {
                switch ($val) {
                    case 1:
                        return "الأولى";
                        break;
                    case 2:
                        return "الثانية";
                        break;
                    case 3:
                        return "الثالثة";
                        break;
                    default:
                        return "غير ذلك";
                }
            }




            /** =========================================================== */
            /** EMPLOYEE information **/ /** emp information  */
            /** =========================================================== */

            public function getempList()
            {
                $id = $_GET['id'];

                if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                    $this->query("SELECT * FROM empinfo");
                else :
                    $this->query("SELECT DISTINCT empinfo.emp_id as emp_id ,empinfo.emp_name as emp_name FROM empinfo RIGHT JOIN empdistribution ON empinfo.emp_id = empdistribution.emp_id LEFT JOIN auth_roles ON empdistribution.prog_id = auth_roles.prog_id WHERE   auth_roles.usrid =:usrid ");
                    $this->bind(":usrid", $_SESSION['log_id']);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo "<option value='" . $item['emp_id'] . "'>" . $item['emp_name'] . "</option>";
                    }
                }
            }

            public function getempinfoById($id, $val)
            {
                if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                    $this->query("SELECT * FROM empinfo WHERE emp_id=:id");
                    $this->bind(":id",  $id);
                else :
                    $this->query("SELECT DISTINCT empinfo.emp_id as emp_id ,empinfo.emp_name as emp_name FROM empinfo RIGHT JOIN empdistribution ON empinfo.emp_id = empdistribution.emp_id LEFT JOIN auth_roles ON empdistribution.prog_id = auth_roles.prog_id WHERE empinfo.emp_id=:id AND    auth_roles.usrid =:usrid ");
                    $this->bind(":id",  $id);
                    $this->bind(":usrid", $_SESSION['log_id']);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    // foreach ($row as $item) {
                    return  implode(array_column($row, $val));
                    // }
                }
            }
            /** =========================================================== */
            /** EMPLOYEE Finance Dep **/ /** emp section  */
            /** =========================================================== */

            public function getempDept()
            {
                if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                    $this->query("SELECT * FROM emp_debt");
                else :
                    $this->query("
                                    SELECT DISTINCT emp_debt.emp_debt_id as emp_debt_ids , emp_debt.*  FROM emp_debt
                                    LEFT JOIN  empdistribution
                                    ON emp_debt.emp_id = empdistribution.emp_id
                                    right JOIN  auth_roles
                                    ON empdistribution.prog_id = auth_roles.prog_id
                                    WHERE empdistribution.prog_id IS NOT NULL
                                    AND auth_roles.usrid = :usrid
                    ");
                    $this->bind(":usrid", $_SESSION['log_id']);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpDepToUpdate($id)
            {
                $this->query("SELECT * FROM emp_debt  WHERE  emp_debt_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }




            /** =========================================================== */
            /** allowancetype Finance   **/ /** allowancetype  */
            /** =========================================================== */


            public function getallowancetype()
            {
                $this->query("SELECT * FROM allowancetype ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getallowancetypeList()
            {
                $this->query("SELECT * FROM allowancetype WHERE active=1 ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['allowancetype_id'] . '">' . $item['allowancetype'] . '</option>';
                    }
                }
            }

            public function gSeltallowancetypeList($val)
            {
                $this->query("SELECT * FROM allowancetype WHERE active=1 ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['allowancetype_id'] == $val) ? 'selected' : '';
                        echo '<option value="' . $item['allowancetype_id'] . '"  ' . $sel . '>' . $item['allowancetype'] . '</option>';
                    }
                }
            }


            public function getSeltallowancetypetxt($id)
            {
                $this->query("SELECT * FROM allowancetype WHERE allowancetype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['allowancetype'];
                    }
                }
            }

            public function getallowancetypeToUpdate($id)
            {
                $this->query("SELECT * FROM allowancetype  WHERE allowancetype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            /** =========================================================== */
            /** deductiontype Finance   **/ /** deductiontype  */
            /** =========================================================== */


            public function getdeductiontype()
            {
                $this->query("SELECT * FROM deductiontype ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getdeductiontypeList()
            {
                $this->query("SELECT * FROM deductiontype WHERE active=1 ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['deductiontype_id'] . '">' . $item['deductiontype'] . '</option>';
                    }
                }
            }

            public function getSelltdeductiontypeList($val)
            {
                $this->query("SELECT * FROM deductiontype WHERE active=1 ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['deductiontype_id'] == $val) ? 'selected' : '';
                        echo '<option value="' . $item['deductiontype_id'] . '"  ' . $sel . '>' . $item['deductiontype'] . '</option>';
                    }
                }
            }


            public function getSeltdeductiontypetxt($id)
            {
                $this->query("SELECT * FROM deductiontype WHERE deductiontype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['deductiontype'];
                    }
                }
            }

            public function getdeductiontypeToUpdate($id)
            {
                $this->query("SELECT * FROM deductiontype  WHERE deductiontype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }
            /** =========================================================== */
            /** EMPLOYEE getallowance  **/ /** EMPLOYEE getallowance  */
            /** =========================================================== */
            public function getemp_allowance()
            {
                if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                    $this->query("SELECT * FROM emp_allowance");
                else :
                    $this->query("SELECT DISTINCT emp_allowance.emp_allowance_id as emp_allowance_ids , emp_allowance.*  FROM emp_allowance
                                    LEFT JOIN  empdistribution
                                    ON emp_allowance.emp_id = empdistribution.emp_id
                                    right JOIN  auth_roles
                                    ON empdistribution.prog_id = auth_roles.prog_id
                                    WHERE empdistribution.prog_id IS NOT NULL
                                    AND auth_roles.usrid = :usrid");
                    $this->bind(":usrid", $_SESSION['log_id']);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpallowanceoUpdate($id)
            {
                $this->query("SELECT * FROM emp_allowance  WHERE emp_allowance_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }




            public function getemp_deductiont()
            {

                if ($_SESSION['log_role'] ==  "manager" || $_SESSION['log_role'] == "admin") :
                    $this->query("SELECT * FROM emp_deductiont ORDER BY  emp_deductiont_id DESC");
                else :
                    $this->query("SELECT DISTINCT emp_deductiont.emp_deductiont_id  as emp_allowance_ids , emp_deductiont.*  FROM emp_deductiont
                                    LEFT JOIN  empdistribution
                                    ON emp_deductiont.emp_id = empdistribution.emp_id
                                    right JOIN  auth_roles
                                    ON empdistribution.prog_id = auth_roles.prog_id
                                    WHERE empdistribution.prog_id IS NOT NULL
                                    AND auth_roles.usrid = :usrid");
                    $this->bind(":usrid", $_SESSION['log_id']);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpdeductiontoUpdate($id)
            {
                $this->query("SELECT * FROM emp_deductiont  WHERE   emp_deductiont_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }
            /** =========================================================== */
            /** EMPLOYEE SECTIONS **/ /** emp section  */
            /** =========================================================== */

            public function getEmpSec()
            {
                $this->query("SELECT * FROM  em_sections WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['em_sec_id'] . '">' . $item['em_sec_name'] . '</option>';
                    }
                }
            }
            public function getEmpSecTxt()
            {
                $this->query("SELECT * FROM  em_sections WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['em_sec_name'];
                    }
                }
            }




            public function getSelEmpSecById($val)
            {
                $this->query("SELECT * FROM em_sections  WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['em_sec_id'] === $val) ? " selected " : "";
                        echo '<option value="' . $item['em_sec_id'] . '" ' . $sel . '>' . $item['em_sec_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpSecByIdTxt($id)
            {
                $this->query("SELECT * FROM  em_sections WHERE em_sec_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                    }
                    return  $item['em_sec_name'];
                }
            }




            /** =========================================================== */
            /** EMPLOYEE SECTIONS **/ /** emp leves */
            /** =========================================================== */

            public function getEmpLev()
            {
                $this->query("SELECT * FROM em_lev WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo  '<option value="' . $item['em_lev_id'] . '">' . $item['em_lev_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpLevById($val)
            {
                $this->query("SELECT * FROM em_lev WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['em_lev_id'] === $val) ? " selected " : "";
                        echo  '<option value="' . $item['em_lev_id']  . '" ' . $sel . '>'   . $item['em_lev_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpLevByIdTxt($val)
            {
                $this->query("SELECT * FROM em_lev WHERE em_lev_id=:id AND active=1");
                $this->bind(":id", $val);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['em_lev_name'];
                    }
                }
            }


            public function getEmpLevById($val)
            {
                $this->query("SELECT * FROM em_lev WHERE em_lev_id=:em_lev_id");
                $this->bind(":em_lev_id", $val);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['em_lev_name'];
                    }
                }
            }


            /** ********************************************** */
            /** ************  Files Upload Section *********** */
            /** ********************************************** */

            public function uploadPic($file, $size)
            {

                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $f_exe     = explode('.', $f_name);
                $f_exe     = strtolower(end($f_exe));
                $f_allow   = array('jpg', 'gif', 'png');
                if (in_array($f_exe, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $f_name)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        echo "هناك علة ما ";
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function uploadDoc($file, $size)
            {
                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $f_exe     = explode('.', $f_name);
                $f_exe     = strtolower(end($f_exe));
                $f_allow   = array('.docx', 'doc', 'pdf');
                if (in_array($f_exe, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            $f_origenal_tmp = "";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $f_name)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        echo "هناك علة ما ";
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function uploadFiles($file, $file_type, $size)
            {


                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $file_type = pathinfo($f_name, PATHINFO_EXTENSION);
                $f_allow   = array("jpeg", "jpg", "png",  "gif");
                if (in_array($file_type, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $this->random_string(20) . "." . $file_type)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        $_SESSION['msg'] = ERR_UPLOADS;
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function emp_qual($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM emp_qual WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function empexpe($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM empexpe WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }



            public function emptracou($id)
            {


                if ($id != '') {
                    $this->query("SELECT * FROM  tra_cou  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function empjobs($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  empjobs  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function getempjobsInfo($id, $val)
            {
                $this->query("SELECT * FROM  empjobs  WHERE emp_id=:emp_id AND empjob_levdate=''");
                $this->bind(":emp_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $empJobs) {
                        return $empJobs[$val];
                    }
                }
            }

            /**
             * asdlsadkjc ;sadkjc sakdc lkjdsac ;lkdsajc ;sakdjc ;dsakjc ;dsac sad;c adscsadc j;dsajc sa;djc dsa;lc dsa
             */

            public function getjobssectiobbyEmpId($id, $val)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  empjobs  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $jobsinfo) {
                            return $jobsinfo[$val];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getJobsSecByempId($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  em_sections  WHERE em_sec_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $em_sec) {
                            return $em_sec["em_sec_name"];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function getJobsLevByempId($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  em_lev  WHERE em_lev_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $em_sec) {
                            return $em_sec["em_lev_name"];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function empfile($id)
            {


                if ($id != '') {
                    $this->query("SELECT * FROM  emp_file  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }





            /** ==================================================================  */
            /** expensess & expensess types  **/ /** expensess & expensess types   */
            /** ================================================================= */


            public function getexptype()
            {
                $this->query("SELECT * FROM exptype");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getexptypeList()
            {
                $this->query("SELECT * FROM exptype");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo "<option value='" . $item['exptypeid'] . "'>" . $item['exptype'] . "</option>";
                    }
                }
            }



            public function getSelexptypetxt($id)
            {
                $this->query("SELECT * FROM exptype WHERE exptypeid=:id");
                $this->bind(":id", intval($id));
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['exptype'];
                    }
                }
            }



            public function getexpensess()
            {
                $this->query("SELECT * FROM expensess");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getgetexpensessToUpdate($id)
            {
                $this->query("SELECT * FROM expensess WHERE expensess_id=:id");
                $this->bind(":id", intval($id));
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();;
                }
            }



            public function cheIdsdata()
            {
                if (
                    isset($_GET['dep_id']) && isset($_GET['sec_id']) && isset($_GET['lev_id']) && isset($_GET['grp_id'])
                    && intval($_GET['dep_id']) != "" && intval($_GET['sec_id']) != ""
                    && intval($_GET['lev_id']) != "" && intval($_GET['grp_id']) != ""
                ) {
                    return true;
                } else {
                    return false;
                }
            }



            public function getSelBankInfoById($id, $val)
            {
                $this->query("SELECT * FROM ban_info WHERE  Ban_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    // foreach ($row as $item) {
                    return  implode(array_column($row, $val));
                    // }
                }
            }



            public function getBankOpingamount($id)
            {
                $this->query("SELECT * FROM ban_info WHERE  Ban_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['Ban_op_acc'];
                    }
                }
            }

            public function getaccountOutboundTotal($accid, $DFrom, $DTo)
            {
                $this->query("SELECT SUM(Outbound) as Outbound FROM account_movement WHERE mov_date BETWEEN :DFrm AND :Dto AND Ban_id=:id");
                $this->bind(":DFrm", $DFrom);
                $this->bind(":Dto", $DTo);
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['Outbound'];
                    }
                } else {
                    return  0;
                }
            }

            public function getaccountIncomingTotal($accid, $DFrom, $DTo)
            {
                $this->query("SELECT SUM(Incoming) as Incomings FROM account_movement WHERE mov_date BETWEEN :DFrm AND :Dto AND Ban_id=:id");
                $this->bind(":DFrm", $DFrom);
                $this->bind(":Dto", $DTo);
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {

                    return $row[0]['Incomings'];
                } else {
                    return  0;
                }
            }




            public function getaccountCurrentBlance($accid)
            {
                $this->query("SELECT SUM(Incoming) as Incoming , SUM(Outbound) as Outbound FROM account_movement WHERE Ban_id=:id");
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return ($this->getBankOpingamount($accid) +  $item['Incoming']) - $item['Outbound'];
                    }
                } else {
                    return  0;
                }
            }


            public function getBankData($id)
            {
                if ($id) {
                    $this->query("SELECT * FROM ban_info WHERE Ban_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }


            public function getBankDataList()
            {
                $this->query("SELECT * FROM ban_info WHERE Ban_active=1");
                $row = $this->resultSet();
                if ($row) :
                    foreach ($row as $rowItem) :
                        echo '<option value="' . $rowItem['Ban_id'] . '">' . $rowItem['Ban_name'] . ' | ' . $rowItem['Ban_num'] . '</option>';
                    endforeach;
                endif;
            }





            public function add_to_account_mov($type, $accNumber, $amount, $date, $parem)
            {
                if ($type != "" && $accNumber != "" && $date != ""  && $amount != "") {
                    if ($type == "in") {
                        $this->query("INSERT INTO account_movement( Ban_id,  Incoming , mov_date,parem) 
                    VALUES (:Ban_id, :Incoming, :mov_date,:parem)");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Incoming", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $parem);
                        $this->execute();
                        if ($this->lastInsertId()) {
                            return true;
                        }
                    } elseif ($type == "out") {
                        $this->query("INSERT INTO account_movement( Ban_id,  Outbound , mov_date,parem) 
                    VALUES (:Ban_id, :Outbound, :mov_date,:parem)");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Outbound", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $parem);
                        $this->execute();
                        if ($this->lastInsertId()) {
                            return true;
                        }
                    }
                }
            }

            public function getempsellarypaidprint($id)
            {
                if ($id) {
                    $this->query("SELECT * FROM emp_sellary_paid WHERE empSellary_id=:empSellary_id");
                    $this->bind(":empSellary_id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    }
                }
            }

            public function getSumempsellarypaidprint($id)
            {
                if ($id) {
                    $this->query("SELECT SUM(emp_sellary_paid_ampount) as  emp_sellary_paid_ampount FROM emp_sellary_paid WHERE empSellary_id=:empSellary_id");
                    $this->bind(":empSellary_id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $item) {
                            return $item['emp_sellary_paid_ampount'];
                        }
                    }
                }
            }

            public function update_to_account_mov($type, $Ckparem, $accNumber, $amount, $date)
            {
                if ($type != "" && $accNumber != "" && $date != ""  && $amount != "") {
                    if ($type == "in") {
                        $this->query("UPDATE  account_movement SET Ban_id=:Ban_id,  Incoming=:Incoming , mov_date=:mov_date  WHERE parem=:parem");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Incoming", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $Ckparem);
                        $this->execute();
                    } elseif ($type == "out") {
                        $this->query("UPDATE  account_movement SET Ban_id=:Ban_id,  Outbound=:Outbound ,  mov_date=:mov_date,parem=:parem WHERE  parem=:parem");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Outbound", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $Ckparem);
                        $this->execute();
                    }
                }
            }



            public function delete_to_account_mov($parem)
            {
                if ($parem != "") {
                    $this->query("DELETE FROM   account_movement   WHERE parem=:parem");
                    $this->bind(":parem", $parem);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }




            public function YearsAndMonthList()
            {
                $Months = array("يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر");
                $Years = array(2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2020);

                $getCurrentYears = date("Y");

                for ($x = 0; $x  < 12; $x++) {
                    $r = $x + 1;
                    echo "<option value='$r'> $getCurrentYears | $Months[$x] </option>";
                }
            }




            //*************** get emplooyes finnace  to get net sellary */




            //***************   get debt ****** */
            public function getEmpdebt($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_debt_amount) AS emp_debt_amount from emp_debt  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $emp_debt) {
                            if ($emp_debt['emp_debt_amount'] > 0) {
                                return $emp_debt['emp_debt_amount'];
                            } else {
                                return 0;
                            }
                        }
                    }
                }
            }
            //***************   get debt ****** */
            public function getallowance($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_allowance_amount) AS emp_allowance_amount from emp_allowance  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $empallowance) {
                            if ($empallowance['emp_allowance_amount'] > 0) {
                                return $empallowance['emp_allowance_amount'];
                            } else {
                                return 0;
                            }
                        }
                    }
                }
            }
            //***************   get debt ****** */
            public function getdeductiont($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_deductiont_amount) AS emp_deductiont_amount from emp_deductiont  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $empdeductiont) {
                            if ($empdeductiont['emp_deductiont_amount'] > 0) {
                                return $empdeductiont['emp_deductiont_amount'];
                            } else {
                                return 0;
                            }
                        }
                    } else {
                        return 0;
                    }
                }
            }



            public function getSumempdeductionprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_deductiont_amount) AS emp_deductiont_amount FROM emp_deductiont WHERE emp_deductiont_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_deductiont_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }


            public function getSumempdebtprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_debt_amount) AS emp_debt_amount FROM emp_debt WHERE emp_debt_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_debt_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }

            public function getSumempallowanceprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_allowance_amount) AS emp_allowance_amount FROM emp_allowance WHERE emp_allowance_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_allowance_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }




            public function closeAccounts($closDate, $Dfrm, $DTo)
            {

                /** =============================================================== */
                $this->query("UPDATE emp_allowance SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_allowance_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if ($this->execute()) {
                    echo "<br> تم اغلاق حساب علاوات الموظفين ";
                }

                /** =============================================================== */
                $this->query("UPDATE emp_debt SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_debt_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if ($this->execute()) {
                    echo "<br> تم اغلاق حساب مديونيات الموظفين ";
                }

                /** =============================================================== */
                $this->query("UPDATE emp_deductiont SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_deductiont_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if ($this->execute()) {
                    echo "<br> تم اغلاق حساب الخصوم المالية للموظفين ";
                }

                /** =============================================================== */
                $this->query("UPDATE emp_sellary SET   acc_close=1,acc_close_date=:closDate  WHERE   upDates BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if ($this->execute()) {
                    echo "<br> تم اغلاق حساب رفع مرتبات الموظفين ";
                }

                /** =============================================================== */
                $this->query("UPDATE emp_sellary_paid SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_sellary_paid_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if ($this->execute()) {
                    echo "<br> تم اغلاق حساب مرتبات الموظفين ";
                }
            }

            /** get fee info  */
            public function getfeeinfo($prog_id, $PyRes)
            {
                $this->query("SELECT * FROM  feeinfo WHERE  prog_id=:prog_id AND  PyRes=:PyRes");
                $this->bind(":prog_id", $prog_id);
                $this->bind(":PyRes", $PyRes);
                $rows = $this->resultSet();
                if ($rows) {
                    return true;
                } else {
                    return false;
                }
            }


            /** =================================== mget header of reports */
            public function get_report_header($title)
            {

                return '<div class="container p-0">
                            <div class="container">
                                <img src="' . $this->siteSetting('siteUrl') . '/assets/img/printLogo.png"   class="w-100" style="height:100px;" alt="">
                            </div>
                            <div class="container">
                                    <span class="float-right"> تاريخ الطباعة: ' . date("Y-M-d", time()) . '</span>
                                    <span class="float-left">   ' . $_SESSION['log_user'] . '</span>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <hr>
                        <h1 class="text-center">' . $title . '</h1>';
            }

            /** =================================== mget header of reports */
            public function get_report_footer()
            {
                echo '<div class="container footer text-center" pb-2 style="   position: fixed;left: 0;bottom: 15px; width: 100%;">
                                <hr>
                                ' . $this->siteSetting('siteAddr') . '-
                                ' . $this->siteSetting('sitePhones') . '-
                                ' . $this->siteSetting('siteEmail') . '
                        </div>';
            }
            /**
             * here we can give user auth 
             * @param int usrid
             * @param string actionname 
             */

            public function chk_auth_show(string $actionname)
            {
                $usrid = $_SESSION['log_id'];
                $this->query("SELECT * FROM  auth_pages  WHERE usrid=:usrid");
                $this->bind(":usrid", $usrid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return   $item[$actionname];
                    }
                }
            }


            /**
             * here we can chk if user auth is true or false 
             * @param string controller 
             */

            public function chk_user_auth()
            {
                if (!$_REQUEST['controller']) $_REQUEST['controller'] = 'home';
                if (isset($_REQUEST['controller'])) {
                    if (!$_REQUEST['action']) $_REQUEST['action'] = 'index';
                    if (isset($_REQUEST['action'])) {
                        $ac = explode(',', $this->chk_auth_show($_REQUEST['controller']));
                        if (in_array($_REQUEST['action'], $ac)) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }


            public function openPage()
            {
                if (!$this->chk_user_auth()) {
                    die($this->err_message());
                }
            }


            public function err_message()
            {
                $str = '<div class="alert alert-danger text-center"> عفواً، غير مسموح لك بدخول هذه الصفحة، أو  القيام بهذه العملية  </div>';
                return $str;
            }



            /**
             * here we can get list of all faculty
             */
            public function faculyList()
            {
                $this->query("SELECT * FROM programs ");
                $menu = $this->resultSet();
                return $menu;
            }

            /**
             * here chek if userid auth_roles 
             * @param int  $usrid 
             * @param int  $edulev_id 
             */

            public function chk_usr_in_auth_roles(int $usrid, int $edulev_id)
            {
                $this->query("SELECT * FROM  auth_roles  WHERE   usrid=:usrid AND edulev_id=:edulev_id");
                $this->bind(":usrid", $usrid);
                $this->bind(":edulev_id", $edulev_id);
                $data = $this->resultSet();
                if ($data) {
                    return true;
                } else {
                    return false;
                }
            }

            /**
             * chek if pages in user role is true or not 
             * @param int $usrid 
             * 
             */
            public function chk_if_user_rol_in(int $usrid, int $prog_id)
            {

                $this->query("SELECT * FROM  auth_roles  WHERE   usrid=:usrid AND prog_id=:prog_id");
                $this->bind(":usrid", $usrid);
                $this->bind(":prog_id", $prog_id);
                $data = $this->resultSet();
                if ($data) {
                    foreach ($data as $item) {
                        return  $item['prog_id'];
                    }
                }
            }



            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function chk_rols(int $usrid, int $prog_id)
            {
                $ar = $this->chk_if_user_rol_in($usrid,   $prog_id);
                if ($ar) {
                    return "checked";
                }
            }



            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function chk_rols_for_current_user(int $usrid, int $prog_id)
            {
                $this->query("SELECT * FROM  auth_roles  WHERE   usrid=:usrid AND prog_id=:prog_id");
                $this->bind(":usrid", $usrid);
                $this->bind(":prog_id", $prog_id);
                $data = $this->resultSet();
                if ($data) {
                    return "checked";
                }
            }

            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function get_rols_Id_for_current_user(int $usrid, int $prog_id)
            {
                $this->query("SELECT * FROM  auth_roles  WHERE   usrid=:usrid AND prog_id=:prog_id");
                $this->bind(":usrid", $usrid);
                $this->bind(":prog_id", $prog_id);
                $data = $this->resultSet();
                if ($data) {
                    foreach ($data as $item) {
                        return $item['auth_id'];
                    }
                }
            }

            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function chk_prog_Permition(int $usrid, int $prog_id)
            {
                if ($_SESSION['log_role']  == 'manager' ||    $_SESSION['log_role']  == 'admin') :
                    $this->query("SELECT * FROM  auth_roles ORDER BY prog_id DESC");
                else :
                    $this->query("SELECT * FROM  auth_roles WHERE  usrid=:usrid AND prog_id=:prog_id");
                    $this->bind(":usrid", $usrid);
                    $this->bind(":prog_id", $prog_id);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }
            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function chk_prog_rols(int $usrid, int $prog_id)
            {
                if ($_SESSION['log_role']  == 'manager' ||    $_SESSION['log_role']  == 'admin') :
                    $this->query("SELECT * FROM  auth_roles ORDER BY prog_id DESC");
                else :
                    $this->query("SELECT DISTINCT subject.sub_id as sub_ids , subject.* from subject 
                                            LEFT JOIN programs 
                                            on subject.prog_id = programs.prog_id 
                                            LEFT JOIN auth_roles 
                                            on subject.prog_id = auth_roles.prog_id 
                                            WHERE   auth_roles.usrid=:usrid AND auth_roles.prog_id=:prog_id");
                    $this->bind(":usrid", $usrid);
                    $this->bind(":prog_id", $prog_id);
                endif;
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }




            /**
             * here we can add new user role 
             * @param int $usrid 
             * @param string $pages 
             */
            public function chkroles(int $usrid, string $main_pages)
            {
                $this->query("SELECT  * FROM  auth_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                $this->bind(":main_pages",  $main_pages);
                $this->bind(":usrid", $usrid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return   $item['sub_pages'];
                    }
                }
            }

            /**
             * here we can get active roles only 
             * @param int $usrid 
             * @param string $pages
             */

            public function chk_pages_rols(int $usrid, string $main_pages, string $pages)
            {
                $ar = explode(',', $this->chkroles($usrid, $main_pages));
                if (in_array($pages, $ar)) {
                    return "checked";
                }
            }


            /**
             * chek if pages in user role is true or not 
             * @param int $usrid 
             * 
             */
            public function chk_if_user_rol_pages_in(int $usrid, string $main_pages)
            {
                $this->query("SELECT  * FROM  auth_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                $this->bind(":main_pages",  $main_pages);
                $this->bind(":usrid", $usrid);
                $row = $this->resultSet();
                if ($row) {
                    return true;
                } else {
                    return false;
                }
            }



            /**
             * chek if pages in user role is true or not 
             * @param int $usrid 
             * 
             */
            public function open_page()
            {
                $this->query("SELECT  * FROM  auth_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                $this->bind(":main_pages",  $_GET['controller']);
                $this->bind(":usrid", $this->stringify($_SESSION['log_id']));
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $ar = explode(',', $this->chkroles($_SESSION['log_id'], $_GET['controller']));
                        if (in_array($_GET['action'], $ar)) {
                            //return false;
                            die($this->err_message());
                        } else {
                            return false;
                        }
                    }
                }
            }


            /**
             * chek if pages in user role is true or not 
             * @param int $usrid 
             * 
             */
            public function adAction($val)
            {
                $this->query("SELECT  * FROM  auth_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                $this->bind(":main_pages",  $_GET['controller']);
                $this->bind(":usrid", $_SESSION['log_id']);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $ar = explode(',',  $item['sub_pages']);
                        if (in_array($val, $ar)) {
                            return  false;
                        } else {
                            return  true;
                        }
                    }
                } else {
                    return  true;
                }
            }
            /**
             * here we can customize a report 
             */

            public function customize_report()
            {
                if (isset($_GET['prog_id'])) {
                    $prog_id = $_GET['prog_id'];
                    if ($this->get_report_type($prog_id)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }


            public function chek_empdistribution(int $emp_id, int $pro_id)
            {
                $this->query("SELECT * FROM  empdistribution  WHERE emp_id=:emp_id AND prog_id=:pro_id");
                $this->bind(":emp_id", $emp_id);
                $this->bind(":pro_id", $pro_id);
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }



            public function chked_empdistribution(int $emp_id, int $pro_id)
            {
                if ($this->chek_empdistribution($emp_id,   $pro_id)) {
                    return "checked";
                }
            }

            public function random_string($length)
            {
                $key = '';
                $keys = array_merge(range(0, 9), range('a', 'z'));

                for ($i = 0; $i < $length; $i++) {
                    $key .= $keys[array_rand($keys)];
                }
                return $key;
            }



            /**
             * here we can get type of report to select 
             */
            public function get_report_type_txt(int $prog_id)
            {
                $this->query("SELECT * FROM  exam_reports  WHERE prog_id=:prog_id");
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['report'];
                    }
                }
            }


            public function get_report_type(int $prog_id)
            {
                $this->query("SELECT * FROM  exam_reports  WHERE prog_id=:prog_id");
                $this->bind(":prog_id", $prog_id);
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }


            public function check_report_type(int $prog_id)
            {
                if ($this->get_report_type($prog_id)) {
                    return "checked";
                }
            }


            public function get_courses_info_txt(int $cou_id, $val)
            {
                $this->query("SELECT * FROM   courses   WHERE cou_id=:cou_id");
                $this->bind(":cou_id", $cou_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item[$val];
                    }
                }
            }

            public function delete_all_coulesson(int $cou_id)
            {
                $this->query("DELETE FROM  cou_lesson  WHERE  cou_id=:cou_id");
                $this->bind(":cou_id", $cou_id);
                $this->execute();
            }


            public function get_next_coulesson(int $les_id, int $cou_id)
            {
                $this->query("SELECT * FROM  cou_lesson  WHERE  les_id > :id AND cou_id=:cou_id LIMIT 1");
                $this->bind(":id", $les_id);
                $this->bind(":cou_id", $cou_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return "<a href='" . ROOT_URL . "/coulesson/show/" . $item['les_id'] . "' class='btn danger-color-dark py-2 px-3 text-white'> الدرس التالي</a>";
                    }
                }
            }

            public function get_previous_coulesson(int $les_id, int $cou_id)
            {
                $this->query("SELECT * FROM  cou_lesson  WHERE  les_id < :id AND cou_id=:cou_id LIMIT 1");
                $this->bind(":id", $les_id);
                $this->bind(":cou_id", $cou_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return "<a href='" . ROOT_URL . "/coulesson/show/" . $item['les_id'] . "' class='btn danger-color-dark py-2 px-3 text-white'> الدرس السابق</a>";
                    }
                }
            }




            /**
             * here we can chek if student has exam or not 
             * @param int stu_id
             */
            public function chek_stu_exam(int $stu_id)
            {
                $this->query("SELECT * FROM exams  WHERE  stu_id=:stu_id");
                $this->bind(":stu_id", $stu_id);
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }


            /**
             * here we can chek if student has fee or not 
             * @param int stu_id
             */
            public function chek_stu_fee(int $stu_id)
            {
                $this->query("SELECT * FROM paymentinfo  WHERE  stu_id=:stu_id");
                $this->bind(":stu_id", $stu_id);
                $row = $this->resultSet();
                if ($row) {
                    return true;
                }
            }




            /**
             * here we can get student paymants 
             * @param int Invoice_id
             * @return int  
             */

            public function get_stu_paymnet_fee_select_class(int $Invoice_id, string $val)
            {
                $this->query("select  Invoice_id , SUM(amount) As amount , SUM(Discount) AS Discount from fee_trans where fee_trans.Invoice_id=:id");
                $this->bind(":id", $Invoice_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item[$val];
                    }
                }
            }






            /**
             * here we can sum all class fee 
             */

            public function get_class_fee_total(int $prog_id, int $dep_id, int $sec_id, int $lev_id, int $grp_id, int $Pay_Res_id)
            {
                $this->query("SELECT DISTINCT   dep_id , sec_id  , grp_id , prog_id   , Pay_Res_id , sum(want) AS want FROM paymentinfo 
                              WHERE dep_id=:dep_id AND  sec_id=:sec_id AND lev_id =:lev_id  AND grp_id=:grp_id AND  prog_id=:prog_id AND Pay_Res_id=:Pay_Res_id");
                $this->bind(":prog_id", $prog_id);
                $this->bind(":dep_id", $dep_id);
                $this->bind(":sec_id", $sec_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":grp_id", $grp_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $data) {
                        return $data['want'];
                    }
                }
            }



            public function getClassTotalPaidFee(int $dep_id, int $lev_id, int $sec_id, int $grp_id, int $prog_id, int $Pay_Res_id, string $val)
            {
                $this->query("SELECT paymentinfo.dep_id as dep_id , paymentinfo.lev_id as lev_id,  paymentinfo.sec_id as sec_id,paymentinfo.grp_id  as grp_id  , paymentinfo.prog_id as prog_id ,paymentinfo.Pay_Res_id as Pay_Res_id , 
                                                    Sum(fee_trans.Discount) AS Discount, Sum(fee_trans.amount)    AS amount
                                                FROM paymentinfo 
                                                INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                                                GROUP BY paymentinfo.dep_id , paymentinfo.lev_id , paymentinfo.sec_id , paymentinfo.grp_id, paymentinfo.prog_id ,paymentinfo.Pay_Res_id
                                                HAVING ((( paymentinfo.dep_id)=:dep_id ) AND ((paymentinfo.lev_id)=:lev_id) AND ((paymentinfo.sec_id)=:sec_id ) AND ((paymentinfo.grp_id)=:grp_id ) 
                                                 AND ((paymentinfo.prog_id)=:prog_id ) AND ((paymentinfo.Pay_Res_id)=:Pay_Res_id))");
                $this->bind(":dep_id", $dep_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":sec_id", $sec_id);
                $this->bind(":grp_id", $grp_id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                        return    $rows[$val] ?? 0;
                    }
                } else {
                    return  0;
                }
            }




            public function getClassBlanceFee(int $dep_id, int $lev_id, int $sec_id, int $grp_id, int $prog_id, int $Pay_Res_id, string $val)
            {
                $this->query("SELECT paymentinfo.dep_id as dep_id , paymentinfo.lev_id as lev_id,  paymentinfo.sec_id as sec_id,paymentinfo.grp_id  as grp_id  , paymentinfo.prog_id as prog_id ,paymentinfo.Pay_Res_id as Pay_Res_id , 
                                                    Sum(fee_trans.Discount) AS Discount, Sum(fee_trans.amount)    AS amount
                                                FROM paymentinfo 
                                                INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                                                GROUP BY paymentinfo.dep_id , paymentinfo.lev_id , paymentinfo.sec_id , paymentinfo.grp_id, paymentinfo.prog_id ,paymentinfo.Pay_Res_id
                                                HAVING ((( paymentinfo.dep_id)=:dep_id ) AND ((paymentinfo.lev_id)<:lev_id) AND ((paymentinfo.sec_id)=:sec_id ) AND ((paymentinfo.grp_id)=:grp_id ) 
                                                 AND ((paymentinfo.prog_id)=:prog_id ) AND ((paymentinfo.Pay_Res_id)=:Pay_Res_id))");
                $this->bind(":dep_id", $dep_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":sec_id", $sec_id);
                $this->bind(":grp_id", $grp_id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                        return    $rows[$val] ?? 0;
                    }
                } else {
                    return  0;
                }
            }

            public function chek_subject_before_delete(int $sub_id)
            {
                $id = $sub_id;

                $this->query("SELECT * FROM exams WHERE sub_id=:id");
                $this->bind(":id", $id);
                $data = $this->resultSet();
                if ($data) {
                    return true;
                } else {
                    return false;
                }
            }


            public function pdfImage($imgSrc)
            {
                $pdf = new pdf();
                return $pdf->custome_Image($imgSrc);
            }
            public function pdfData($fname, $title, $con, $firstString = null, $secondtString = null, $therdString = null, $foruthString = null)
            {

                $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $fontname = TCPDF_FONTS::addTTFfont(getcwd() . '/lib/tcpdf/customfont/majalla.ttf', '', '', 32);
                $pdf->SetTitle($fname);
                $lg = array();
                $lg['a_meta_charset'] = 'UTF-8';
                $lg['a_meta_dir'] = LANG_DIR;
                $lg['a_meta_language'] = 'en';
                $lg['w_page'] = 'page';
                // set some language-dependent strings (optional)
                $pdf->setLanguageArray($lg);
                //After Write
                if(LANG_DIR =='rtl'){
                    $pdf->setRTL(true);
                }else{
                    $pdf->setRTL(false);
                }
                
                $pdf->setHeaderData("", "", PDF_HEADER_TITLE, PDF_HEADER_STRING);
                $pdf->setHeaderFont(array(PDF_FONT_NAME_DATA, "", PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, "", PDF_FONT_SIZE_MAIN));
                $pdf->SetDefaultMonospacedFont("Sakkal+Majalla");


                // set margins
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                $pdf->SetFont($fontname, '', 9, '', false);
                $pdf->AddPage();
                $pdf->head_title($title);
                $pdf->SetFont($fontname, '', 9, '', false);
                $pdf->writeHTML($con, true, false, true, false, 'R');

                $pdf->writeHTML($pdf->custome_footer($firstString, $secondtString, $therdString, $foruthString), true, false, true, false, 'L');

                $pdf->lastPage();

                ob_end_clean();

                $pdf->Output('groups', 'I');
            }

            public function createpdffile($con)
            {
                $pdf = new pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', "mm", "A4");
                $pdf->SetCreator(PDF_CREATOR);
                $fontname = TCPDF_FONTS::addTTFfont(getcwd() . '/lib/tcpdf/customfont/majalla.ttf', '', '', 32);
                $lg = array();
                $lg['a_meta_charset'] = 'UTF-8';
                $lg['a_meta_dir'] = 'rtl';
                $lg['a_meta_language'] = 'fa';
                $lg['w_page'] = 'page';

                // set some language-dependent strings (optional)
                $pdf->setLanguageArray($lg);

                //After Write
                $pdf->setRTL(true);
                $pdf->setHeaderData("", "", PDF_HEADER_TITLE, PDF_HEADER_STRING);
                $pdf->setHeaderFont(array(PDF_FONT_NAME_DATA, "", PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, "", PDF_FONT_SIZE_MAIN));
                $pdf->SetDefaultMonospacedFont("Sakkal+Majalla");
                $pdf->getFooterMargin(PDF_MARGIN_FOOTER);
                $pdf->SetMargins(PDF_MARGIN_LEFT, "10",  PDF_MARGIN_RIGHT);
                $pdf->SetAutoPageBreak(true, 10);
                $pdf->SetFont($fontname, '', 14, '', false);
                $pdf->AddPage();
                $pdf->SetFont($fontname, '', 12, '', false);
                $pdf->writeHTML($con, true, false, true, false, 'R');
                $pdf->lastPage();
                $pdf->Output('groups', 'I');
            }


            public function chkIfFeeIsInOrnot(int $lev_id, int $grp_id, int $sec_id, int $dep_id, int $prog_id,  int $Pay_Res_id, $stu_id)
            {
                $this->query("SELECT   *  FROM paymentinfo  WHERE lev_id=:lev_id    AND grp_id=:grp_id  AND sec_id=:sec_id  
                                                                                AND dep_id=:dep_id  AND prog_id=:prog_id   
                                                                                AND   Pay_Res_id=:Pay_Res_id AND stu_id=:stu_id");
                $this->bind(":lev_id", $lev_id);
                $this->bind(":grp_id", $grp_id);
                $this->bind(":sec_id", $sec_id);
                $this->bind(":dep_id", $dep_id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $this->bind(":stu_id", $stu_id);
                $row = $this->resultSet();
                if ($row) {
                    return false;
                } else {
                    return true;
                }
            }



            public function openNewTap(string $url)
            {
                echo '<script type="text/javascript">';
                echo 'window.open("' . $url . '");';
                echo '</script>';
            }


            public function getBgColor($val)
            {
                if ($val == 1) {
                    $bg = "info";
                } elseif ($val == 2) {
                    $bg = "warning";
                } elseif ($val == 3) {
                    $bg = "danger";
                } else {
                    $bg = '';
                }
                return $bg;
            }




            public function pro_field($field)
            {
                $val = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $field);
                $val = str_replace("(", "", $field);
                $val = str_replace(")", "", $field);
                $val = strip_tags($field);

                return $val;
            }





            public function show_images()
            {
                $dir = 'uplouds/*.jpg';
                $get_img = glob($dir);
                foreach ($get_img as $show_img) {
                    $image_name = str_replace("uplouds/", "", $show_img);
                    $print_imgs =   "<img src='" . ROOT_URL . "/" . $show_img . "' alt='" . $show_img . "' title='" . $image_name . "' style='width:100px; height:100px; margin:2px;' id='" . $image_name . "' class='border border-primary' onclick='reply_click(this.id)' />";
                    echo  $print_imgs;
                }
            }



            public function stu_status($val)
            {
                if ($val = 1) :
                    $value = 'مستمر';
                elseif ($val = 2) :
                    $value = 'تم قيد السجل';
                elseif ($val = 3) :
                    $value = 'تم تراجع الطالب';
                elseif ($val = 4) :
                    $value = 'تحول إلى جامعة أخرى';
                elseif ($val = 4) :
                    $value = 'طرد من الجامعة';
                elseif ($val = 5) :
                    $value = 'متخرج';
                else :
                    $value = '';
                endif;

                return $value;
            }


            public function get_site_status()
            {
                $this->query("SELECT  siteStatus,siteColsemsg FROM settings");
                $row = $this->resultSet();
                return $row[0]['siteStatus'];
            }


            public function get_close_msg()
            {
                $this->query("SELECT  siteStatus,siteColsemsg FROM settings");
                $row = $this->resultSet();
                return '<div class="container alert alert-danger text-center h3 mt-5">' . $row[0]['siteColsemsg'] . '</div>';
            }



            public function get_image($img)
            {
                $rel_dir = getcwd() . '/uplouds/' . $img;
                $dir =  $this->siteSetting("siteUrl")  . 'uplouds/';
                if (file_exists($rel_dir)) :
                    return $dir . $img;
                else :
                    return $dir . 'Logo.jpg';
                endif;
            }
        }
