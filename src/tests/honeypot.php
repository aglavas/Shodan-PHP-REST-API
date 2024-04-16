<?php

/*
 * EXPERIMENTAL METHOD:
 * Calculates a honeypot probability score ranging from 0 (not a honeypot) to 1.0 (is a honeypot).
 */
try {
	var_dump($client->LabsHoneyscore([
		'ip' => '54.231.184.227', // http://mushmush.org/
    ]));
} catch (Exception $e) {
	echo $e->getMessage()."\n";
}
