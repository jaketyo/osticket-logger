<?php

require_once INCLUDE_DIR . 'class.plugin.php';

class LoggerPluginConfig extends PluginConfig {
	function getOptions() {
		return array(
			'Logger' => new SectionBreakField(array(
				'label' => 'Logging Plugin',
				'hint' 	=> 'This plugin simply takes an array containing basic ticket data and POSTs it to a URL using Curl.',
			)),
			'logger-url' => new TextboxField(array(
				'label'	=> 'Logging Server URL',
				'configuration' => array('size'=>100, 'length'=>200),
			)),
		);
	}
}
