<?php

/*
 * Shodan Host Search without filters - DON'T REQUIRE PAID API KEY
 */
try {
	var_dump($client->ShodanHostSearch([
		'query' => 'Niagara Web Server',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Shodan Host Search with filters - REQUIRE PAID API KEY
 */
try {
	var_dump($client->ShodanHostSearch([
		'query' => 'Niagara Web Server country:"IT"',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Shodan Host Search Tokens
 */
try {
	var_dump($client->ShodanHostSearchTokens([
		'query' => 'Niagara Web Server country:"IT"',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
