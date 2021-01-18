<?php
class Password {
    const KEY = "key";
    public function hash($password = null) {
        return hash('sha512', self::KEY.$password);
    }
    public function verify($password = '', $hash = '') {
        if ($hash === $this->hash($password)) return true;
        return false;
    }
}