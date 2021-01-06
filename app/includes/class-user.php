<?php
class User {
    private $fullName;
    private $email;
    private $password;
    private $time;
    public function __construct($params) {
        $this->fullName = isset($params['full_name']) ? $params['full_name'] : '';
        $this->email = $params['email'] ? $params['email'] : '';
        $this->password = $params['password'] ? $params['password'] : '';
        $this->time = $params['time'] ? $params['time'] : '';
    }
    public function checkUser() {
        global $con;
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$this->email'");
        return $query->num_rows === 1 ? true : false;
    }
    public function getData() {
        global $con;
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$this->email'");
        return $query->num_rows === 1 ? $query->fetch_array() : null;
    }
    public function login() {
        global $con;
        $password = new Password();
        $error = new ErrorHandler();
        $data = $this->getData();
        if (empty($this->email) || empty($this->password)) return $error->throw('COMPLETE_THE_FORM');

        if ($this->checkUser() === true && $password->hash($this->password) === $data['password']) {
            $_SESSION['id'] = $data['id'];
            try {
                mysqli_query($con, "UPDATE users SET last_seen = '$this->time'");
            } catch (mysqli_sql_exception $err) {
                $report = new Report([
                    "recipent" => "reports@logacode.net",
                    "title" => "User login error",
                    "body" => $err->getMessage()
                ]);
                $report->sendReport();
                return $error->throw('AN_ERROR_HAS_OCCURRED');
            }
            return [
                "status" => 200,
                "message" => "¡Haz iniciado sesión!"
            ];
        } else if ($this->checkUser() === false) {
            return $error->throw('USER_DONT_EXISTS');
        } else {
            return $error->throw('PASSWORD_INCORRECT');
        }
    }
    public function register() {
        global $con;
        $error = new ErrorHandler();
        if (empty($this->fullName) || empty($this->email) || empty($this->password)) return $error->throw('COMPLETE_THE_FORM');
        if ($this->checkUser() === false) {
            try {
                $password = new Password();
                $password = $password->hash($this->password);
                $ipAddress = $_SERVER['REMOTE_ADDR'];
                $sql = new Sql();
                $query = [
                    "full_name" => $this->fullName,
                    "email" => $this->email,
                    "password" => $password,
                    "ip_address" => $ipAddress,
                    "last_seen" => $this->time,
                    "time" => $this->time
                ];
                $data = $sql->parseArgs($query);
                $fields = $data['fields'];
                $values = $data['values'];
                mysqli_query($con, "INSERT INTO users ($fields) VALUES ($values)");
            } catch (mysqli_sql_exception $err) {
                $report = new Report([
                    "recipent" => "reports@logacode.net",
                    "title" => "User registration error",
                    "body" => $err->getMessage()
                ]);
                $report->sendReport();
                return $error->throw('AN_ERROR_HAS_OCCURRED');
            }
            return [
                "status" => 200,
                "message" => "¡Te haz registrado!"
            ];
        }
        return $error->throw('EMAIL_ALREADY_EXISTS');
    }
}