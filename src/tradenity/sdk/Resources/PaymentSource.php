<?php
/**
 * PaymentSource
 * PHP version 5
 *
 * @category Class
 * @package  Tradenity\SDK
 * @author   Tradenity team
 * @link     https://github.com/tradenity
 */

/**
 * Tradenity API
 *
 * Tradenity eCommerce Rest API
 *
 * OpenAPI spec version: 1.0.0
 * Contact: support@tradenity.com
 * By: https://github.com/tradenity
 */



namespace Tradenity\SDK\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Tradenity\SDK\ApiClient;
use Tradenity\SDK\ApiException;
use Tradenity\SDK\Configuration;
use Tradenity\SDK\HeaderSelector;
use Tradenity\SDK\ObjectSerializer;

/**
 * PaymentSource Class Doc Comment
 *
 * @category Class
 * @package  Tradenity\SDK
 * @author   Tradenity team
 * @link     https://github.com/tradenity
 */
class PaymentSource
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected static $headerSelector;

    
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentSource';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        '__meta' => '\Tradenity\SDK\Resources\InstanceMeta',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'customer' => '\Tradenity\SDK\Resources\Customer',
        'reusable' => 'bool',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        '__meta' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'customer' => null,
        'reusable' => null,
        'status' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        '__meta' => '__meta',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'customer' => 'customer',
        'reusable' => 'reusable',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        '__meta' => 'setMeta',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'customer' => 'setCustomer',
        'reusable' => 'setReusable',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        '__meta' => 'getMeta',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'customer' => 'getCustomer',
        'reusable' => 'getReusable',
        'status' => 'getStatus'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['__meta'] = isset($data['__meta']) ? $data['__meta'] : null; 
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null; 
        $this->container['created_at'] = isset($data['createdAt']) ? $data['createdAt'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null; 
        $this->container['updated_at'] = isset($data['updatedAt']) ? $data['updatedAt'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null; 
        $this->container['reusable'] = isset($data['reusable']) ? $data['reusable'] : null; 
        $this->container['status'] = isset($data['status']) ? $data['status'] : null; 
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['customer'] === null) {
            $invalidProperties[] = "'customer' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    public function getId()
    {
        if($this->container['id'] != null){
            return $this->container['id'];
        }else if($this->getMeta() != null){
            $href = $this->getMeta()->getHref();
            $strs = explode('/', $href);
            $this->container['id'] = end($strs);
        }else{
            $this->container['id'] = null;
        }
        return $this->container['id'];
    }

    public function setId($id)
    {
        $this->container['id'] = $id;
    }

    /**
     * Gets __meta
     *
     * @return \Tradenity\SDK\Resources\InstanceMeta
     */
    public function getMeta()
    {
        return $this->container['__meta'];
    }

    /**
     * Sets __meta
     *
     * @param \Tradenity\SDK\Resources\InstanceMeta $__meta __meta
     *
     * @return $this
     */
    public function setMeta($__meta)
    {
        /* */
        $this->container['__meta'] = $__meta;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        /* */
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        /* */
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Tradenity\SDK\Resources\Customer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Tradenity\SDK\Resources\Customer $customer customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        /* */
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets reusable
     *
     * @return bool
     */
    public function getReusable()
    {
        return $this->container['reusable'];
    }

    /**
     * Sets reusable
     *
     * @param bool $reusable reusable
     *
     * @return $this
     */
    public function setReusable($reusable)
    {
        /* */
        $this->container['reusable'] = $reusable;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        /*
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
 */
        $this->container['status'] = $status;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }



    /**
     * Operation list All
     *
     * List PaymentSources
     *
     * @param  PageRequest $page_request  (optional)
     *
     * @throws \\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \\Resources\page[PaymentSource]
     */
    public static function findAll($page_request = null)
    {
        if($page_request != null){
            return self::listAllPaymentSources(['page' => $page_request->getPageNumber(), 'size' => $page_request->getSize() ]);
        }else {
            return self::listAllPaymentSources();
        }
    }

    public static function findAllBy(array $parameters = [])
    {
        return self::listAllPaymentSources($parameters);
    }

    public static function findOneBy(array $parameters = [])
    {
        return self::listAllPaymentSources($parameters)[0];
    }



    protected static function getApiClient()
    {
        return ApiClient::getInstance();
    }

    protected static function getHttpClient()
    {
        return ApiClient::getInstance()->getClient();
    }

    protected static function getConfig()
    {
        return ApiClient::getInstance()->getConfig();
    }

    /**
    * @return HeaderSelector
    */
    public static function getHeaderSelector()
    {
        if(self::$headerSelector == null){
            self::$headerSelector = new HeaderSelector();
        }
        return self::$headerSelector;
    }

    /**
    * Operation listAllPaymentSources
    *
    * List PaymentSources
    *
    * @param  int $page page number (optional)
    * @param  int $size page size (optional)
    * @param  string $sort page order (optional)
    *
    * @throws \Tradenity\SDK\ApiException on non-2xx response
    * @throws \InvalidArgumentException
    * @return \Tradenity\SDK\Resources\PaymentSource[page]
    */
    public static function listAllPaymentSources(array $parameters = [])
    {
        list($response) = self::listAllPaymentSourcesWithHttpInfo($parameters);
        return $response;
    }

    /**
     * Operation listAllPaymentSourcesWithHttpInfo
     *
     * List PaymentSources
     *
     * @param  int $page page number (optional)
     * @param  int $size page size (optional)
     * @param  string $sort page order (optional)
     *
     * @throws \Tradenity\SDK\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tradenity\SDK\Resources\PaymentSource[page], HTTP status code, HTTP response headers (array of strings)
     */ 
    protected static function listAllPaymentSourcesWithHttpInfo(array $parameters = []) 
    {
        $returnType = '\Tradenity\SDK\Resources\PaymentSource[page]'; 
        $request = self::listAllPaymentSourcesRequest($parameters);  

        try {
            $options = self::createHttpClientOption();
            try {
                $response = self::getHttpClient()->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tradenity\SDK\Resources\PaymentSource[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }
    /**
     * Operation listAllPaymentSourcesAsync
     *
     * List PaymentSources
     *

     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function listAllPaymentSourcesAsync(array $parameters = [])
    {
        return self::listAllPaymentSourcesAsyncWithHttpInfo($page, $size, $sort)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }
    /**
     * Operation listAllPaymentSourcesAsyncWithHttpInfo
     *
     * List PaymentSources
     *
     * @param  int $page page number (optional)
     * @param  int $size page size (optional)
     * @param  string $sort page order (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */ 
    protected static function listAllPaymentSourcesAsyncWithHttpInfo(array $parameters = [])  
    {
        $returnType = '\Tradenity\SDK\Resources\PaymentSource[page]'; 
        $request = self::listAllPaymentSourcesRequest($parameters);  

        return self::getHttpClient()
            ->sendAsync($request, self::createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listAllPaymentSources'
     *
     * @param  int $page page number (optional)
     * @param  int $size page size (optional)
     * @param  string $sort page order (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */ 
    protected static function listAllPaymentSourcesRequest(array $parameters = [])  
    {

        $resourcePath = '/paymentSources';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        foreach ($parameters as $key => $value) {
            $queryParams[$key] = ObjectSerializer::toQueryValue($value);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = self::getHeaderSelector()->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = self::getHeaderSelector()->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if (self::getConfig()->getUserAgent()) {
            $defaultHeaders['User-Agent'] = self::getConfig()->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            self::getConfig()->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected static function createHttpClientOption()
    {
        $options = [];
        if (self::getConfig()->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen(self::getConfig()->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . self::getConfig()->getDebugFile());
            }
        }

        return $options;
    }
}
