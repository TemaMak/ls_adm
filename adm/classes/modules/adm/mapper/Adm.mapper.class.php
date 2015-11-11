<?php

class PluginAdm_ModuleAdm_MapperAdm extends Mapper
{
	
	public function getAdmList($iYear){
		$sql = "SELECT
					*
				FROM ".Config::Get('db.table.adm')." 
				WHERE 
 					year =?d
		";
				
		$aResult= array();
		$aRows=$this->oDb->select($sql,$iYear);
			
		foreach ($aRows as $aRow) {
			$aResult[]=Engine::GetEntity('PluginAdm_Admprofile_Admprofile',$aRow);
		}
		
		return $aResult;				
				
	}		

	public function getReciveCount($iYear)	{
		$sql = "SELECT
					COUNT(*) as _count
				FROM ".Config::Get('db.table.adm')." 
				WHERE 
				 	is_gift_recive = 1
					and year =?d
		";
				
		$iCount = 0;
		$aRows=$this->oDb->select($sql,$iYear);
			
		foreach ($aRows as $aRow) {
			$iCount  = $aRow['_count'];
		}
		
		return $iCount;		
	}	

	public function getSendCount($iYear)	{
		$sql = "SELECT
					COUNT(*) as _count
				FROM ".Config::Get('db.table.adm')." 
				WHERE 
				 	is_gift_send = 1
					and year =?d
		";
				
		$iCount = 0;
		$aRows=$this->oDb->select($sql,$iYear);
			
		foreach ($aRows as $aRow) {
			$iCount  = $aRow['_count'];
		}
		
		return $iCount;		
	}	
	
}

?>
