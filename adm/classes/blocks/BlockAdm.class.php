<?php

class PluginAdm_BlockAdm extends Block {
    public function Exec() {
		$bEnable = $this->PluginAdm_Adm_isEnable();
		if($bEnable){
	   		$iAdmCount = $this->PluginAdm_Adm_GetAdmCount();
			$iReciveCount = $this->PluginAdm_Adm_getReciveCount();
			$iSendCount = $this->PluginAdm_Adm_getSendCount();
			
			
	    	$this->Viewer_Assign('iAdmCount',$iAdmCount);
	    	$this->Viewer_Assign('iReciveCount',$iReciveCount);
	    	$this->Viewer_Assign('iSendCount',$iSendCount);			
		}
		 $this->Viewer_Assign('bEnable',$bEnable);
    }
}
?>
