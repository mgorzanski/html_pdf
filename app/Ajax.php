<?php

namespace App;

class Ajax {
    public function callModule($data) {
        $module = __NAMESPACE__.'\\'.$data['module'].'\\'.$data['module'];
        $module = new $module();
        if(!empty($data['method'])) {
            if(method_exists($module, "callControllerMethod")) {
                if(!empty($data['args'])) {
                    $module = call_user_func_array(array($module, "callControllerMethod"), array($data['method'], $data['args']));
                } else {
                    $module = call_user_func_array(array($module, "callControllerMethod"), array($data['method']));
                }
                
            }
        }
    }
}

?>