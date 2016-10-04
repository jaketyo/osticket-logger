<?php

require_once(INCLUDE_DIR . 'class.plugin.php');
require_once(INCLUDE_DIR . 'class.signal.php');
require_once(INCLUDE_DIR . 'class.app.php');
require_once('config.php');

class LoggerPlugin extends Plugin {
	var $config_class = "LoggerPluginConfig";

	function bootstrap() {
		Signal::connect('model.created', array($this, 'onTicketCreated'), 'Ticket');
	}

	function onTicketCreated($ticket){
		global $ost;

		$logger_url	= $this->getConfig()->get('logger-url');

		$ticket_id = $ticket->getId();
		$ticket_number = $ticket->getNumber();
		$ticket_url = $ost->getConfig()->getUrl() . 'scp/tickets.php?number=' . $ticket_number;
//		$ticket_subject = $ticket->getSubject();
		$ticket_name = $ticket->getName();
		$ticket_email = $ticket->getEmail();
//		$ticket_topic = $ticket->getTopic()->getName();
//		$ticket_lastMessage = $ticket->getLastMessage();

		// Create the payload array
		$data = "payload=" . json_encode(array(
			"ticket_id"     => "{$ticket_id}",
            "ticket_num"    => "{$ticket_number}",
            "ticket_url"    => "{$ticket_url}",
            "ticket_author" => "{$ticket_name}",
            "ticket_email"  => "{$ticket_email}",
            "ticket_subject"=> "_SUBJECT_",
            "ticket_topic"  => "_TOPIC_",
            "ticket_msg"    => "_MESSAGE_"
		));

		// Prepare and Curl the data
		$ch = curl_init($logger_url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT,10);
		$result = curl_exec($ch);
		$curl_errno = curl_errno($ch);
		$curl_error = curl_error($ch);
		curl_close($ch);

		// Catch Curl errors and post them in the log file
		if ($curl_errno > 0) {
			error_log('Slack Curl Error ' . $curl_error);
		}
		else if($result != 'ok') {
			error_log('Curl Error (Check your URL): ' . $result);
		}
	}
}
