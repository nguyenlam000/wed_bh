<?php
include realpath(__DIR__)."/../lib/session.php";
Session::checkLogin();
include realpath(__DIR__)."/../helpers/format.php";
include realpath(__DIR__)."/../lib/database.php";
?>

<?php
class AdminLogin
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    public function login_admin($admin_user, $admin_pass)
    {
        $admin_user = $this->fm->validation($admin_user);
        $admin_pass = $this->fm->validation($admin_pass);
        $admin_user = mysqli_real_escape_string($this->db->link, $admin_user);
        $admin_pass = mysqli_real_escape_string($this->db->link, $admin_pass);

        if (empty($admin_pass) || empty($admin_pass)) {
            $alert = "User and pass not match";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$admin_user' AND adminPass = '$admin_pass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("login", true);
                Session::set("adminId", $value['adminID']);
                Session::set("adminName", $value['adminName']);
                Session::set("adminUser", $value['adminUser']);
                header("Location:index.php");
            } else {
                $alert = "User and pass not match";
                return $alert;
            }
        }
    }
}
