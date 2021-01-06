<?php
class PurchaseRequest {
    public $prId;
    public $userId;
    public $date;
    public $campaign;
    public $dateStart;
    public $dateEnd;
    public $distributor;
    public $entrepreneur;
    public $numRegistered;
    public $reseller;
    public $time;

    public function __construct($params) {
        $this->prId = isset($params['prId']) ? $params['prId'] : '';
        $this->userId = isset($params['userId']) ? $params['userId'] : '';
        $this->date = isset($params['date']) ? $params['date'] : '';
        $this->campaign = isset($params['campaign']) ? $params['campaign'] : '';
        $this->dateStart = isset($params['dateStart']) ? $params['dateStart'] : '';
        $this->dateEnd = isset($params['dateEnd']) ? $params['dateEnd'] : '';
        $this->distributor = isset($params['distributor']) ? $params['distributor'] : '';
        $this->entrepreneur = isset($params['entrepreneur']) ? $params['entrepreneur'] : '';
        $this->numRegistered = isset($params['numRegistered']) ? $params['numRegistered'] : '';
        $this->reseller = isset($params['reseller']) ? $params['reseller'] : '';
        $this->time = time();
    }

    public function check() {
        global $con;
        $query = mysqli_query($con, "SELECT * FROM purchase_request WHERE id = '$this->prId' AND user_id = '$this->userId'");
        return $query->num_rows === 1 ? true : false;
    }

    public function getData() {
        global $con;
        $query = mysqli_query($con, "SELECT * FROM purchase_request WHERE id = '$this->prId'");
        return $query->fetch_array();
    }

    public function register() {
        global $con;
        $error = new ErrorHandler();

        // Filtro de campos
        if (empty($this->date) || empty($this->campaign)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->dateStart) || empty($this->dateEnd)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->distributor) || empty($this->entrepreneur)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->numRegistered) || empty($this->reseller)) return $error->throw('COMPLETE_THE_FORM');

        try {
            $sql = new Sql();
            $query = [
                "user_id" => $this->userId,
                "date" => $this->date,
                "campaign" => $this->campaign,
                "date_start" => $this->dateStart, 
                "date_end" => $this->dateEnd, 
                "distributor" => $this->distributor, 
                "entrepreneur" => $this->entrepreneur, 
                "num_registered" => $this->numRegistered, 
                "reseller" => $this->reseller, 
                "time" => $this->time 
            ];
            $data = $sql->parseArgs($query);
            $fields = $data['fields'];
            $values = $data['values'];
            mysqli_query($con, "INSERT INTO purchase_request ($fields) VALUES ($values)");
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
            "message" => "¡Orden de compras creada!"
        ];
    }
    public function delete() {
        global $con;
        $error = new ErrorHandler();
        if (!$this->check()) return $error->throw('PR_DONT_EXISTS');
        try {
            mysqli_query($con, "DELETE FROM purchase_request WHERE id = '$this->prId' AND user_id = '$this->userId'");
        } catch (mysqli_sql_exception $err) {
            $report = new Report([
                "recipent" => "reports@logacode.net",
                "title" => "Delete purchase error",
                "body" => $err->getMessage()
            ]);
            $report->sendReport();
            return $error->throw('AN_ERROR_HAS_OCCURRED');
        }
        return [
            "status" => 200,
            "message" => "Orden de compra eliminada."
        ];
    }
    public function edit() {
        global $con;
        $error = new ErrorHandler();

        // Filtro de campos
        if (empty($this->date) || empty($this->campaign)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->dateStart) || empty($this->dateEnd)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->distributor) || empty($this->entrepreneur)) return $error->throw('COMPLETE_THE_FORM');
        if (empty($this->numRegistered) || empty($this->reseller)) return $error->throw('COMPLETE_THE_FORM');

        try {
            $sql = new Sql();
            $query = [
                "date" => $this->date,
                "campaign" => $this->campaign,
                "date_start" => $this->dateStart, 
                "date_end" => $this->dateEnd, 
                "distributor" => $this->distributor, 
                "entrepreneur" => $this->entrepreneur, 
                "num_registered" => $this->numRegistered, 
                "reseller" => $this->reseller, 
                "last_update" => $this->time 
            ];
            $data = $sql->parseQueryUpdate($query);
            $query = $data['query'];
            mysqli_query($con, "UPDATE purchase_request SET $query WHERE id = '$this->prId' AND user_id = '$this->userId'");
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
            "message" => "¡Datos editados!"
        ];
    }
}