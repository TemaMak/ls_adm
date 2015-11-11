<?php

class PluginAdm_HookAdm extends Hook
{

    public function RegisterHook() {
        $this->AddHook('template_admin_action_item', 'MenuAdmin');    
    }

    public function MenuAdmin()  {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'adm.admin_menu.tpl');
    }    
}
