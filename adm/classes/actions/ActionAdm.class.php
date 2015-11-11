<?php

class PluginAdm_ActionAdm extends ActionPlugin {


	protected $oUserCurrent=null;


	public function Init() {		
		$this->oUserCurrent=$this->User_GetUserCurrent();
		$this->SetDefaultEvent('profile');
	}

	protected function RegisterEvent() {
		$this->AddEvent('profile','EventProfile');
		$this->AddEvent('admin','EventAdmin');
		$this->AddEvent('make_adm','EventMakeAdm');
	}

	protected function EventProfile() {
		if (!($this->oUserCurrent)){		
			$this->Viewer_Assign('bNoUserCurrent',true);
		}	else {
			$iYear = $this->PluginAdm_Adm_GetYear();
			$bIsEnable = $this->PluginAdm_Adm_isEnable();
			
			if (isPost('submit_adm_profile')) {
				$oNewAdmProfile = Engine::GetEntity('PluginAdm_Admprofile');
				$oNewAdmProfile->setAddress(getRequest('adm_profile_addr'));
				$oNewAdmProfile->setName(getRequest('adm_profile_name'));
					
				$this->PluginAdm_Admprofile_SetAdmProfile($this->oUserCurrent,$oNewAdmProfile,$iYear);
			}
			
			if (isPost('submit_i_am_send_gift')) {
				$this->PluginAdm_Admprofile_setGiftSend($this->oUserCurrent,$iYear);
			}
			
			if (isPost('submit_i_am_recive_gift')) {
				$this->PluginAdm_Admprofile_setGiftRecive($this->oUserCurrent,$iYear);
			}
			
			$oAdmProfile = $this->PluginAdm_Admprofile_GetAdmProfile($this->oUserCurrent,$iYear);
			$oAdmOldProfile = $this->PluginAdm_Admprofile_GetOldAdmProfiles($this->oUserCurrent,$iYear);
			
			if ($oAdmProfile){
				$this->Viewer_Assign('sAdmName',$oAdmProfile->getName());
				$this->Viewer_Assign('sAdmAddress',$oAdmProfile->getAddress());
					
				if($oAdmProfile->getReciverUserId()){
					$oReciverUser = $this->User_GetUserById($oAdmProfile->getReciverUserId());
					$this->Viewer_Assign('oAdmReciverProfile',$this->PluginAdm_Admprofile_GetAdmProfile($oReciverUser,$iYear));
				}
			} else {
				$this->Viewer_Assign('sAdmName','');
				$this->Viewer_Assign('sAdmAddress','');
			}
			
			/*
			 * Пробуем получить данные из прошлых профилей АДМ
			*/
			if($oAdmOldProfile && !$oAdmProfile){
				$oLastAdmProfile = end($oAdmOldProfile);
					
				$this->Viewer_Assign('sAdmName',$oLastAdmProfile->getName());
				$this->Viewer_Assign('sAdmAddress',$oLastAdmProfile->getAddress());
			}
			
			$this->Viewer_Assign('oAdmProfile',$oAdmProfile);
			$this->Viewer_Assign('iYear',$iYear);
			$this->Viewer_Assign('bIsEnable',$bIsEnable);			
		}		
		
	
	}

	protected function EventAdmin(){
		if (!$this->User_IsAuthorization()) {
			return parent::EventNotFound();
		}		
		
    	if (!$this->User_GetUserCurrent()->isAdministrator()){
    		return parent::EventNotFound();
		}			
		$iYear = $this->PluginAdm_Adm_GetYear();
		$aAdmList = $this->PluginAdm_Adm_getAdmList($iYear);
		
		$this->Viewer_Assign('aAdmList',$aAdmList);
	}
	
	protected function EventMakeAdm(){
		if (!$this->User_IsAuthorization()) {
			return parent::EventNotFound();
		}		
		
    	if (!$this->User_GetUserCurrent()->isAdministrator()){
    		return parent::EventNotFound();
		}			
		$aPair = $this->PluginAdm_Admalgoritm_getPair();
		Router::Location('admin');
	}
	
}
?>
