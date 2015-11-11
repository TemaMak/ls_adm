<?php 
class PluginAdm_ModuleAdmprofile extends Module
{

	public function Init() {
		$this->oMapper=Engine::GetMapper(__CLASS__);
	}
	    
	public function GetOldAdmProfiles($oUser,$iYear){
		return $this->oMapper->GetOldAdmProfiles($oUser,$iYear);
	}	
	
	public function GetAdmProfile($oUser,$iYear){
		return $this->oMapper->GetAdmProfile($oUser,$iYear);
	}
	
	public function SetAdmProfile($oUser,$oAdmProfile,$iYear){
		return $this->oMapper->SetAdmProfile($oUser,$oAdmProfile,$iYear);
	}	
	
	public function setGiftSend($oUser,$iYear){
		return $this->oMapper->setGiftSend($oUser,$iYear);
	}	
	
	public function setGiftRecive($oUser,$iYear){
		return $this->oMapper->setGiftRecive($oUser,$iYear);
	}	
	
	public function setAdmReciver($iUserId,$iReciveUserId,$iYear){
		return $this->oMapper->setAdmReciver($iUserId,$iReciveUserId,$iYear);
	}
	
}