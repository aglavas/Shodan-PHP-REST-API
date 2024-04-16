<?php

/*
 * Shodan Ports
 */
try {
	var_dump($client->ShodanPorts());
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
