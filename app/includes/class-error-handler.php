<?php
class ErrorHandler {
    public function throw($type) {
        if ($type === 'COMPLETE_THE_FORM') return [
            "status" => 204,
            "message" => "Completa el formulario."
        ];
        elseif ($type === 'EMAIL_ALREADY_EXISTS') return [
            "status" => 204,
            "message" => "El email ya existe."
        ];
        elseif ($type === 'USER_DONT_EXISTS') return [
            "status" => 204,
            "message" => "El usuario no existe."
        ];
        elseif ($type === 'PASSWORD_INCORRECT') return [
            "status" => 204,
            "message" => "Contraseña incorrecta."
        ];
        elseif ($type === 'AN_ERROR_HAS_OCCURRED') return [
            "status" => 204,
            "message" => "Ha ocurrido un error."
        ];
        elseif ($type === 'PR_DONT_EXISTS') return [
            "status" => 204,
            "message" => "La orden de compra que quieres eliminar no existe."
        ];
        return [
            "status" => 204,
            "message" => "Error indefinido"
        ];
    }
}