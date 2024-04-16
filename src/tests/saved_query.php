<?php

/*
 * Other users saved query
 */
try {
	var_dump($client->ShodanQuery([
		'page' => '1',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

/*
 * Search for other users saved query
 */
try {
	var_dump($client->ShodanQuery([
		'query' => 'fax',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
