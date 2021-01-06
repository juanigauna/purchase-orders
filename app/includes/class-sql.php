<?php
class Sql {
    public function parseArgs($query) {
    global $con;
        $fields = [];
        $values = [];
        foreach ($query as $field => $value) {
            $fields[] = $field;
            $values[] = "'".$con->escape_string($value)."'";
        }
        return [
            "fields" => implode(',', $fields),
            "values" => implode(',', $values)
        ];
    }
    public function parseQueryUpdate($query) {
        global $con;
        $fieldsAndValue = [];
        foreach ($query as $field => $value) {
            $fieldsAndValue[] = $field." = '".$con->escape_string($value)."'";
        }
        return [
            "query" => implode(',', $fieldsAndValue)
        ];
    }
}