<?php 
class PluginAdm_ModuleAdm extends Module
{

	protected $year;
	protected $isEnable;
	
	public function Init() {
		$this->oMapper=Engine::GetMapper(__CLASS__);
				
		$sShortNow = date('d.m');
		$sShortStart = Config::Get('plugin.adm.date.start');
		$sShortStop = Config::Get('plugin.adm.date.stop');
		
		/*
		 * Если текущая дата больше даты окончания, но меньше даты старта,
		 * то плагин в данный момент выключен
		 */
		if(
			$this->compareShortDateToInt($sShortNow,$sShortStop) == 1 
			&& $this->compareShortDateToInt($sShortNow,$sShortStart) == -1 
		){
			$this->isEnable = false;
		} else {
			$this->isEnable = true;
			if($this->compareShortDateToInt($sShortNow,$sShortStart) == 1){
				/* конец текущего года */
				$this->year = date('Y') + 1;
			} else {
				/* начало следующего года */
				$this->year = date('Y');
			}
		}

	}
	    
	public function GetYear(){
		return $this->year;
	}
	
	public function isEnable(){
		return $this->isEnable;
	}
	
	/*
	 * Сравнивает две записи вида D.M
	 *  1 - str1 > str2
	 *  0 - str1 = str2
	 * -1 - str1 < str2 
	 */
	protected function compareShortDateToInt($str1,$str2){
		$iInt1 = $this->shortDateToInt($str1);
		$iInt2 = $this->shortDateToInt($str2);
		
		if($iInt1 > $iInt2){
			return 1;
		}
		if($iInt1 == $iInt2){
			return 0;
		}
		if($iInt1 < $iInt2){
			return -1;
		}				
	}
	
	/*
	 * Преобразуем формат D.M к целому числу, что бы сравнить даты
	 */
	protected function shortDateToInt($str){
		$aDateItem = explode('.',$str);
		$intValue = $aDateItem[1]*100 + $aDateItem[0];
		
		return $intValue;		
	}

	public function getAdmList($iYear = false){
		if($iYear == false){
			$iYear = $this->year;
		}		
		return 	$this->oMapper->getAdmList($iYear);
	}
		
	public function GetAdmCount($iYear = false){
		if($iYear == false){
			$iYear = $this->year;
		}
		$aList = $this->oMapper->getAdmList($iYear);
		return count($aList);
	}
	
	public function getSendCount($iYear = false){
		if($iYear == false){
			$iYear = $this->year;
		}		
		return 	$this->oMapper->getSendCount($iYear);
	}

	public function getReciveCount($iYear = false){
		if($iYear == false){
			$iYear = $this->year;
		}		
		return 	$this->oMapper->getReciveCount($iYear);
	}	
}