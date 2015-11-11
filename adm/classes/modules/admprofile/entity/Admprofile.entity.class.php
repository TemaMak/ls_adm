<?php

class PluginAdm_ModuleAdmprofile_EntityAdmprofile extends Entity
{

    public function getUser(){
    	if (empty($this->_getDataOne['user'])){
    		$this->_getDataOne['user'] = $this->User_GetUserById($this->GetUserId());
    	}
    	    	
    	return $this->_getDataOne['user'];
    }     

	public function getReciveUser(){
    	if (
    		empty($this->_getDataOne['recive_user']) 
    		&& $this->getReciverUserId() > 0
		){
    		$this->_getDataOne['recive_user'] = $this->User_GetUserById($this->getReciverUserId());
    	} else {
    		$this->_getDataOne['recive_user'] = false;
    	}
    	    	
    	return $this->_getDataOne['recive_user'];
    }  
    
}

?>