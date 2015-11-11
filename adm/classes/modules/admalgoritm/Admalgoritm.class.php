<?php 
class PluginAdm_ModuleAdmalgoritm extends Module
{

	protected $year;
	protected $aAdmList;
	
	public function Init() {
	}
	    
	public function getPair(){
		$this->InitData();
		
		$aPair = $this->makePair();
					
		foreach($aPair as $iUserId => $iReciveUserId){
			$this->PluginAdm_Admprofile_setAdmReciver($iUserId,$iReciveUserId,$this->iYear);
		}
		
		return $aPair;
	}

	protected function InitData(){
		$this->iYear = $this->PluginAdm_Adm_GetYear();
		$this->aAdmList = $this->PluginAdm_Adm_getAdmList($this->iYear);		
	}
	
	protected function makePair($aOptions = array()){
		$aPair = array();
		$aRecivier = array();
		foreach($this->aAdmList as $oAdmProfile){
			$aRecivier[$oAdmProfile->getUserId()] = $oAdmProfile->getUserId();
		}
		
		foreach($this->aAdmList as $oAdmProfile){
			do{
				$iRecivierIndex = array_rand($aRecivier);
			}while($aRecivier[$iRecivierIndex] == $oAdmProfile->getUserId());
									
			$aPair[$oAdmProfile->getUserId()] = $aRecivier[$iRecivierIndex];
			unset($aRecivier[$iRecivierIndex]);
		}
		
		return $aPair;
	}
}