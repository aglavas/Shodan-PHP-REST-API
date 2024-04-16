<?php

/*
 * Crawl a network request - REQUIRE PAID API KEY
 */
try {
	var_dump($client->ShodanScan([
		'ips' => '69.171.230.0/24',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Crawl internet by port and protocol request - REQUIRE PAID API KEY AND SHODAN PERMISSION
 */
try {
	var_dump($client->ShodanScanInternet([
		'port' => '80',
		'protocol' => 'dns-tcp',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Status of requested scan
 */
try {
	var_dump($client->ShodanScan_Id([
		'id' => '4I1LK2YHAY3PLWJ6',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Services crawled
 */
try {
	var_dump($client->ShodanServices());
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

