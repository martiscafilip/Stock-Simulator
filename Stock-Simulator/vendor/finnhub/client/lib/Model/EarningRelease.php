<?php
/**
 * EarningRelease
 *
 * PHP version 5
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Finnhub API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.3.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Finnhub\Model;

use \ArrayAccess;
use \Finnhub\ObjectSerializer;

/**
 * EarningRelease Class Doc Comment
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class EarningRelease implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'EarningRelease';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'symbol' => 'string',
        'date' => '\DateTime',
        'hour' => 'string',
        'year' => 'int',
        'quarter' => 'int',
        'eps_estimate' => 'float',
        'eps_actual' => 'float',
        'revenue_estimate' => 'int',
        'revenue_actual' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'symbol' => null,
        'date' => 'date',
        'hour' => null,
        'year' => 'int64',
        'quarter' => 'int64',
        'eps_estimate' => 'float',
        'eps_actual' => 'float',
        'revenue_estimate' => 'int64',
        'revenue_actual' => 'int64'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'symbol' => 'symbol',
        'date' => 'date',
        'hour' => 'hour',
        'year' => 'year',
        'quarter' => 'quarter',
        'eps_estimate' => 'epsEstimate',
        'eps_actual' => 'epsActual',
        'revenue_estimate' => 'revenueEstimate',
        'revenue_actual' => 'revenueActual'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'symbol' => 'setSymbol',
        'date' => 'setDate',
        'hour' => 'setHour',
        'year' => 'setYear',
        'quarter' => 'setQuarter',
        'eps_estimate' => 'setEpsEstimate',
        'eps_actual' => 'setEpsActual',
        'revenue_estimate' => 'setRevenueEstimate',
        'revenue_actual' => 'setRevenueActual'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'symbol' => 'getSymbol',
        'date' => 'getDate',
        'hour' => 'getHour',
        'year' => 'getYear',
        'quarter' => 'getQuarter',
        'eps_estimate' => 'getEpsEstimate',
        'eps_actual' => 'getEpsActual',
        'revenue_estimate' => 'getRevenueEstimate',
        'revenue_actual' => 'getRevenueActual'
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
        return self::$openAPIModelName;
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
        $this->container['symbol'] = isset($data['symbol']) ? $data['symbol'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['hour'] = isset($data['hour']) ? $data['hour'] : null;
        $this->container['year'] = isset($data['year']) ? $data['year'] : null;
        $this->container['quarter'] = isset($data['quarter']) ? $data['quarter'] : null;
        $this->container['eps_estimate'] = isset($data['eps_estimate']) ? $data['eps_estimate'] : null;
        $this->container['eps_actual'] = isset($data['eps_actual']) ? $data['eps_actual'] : null;
        $this->container['revenue_estimate'] = isset($data['revenue_estimate']) ? $data['revenue_estimate'] : null;
        $this->container['revenue_actual'] = isset($data['revenue_actual']) ? $data['revenue_actual'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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


    /**
     * Gets symbol
     *
     * @return string|null
     */
    public function getSymbol()
    {
        return $this->container['symbol'];
    }

    /**
     * Sets symbol
     *
     * @param string|null $symbol Symbol.
     *
     * @return $this
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

        return $this;
    }

    /**
     * Gets date
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param \DateTime|null $date Date.
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets hour
     *
     * @return string|null
     */
    public function getHour()
    {
        return $this->container['hour'];
    }

    /**
     * Sets hour
     *
     * @param string|null $hour Indicates whether the earnings is announced before market open(<code>bmo</code>), after market close(<code>amc</code>), or during market hour(<code>dmh</code>).
     *
     * @return $this
     */
    public function setHour($hour)
    {
        $this->container['hour'] = $hour;

        return $this;
    }

    /**
     * Gets year
     *
     * @return int|null
     */
    public function getYear()
    {
        return $this->container['year'];
    }

    /**
     * Sets year
     *
     * @param int|null $year Earnings year.
     *
     * @return $this
     */
    public function setYear($year)
    {
        $this->container['year'] = $year;

        return $this;
    }

    /**
     * Gets quarter
     *
     * @return int|null
     */
    public function getQuarter()
    {
        return $this->container['quarter'];
    }

    /**
     * Sets quarter
     *
     * @param int|null $quarter Earnings quarter.
     *
     * @return $this
     */
    public function setQuarter($quarter)
    {
        $this->container['quarter'] = $quarter;

        return $this;
    }

    /**
     * Gets eps_estimate
     *
     * @return float|null
     */
    public function getEpsEstimate()
    {
        return $this->container['eps_estimate'];
    }

    /**
     * Sets eps_estimate
     *
     * @param float|null $eps_estimate EPS estimate.
     *
     * @return $this
     */
    public function setEpsEstimate($eps_estimate)
    {
        $this->container['eps_estimate'] = $eps_estimate;

        return $this;
    }

    /**
     * Gets eps_actual
     *
     * @return float|null
     */
    public function getEpsActual()
    {
        return $this->container['eps_actual'];
    }

    /**
     * Sets eps_actual
     *
     * @param float|null $eps_actual EPS actual.
     *
     * @return $this
     */
    public function setEpsActual($eps_actual)
    {
        $this->container['eps_actual'] = $eps_actual;

        return $this;
    }

    /**
     * Gets revenue_estimate
     *
     * @return int|null
     */
    public function getRevenueEstimate()
    {
        return $this->container['revenue_estimate'];
    }

    /**
     * Sets revenue_estimate
     *
     * @param int|null $revenue_estimate Revenue estimate.
     *
     * @return $this
     */
    public function setRevenueEstimate($revenue_estimate)
    {
        $this->container['revenue_estimate'] = $revenue_estimate;

        return $this;
    }

    /**
     * Gets revenue_actual
     *
     * @return int|null
     */
    public function getRevenueActual()
    {
        return $this->container['revenue_actual'];
    }

    /**
     * Sets revenue_actual
     *
     * @param int|null $revenue_actual Revenue actual.
     *
     * @return $this
     */
    public function setRevenueActual($revenue_actual)
    {
        $this->container['revenue_actual'] = $revenue_actual;

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
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


