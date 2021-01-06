<?php
class Password {
    const KEY = "logacode123juangauna43844438";
    public function hash($password) {
        if (!$password) throw new Exception('The parameter passed to "hash()" is empty.');
        return hash('sha512', self::KEY.$password);
    }
    public function verify($password, $hash) {
        if (!$password || !$hash) throw new Exception("The params passed don't should be empty");
        if ($hash === $this->hash($password)) return true;
        return false;
    }
}