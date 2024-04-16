<?php

/*
 * List of users saved query tags
 */
try {
	var_dump($client->ShodanQueryTags([
		'size' => '30',
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}

