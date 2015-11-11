<?php
/**
 * Конфиг
 */

$config = array();
Config::Set('router.page.adm', 'PluginAdm_ActionAdm');

Config::Set('db.table.adm','___db.table.prefix___adm');

$config['date'] = array(
	'start' => '01.11',
	'stop' => '01.02'
);

Config::Set(
	'block.adm',
	array(
        'action'  => array('index'),
        'blocks'  => array( 
        	'right' => array(
        		'adm'=>array(
        			'priority'=>1001,
        			'params'=>array(
        				'plugin'=>'adm'
					)
				)
			)
		)
	)
);

return $config;