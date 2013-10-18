<?php

Class mySessionHandler implements SessionHandlerInterface {

    private $path;
    private $name;
    private $sessionId;

    public function __construct() {

        session_set_save_handler
        (    array(&$this, 'open')
            ,    array(&$this, 'close')
            ,    array(&$this, 'read')
            ,    array(&$this, 'write')
            ,    array(&$this, 'destroy')
            ,    array(&$this, 'gc')
        );

        session_register_shutdown();
    }

    public function open($path, $name) {
        $sessionId = session_id();
        $sql = "INSERT INTO session SET session_id =" . $sessionId. ", session_data = '' ON DUPLICATE KEY UPDATE session_lastaccesstime = NOW()";
    }

    public function write($session_id, $session_data) {

    }

    public function read($session_id) {
        $q = "SELECT session_data FROM sessions WHERE session_id = ".$session_id;
    }

    public function close() {

    }

    public function destroy($session_id) {

    }

    public function gc($maxlifetime) {

    }
}