<?php

require_once INCLUDE_DIR . 'class.plugin.php';

class LoggerPluginConfig extends PluginConfig {
	function getOptions() {
		return array(
			'Logger' => new SectionBreakField(array(
				'label' => 'Logging Plugin',
				'hint' 	=> '<<This is the hint>>',
			)),
			'logger-url' => new TextboxField(array(
				'label'	=> 'Logging Server URL',
				'hint'	=> 'The URL must accept XPUT with an array containing the ticket details of the new ticket.',
				'configuration' => array('size'=>100, 'length'=>200),
			)),
		);
	}
}
