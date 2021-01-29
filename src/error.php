<?php

    function error() {
        header("Content-type", "application/json");
        http_response_code(405);
        $error["error"] = "not supported method";
        echo json_encode($error);
    }

?>