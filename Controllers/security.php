<?php  

class Security extends Session {
    public function __construct() {
        parent::__construct();
    }

    public function loadSecurity($ctrl) {
        $controllersAccess = $this->getJsonFileConfig();
        $ctrls = $controllersAccess['controllers'];
        for ($i = 0; $i < count($ctrls); $i++) {
            if($ctrls[$i]['controller'] == $ctrl){
                if($ctrls[$i]['access'] == 'private' && !$this->exsistSession()){
                    header('Location:'.constant('URL').'login');
                }
            }
        }
    }

    public function getJsonFileConfig() {
        $string = file_get_contents('Config/access.json');
        $json = json_decode($string,true);
        return $json;
    }

}

?>