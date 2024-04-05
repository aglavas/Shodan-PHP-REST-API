<?php

namespace ShodanPHP\Api;

use Exception;

/**
 * \class Shodan
 * \brief Shodan class
 * 
 * This is the API class: costants, shodan methods and the generation of the HTTP requests are defined here. 
 */
class Shodan
{
	private string $apiKey;
	
	/**
	 * Instantiating costants 
	 */
	const TYPE_BOOLEAN = 'BOOLEAN';
	const TYPE_INTEGER = 'INTEGER';
	const TYPE_STRING = 'STRING';
	
	const PARAMETER_OPTIONAL = 'OPTIONAL';
	const PARAMETER_MANDATORY = 'MANDATORY';
	
	const POSITION_GET = 'GET';
	const POSITION_QUERY = 'QUERY';
	const POSITION_POST = 'POST';
	
	const REST_API = 'API';
	const REST_EXPLOIT = 'EXPLOIT';
	const STREAM_API = 'STREAM_API';
	
	/**
	 * Shodan methods.
	 * @var array $_api;
	 */
	private array $_api = [
		'ShodanHost' => [
			'rest' => self::REST_API,
			
			'ip' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			],
			'history' => [
				'type' => self::TYPE_BOOLEAN,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
			'minify' => [
				'type' => self::TYPE_BOOLEAN,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
		],
		
		'ShodanHostCount' => [
			'rest' => self::REST_API,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			],
			'facets' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
		],
		
		'ShodanHostSearch' => [
			'rest' => self::REST_API,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			],
			'facets' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			]
		],
		
		'ShodanHostSearchTokens' => [
			'rest' => self::REST_API,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			]
		],
		
		'ShodanPorts' => [
			'rest' => self::REST_API,
		],
		
		'ShodanProtocols' => [
			'rest' => self::REST_API,
		],
		
		'ShodanScan' => [
			'rest' => self::REST_API,
			
			'ips' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_POST,
			]
		],
		
		'ShodanScanInternet' => [
			'rest' => self::REST_API,
			
			'port' => [
				'type' => self::TYPE_INTEGER,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_POST,
			],
			'protocol' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_POST,
			],
		],
		
		'ShodanScan_Id' => [
			'rest' => self::REST_API,
			
			'id' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			]
		],
		
		'ShodanServices' => [
			'rest' => self::REST_API,
		],
		
		'ShodanQuery' => [
			'rest' => self::REST_API,
			
			'page' => [
				'type' => self::TYPE_INTEGER,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
			'sort' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
			'order' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
		],
		
		'ShodanQuerySearch' => [
			'rest' => self::REST_API,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			],
			'page' => [
				'type' => self::TYPE_INTEGER,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
		],
		
		'ShodanQueryTags' => [
			'rest' => self::REST_API,
			
			'size' => [
				'type' => self::TYPE_INTEGER,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			]
		],
		
		'LabsHoneyscore' => [
			'rest' => self::REST_API,
			
			'ip' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			],
		],
		
		'Search' => [
			'rest' => self::REST_EXPLOIT,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			],
			'facets' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
			'page' => [
				'type' => self::TYPE_INTEGER,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			]
		],
		
		'Count' => [
			'rest' => self::REST_EXPLOIT,
			
			'query' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_QUERY,
			],
			'facets' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_OPTIONAL,
				'position' => self::POSITION_QUERY,
			],
		],
		
		'ShodanBanners' => [
			'rest' => self::STREAM_API,
		],
		
		'ShodanAsn' => [
			'rest' => self::STREAM_API,
			
			'asn' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			]
		],
		
		'ShodanCountries' => [
			'rest' => self::STREAM_API,
			
			'countries' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			]
		],
		
		'ShodanPorts_Stream' => [
			'rest' => self::STREAM_API,
			
			'ports' => [
				'type' => self::TYPE_STRING,
				'optional' => self::PARAMETER_MANDATORY,
				'position' => self::POSITION_GET,
			]
		],

        'AccountProfile' => [
            'rest' => self::REST_API,
        ],

        'DnsReverse' => [
            'rest' => self::REST_API,
            'ips' => [
                'type' => self::TYPE_STRING,
                'optional' => self::PARAMETER_MANDATORY,
            ],
        ],

        'DnsResolve' => [
            'rest' => self::REST_API,
            'hostnames' => [
                'type' => self::TYPE_STRING,
                'optional' => self::PARAMETER_MANDATORY,
            ],
        ],
	];
	
	/**
	 * Construct.
	 * \fn __construct($apiKey, $returnType = FALSE)
	 * 
	 * @param string $apiKey;
	 * @param bool $returnType;
	 * @return void;
	 */
    public function __construct(string $apiKey, bool $returnType = false) {
		$this->apiUrl = 'https://api.shodan.io';
		$this->exploitUrl = 'https://exploits.shodan.io/api';
		$this->streamUrl = 'https://stream.shodan.io';
		$this->apiKey = $apiKey;
		
		// false = object; true = array
		define('RETURN_TYPE', $returnType);
	}

    /**
     *  Parse Headers.
     *  \fn _parseHeaders($headers)
     *
     * @param array $headers
     * @return array
     */
    private function _parseHeaders(array $headers): array
    {
		$head = [];
		
		foreach ($headers as $k => $v) {
			$t = explode(':', $v, 2);
			
			if (isset($t[1])) {
				$head[trim($t[0])] = trim($t[1]);
			} else {
				$head[] = $v;
				if (preg_match('|HTTP/[0-9\.]+\s+([0-9]+)|', $v, $out)) {
					$head['reponse_code'] = intval($out[1]);
				}
			}
		}
		
		return $head;
	}

    /**
     * @param array|null $post
     * @param array|null $options
     * @return mixed
     */
    private function _requestContext(?array $post = null, ?array $options = null): mixed
    {
		if (!$options) {
			$options = [
				'http' => [
					'method' => 'GET',
					'header' => 'Accept-language: en'."\n",
					'timeout' => 10,
					'ignore_errors' => TRUE,
				]
			];
		}
		
		if ($post) {
			$options['http']['header'] .= 'Content-type: application/x-www-form-urlencoded'."\n";
			$options['http']['method'] = 'POST';
			$options['http']['content'] = http_build_query($post);
		}
		
		return stream_context_create($options);
	}

    /**
     * Response Success HTTP.
     * \fn _responseSuccessHTTP($headers)
     *
     * @param array $headers
     * @return bool
     */
    private function _responseSuccessHTTP(array $headers): bool {
		$responseHeaders = $this->_parseHeaders($headers);
		
		if ($responseHeaders['reponse_code'] != 200) {
			return $responseHeaders[0];
		}
		
		return TRUE;
	}

    /**
     *  Response Success API.
     *  \fn _responseSuccessAPI($responseDecoded)
     *
     * @param array $responseDecoded
     * @return bool
     */
    private function _responseSuccessAPI(array $responseDecoded): bool {
		if (isset($responseDecoded['error'])) {
			return $responseDecoded['error'];
		}
		
		return TRUE;
	}

    /**
     *  Response Success.
     *  \fn _responseSuccess($headers, $response)
     *
     * @param array $headers
     * @param string $response
     * @return array
     * @throws Exception
     */
    private function _responseSuccess(array $headers, string $response): array {
		// Check for HTTP errors
		if (($errorHTTP = $this->_responseSuccessHTTP($headers)) !== TRUE) {
			// Decode
			$responseDecoded = $this->_responseDecode($response);
			
			// Check for API errors
			if (($errorAPI = $this->_responseSuccessAPI($responseDecoded)) !== TRUE) {
                throw new \Exception('API Error: ' . $errorAPI);
			}
			
			// If we were unable to identify the error in the response body, then
			// just raise the HTTP error
            throw new \Exception('HTTP Error: ' . $errorHTTP);
		}
		
		// Decode
		return $this->_responseDecode($response);
	}
	
	/**
	 * Response Decode.
	 * \fn _responseDecode($response)
	 * 
	 * @param string $response;
	 * @return array $response;
	 */
    private function _responseDecode(string $response): array {
		return json_decode($response, RETURN_TYPE);
	}

    /**
     * @param string $url
     * @param array|null $post
     * @param array|null $options
     * @return array
     * @throws Exception
     */
    private function _request(string $url, ?array $post = null, ?array $options = null): array {
		$response = @file_get_contents(
			$url,
			FALSE,
			$this->_requestContext($post, $options)
		);
		
		return $this->_responseSuccess($http_response_header, $response);
	}

    /**
     *  Request Stream.
     *  \fn _requestStream($url, $post = FALSE, $options = FALSE)
     *
     * @param string $url
     * @param array|null $post
     * @param array|null $options
     * @return mixed
     * @throws Exception
     */
    private function _requestStream(string $url, ?array $post = null, ?array $options = null): mixed
    {
		$handle = fopen(
			$url, 
			'r', 
			FALSE, 
			$this->_requestContext($post, $options)
		);
		
		$firstLine = fgets($handle);
		$this->_responseSuccess($http_response_header, $firstLine);
		
		// No errors detected, stream the output
		echo $firstLine;
		fpassthru($handle);
		fclose($handle);
	}

    /**
     *  Call function.
     *  \fn __call($method, $args)
     *
     * @param string $method
     * @param array $args
     * @return array
     * @throws Exception
     */
    public function __call(string $method, array $args): array
    {
		if (!isset($this->_api[$method])) {
            throw new \Exception('Unknown method: ' . $method);
		}
		
		// Handle overlapping methods (see: https://github.com/ScadaExposure/Shodan-PHP-REST-API#handle-overlapping-methods)
		$url = preg_replace_callback(
			'|\_.*$|',
			function ($matches) {
    				return "";
			},
			$method
		);
		
		// Generate the URL for the call
		$url = preg_replace_callback(
			'|([A-Z])|',
			function ($matches) {
    				return "/".strtolower($matches[0]);
			},
			$url
		);		

		// Detect API backend
		if ($this->_api[$method]['rest'] == self::REST_API) {
			$url = $this->apiUrl.$url;
		} elseif ($this->_api[$method]['rest'] == self::REST_EXPLOIT) {
			$url = $this->exploitUrl.$url;
		} else {
			$url = $this->streamUrl.$url;
		}
		
		// Compose query string
		$query = '?key='.$this->apiKey;
		$post = FALSE;
		
		if (count($args) > 0) {
			$args = $args[0];
			
			foreach ($this->_api[$method] as $parameter => $config) {
				// Skip 'rest'
				if (
					$parameter == 'rest'
				) {
					continue;
				}
				
				if (
					$config['optional'] == self::PARAMETER_MANDATORY &&
					!isset($args[$parameter])
				) {
                    throw new \Exception('Parameter is mandatory: ' . $parameter);
				}
				
				if (isset($args[$parameter])) {
					if ($config['position'] == self::POSITION_GET) {
						$url .= '/'.urlencode($args[$parameter]);
						
					} elseif ($config['position'] == self::POSITION_POST) {
						$post[urlencode($parameter)] = $args[$parameter];
					} else {
						$query .= '&'.urlencode($parameter).'='.urlencode($args[$parameter]);
					}
				}
			}
		}
		// Call the proper request method
		if ($this->_api[$method]['rest'] == self::STREAM_API) {
			return $this->_requestStream($url.$query, $post);
		}
		
		return $this->_request($url.$query, $post);
	}

    /**
     *  Get Apis.
     *  \fn getApis()
     *
     * @return array
     */
    public function getApis(): array
    {
		return $this->_api;
	}
}
