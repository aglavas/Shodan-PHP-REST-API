<?php

/*
 * Shodan Host Count
 */
try {
	var_dump($client->ShodanHostCount([
		'query' => 'Niagara Web Server',
	]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Shodan Host Count with country IT
 */
try {
	var_dump($client->ShodanHostCount([
		'query' => 'Niagara Web Server country:"IT"',
	]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Shodan Host Count with country US
 */
try {
	var_dump($client->ShodanHostCount([
		'query' => 'Niagara Web Server country:"US"',
    ]));} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Shodan host count of top 10 countries
 */
try {
	var_dump($client->ShodanHostCount([
		'query' => 'Niagara Web Server',
		'facets' => 'country:10',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
