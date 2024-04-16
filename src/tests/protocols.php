<?php

/*
 * Shodan Protocols
 */
try {
	var_dump($client->ShodanProtocols());
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
