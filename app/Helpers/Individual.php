<?php

namespace App\Helpers\Individual {
    function hasClassFunction($className, $functionName) {
        return method_exists($className, $functionName) && is_callable($className, $functionName);
    }
}

?>