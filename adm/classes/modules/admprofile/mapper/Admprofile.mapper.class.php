<?php

class PluginAdm_ModuleAdmprofile_MapperAdmprofile extends Mapper
{

	public function SetAdmProfile($oUser,$oAdmProfile,$iYear){
				$sql = "INSERT INTO 
							".Config::Get('db.table.adm')." (user_id,add_date,address,name,year)
						VALUES (?d,NOW(),?,?,?d)
						ON DUPLICATE KEY UPDATE
							address = ?,
							name = ?
				";
				
		return ($iId=$this->oDb->query(
				$sql,
				$oUser->getId(),
				$oAdmProfile->getAddress(),
				$oAdmProfile->getName(),
				$iYear,
				$oAdmProfile->getAddress(),
				$oAdmProfile->getName()				
			));				
				
	}
	
	public function GetAdmProfile($oUser,$iYear){
		$sql = "SELECT
					*
				FROM ".Config::Get('db.table.adm')." 
				WHERE 
					user_id = ?d
					and year =?d
		";
				
		$oResult= null;
		$aRows=$this->oDb->select($sql,$oUser->getId(),$iYear);
			
		foreach ($aRows as $aRow) {
			$oResult=Engine::GetEntity('PluginAdm_Admprofile_Admprofile',$aRow);
		}
		
		return $oResult;				
				
	}	
	
	public function GetOldAdmProfiles($oUser,$iYear){
		$sql = "SELECT
					*
				FROM ".Config::Get('db.table.adm')." 
				WHERE 
					user_id = ?d
					and year !=?d
		";
				
		$oResult= array();
		$aRows=$this->oDb->select($sql,$oUser->getId(),$iYear);
			
		foreach ($aRows as $aRow) {
			$oResult[]=Engine::GetEntity('PluginAdm_Admprofile_Admprofile',$aRow);
		}
		
		return $oResult;				
				
	}
	
	public function setGiftSend($oUser,$iYear){
				$sql = "UPDATE 
							".Config::Get('db.table.adm')." 
						SET is_gift_send = 1
						WHERE 
							user_id = ?d
							AND year = ?d
				";
				
		return ($iId=$this->oDb->query(
				$sql,
				$oUser->getId(),
				$iYear			
			));			
	}	
	
	public function setGiftRecive($oUser,$iYear){
				$sql = "UPDATE 
							".Config::Get('db.table.adm')." 
						SET is_gift_recive = 1
						WHERE 
							user_id = ?d
							AND year = ?d
				";
				
		return ($iId=$this->oDb->query(
				$sql,
				$oUser->getId(),
				$iYear			
			));			
	}		
	
	public function setAdmReciver($iUserId,$iReciveUserId,$iYear){
				$sql = "UPDATE 
							".Config::Get('db.table.adm')." 
						SET  	reciver_user_id = ?d
						WHERE 
							user_id = ?d
							AND year = ?d
				";
				var_dump(				$sql,
				$iReciveUserId,
				$iUserId,
				$iYear);
		return ($iId=$this->oDb->query(
				$sql,
				$iReciveUserId,
				$iUserId,
				$iYear			
			));			
	}
	
}

?>
