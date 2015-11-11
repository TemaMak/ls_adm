<?php

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginAdm extends Plugin {
    public $aDelegates = array(
		'template' => array(
			'adm.admin_menu.tpl'
    	),
    );	
	
    public function Activate() {    
    	 $this->ExportSQL(dirname(__FILE__).'/install.sql');       
        return true;
    }

    public function Deactivate(){
		$this->ExportSQL(dirname(__FILE__).'/deinstall.sql');
    	return true;
    }

    public function Init() {
		$this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__)."/css/style.css");
    }
}
?>
