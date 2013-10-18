<?php
Class PusherController {
    private $session_id;
    private $start = time();
    private $longPollingCycleTime = 5; // les cycle de long polling dureront X sec
    private $realTimeLatency = 1; // on ira rechercher des messages en BDD toutes les X secondes
    private $session_handler;
    function __construct() {
        $this->session_handler = new MyBDDSessionHandler();
        session_set_save_handler($this->session_handler);
        $this->session_id = session_id();
        session_write_close();
    }
    public
    public function get_msgs() {
        $response = array();
        $msgs_query = "SELECT * FROM queued_msgs WHERE session_id = '".$session_id."'";

        while (time() < $this->start + $this->longPollingCycleTime)
        {
            $msgs = myFetchAllAssoc($msgs_query);
            if (!empty($msgs))
            {
                $response['msgs'] = $msgs;
                $msgs_unqueue_query = "DELETE FROM queued_msgs WHERE session_id = '".$session_id."'";
                myQuery($msgs_unqueue_query);
                echo json_encode($response);
                exit();
            }
            sleep($realTimeLatency);
        }
        $response['msgs'] = array();
        echo json_encode($response);
        exit();
    }
}
