<?php 

/*
 * Shodan Host
 */
try {
	var_dump($client->ShodanHost([
		'ip' => '69.171.230.68', // https://www.facebook.com/
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

try {
	var_dump($client->ShodanHost([
		'ip' => '69.171.230.68',
		'history' => TRUE,
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

try {
	var_dump($client->ShodanHost([
		'ip' => '69.171.230.68',
		'minify' => TRUE,
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

try {
	var_dump($client->ShodanHost([
		'ip' => '69.171.230.68',
		'history' => TRUE,
		'minify' => FALSE,
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

try {
	var_dump($client->ShodanHost([
		'ip' => '69.171.230.68',
		'history' => FALSE,
		'minify' => TRUE,
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
