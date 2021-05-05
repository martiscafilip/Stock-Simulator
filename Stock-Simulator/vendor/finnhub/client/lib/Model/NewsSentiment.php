<?php
/**
 * NewsSentiment
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
 * NewsSentiment Class Doc Comment
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NewsSentiment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'NewsSentiment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'buzz' => '\Finnhub\Model\CompanyNewsStatistics',
        'company_news_score' => 'float',
        'sector_average_bullish_percent' => 'float',
        'sector_average_news_score' => 'float',
        'sentiment' => '\Finnhub\Model\Sentiment',
        'symbol' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'buzz' => null,
        'company_news_score' => 'float',
        'sector_average_bullish_percent' => 'float',
        'sector_average_news_score' => 'float',
        'sentiment' => null,
        'symbol' => null
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
        'buzz' => 'buzz',
        'company_news_score' => 'companyNewsScore',
        'sector_average_bullish_percent' => 'sectorAverageBullishPercent',
        'sector_average_news_score' => 'sectorAverageNewsScore',
        'sentiment' => 'sentiment',
        'symbol' => 'symbol'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'buzz' => 'setBuzz',
        'company_news_score' => 'setCompanyNewsScore',
        'sector_average_bullish_percent' => 'setSectorAverageBullishPercent',
        'sector_average_news_score' => 'setSectorAverageNewsScore',
        'sentiment' => 'setSentiment',
        'symbol' => 'setSymbol'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'buzz' => 'getBuzz',
        'company_news_score' => 'getCompanyNewsScore',
        'sector_average_bullish_percent' => 'getSectorAverageBullishPercent',
        'sector_average_news_score' => 'getSectorAverageNewsScore',
        'sentiment' => 'getSentiment',
        'symbol' => 'getSymbol'
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
        $this->container['buzz'] = isset($data['buzz']) ? $data['buzz'] : null;
        $this->container['company_news_score'] = isset($data['company_news_score']) ? $data['company_news_score'] : null;
        $this->container['sector_average_bullish_percent'] = isset($data['sector_average_bullish_percent']) ? $data['sector_average_bullish_percent'] : null;
        $this->container['sector_average_news_score'] = isset($data['sector_average_news_score']) ? $data['sector_average_news_score'] : null;
        $this->container['sentiment'] = isset($data['sentiment']) ? $data['sentiment'] : null;
        $this->container['symbol'] = isset($data['symbol']) ? $data['symbol'] : null;
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
     * Gets buzz
     *
     * @return \Finnhub\Model\CompanyNewsStatistics|null
     */
    public function getBuzz()
    {
        return $this->container['buzz'];
    }

    /**
     * Sets buzz
     *
     * @param \Finnhub\Model\CompanyNewsStatistics|null $buzz buzz
     *
     * @return $this
     */
    public function setBuzz($buzz)
    {
        $this->container['buzz'] = $buzz;

        return $this;
    }

    /**
     * Gets company_news_score
     *
     * @return float|null
     */
    public function getCompanyNewsScore()
    {
        return $this->container['company_news_score'];
    }

    /**
     * Sets company_news_score
     *
     * @param float|null $company_news_score News score.
     *
     * @return $this
     */
    public function setCompanyNewsScore($company_news_score)
    {
        $this->container['company_news_score'] = $company_news_score;

        return $this;
    }

    /**
     * Gets sector_average_bullish_percent
     *
     * @return float|null
     */
    public function getSectorAverageBullishPercent()
    {
        return $this->container['sector_average_bullish_percent'];
    }

    /**
     * Sets sector_average_bullish_percent
     *
     * @param float|null $sector_average_bullish_percent Sector average bullish percent.
     *
     * @return $this
     */
    public function setSectorAverageBullishPercent($sector_average_bullish_percent)
    {
        $this->container['sector_average_bullish_percent'] = $sector_average_bullish_percent;

        return $this;
    }

    /**
     * Gets sector_average_news_score
     *
     * @return float|null
     */
    public function getSectorAverageNewsScore()
    {
        return $this->container['sector_average_news_score'];
    }

    /**
     * Sets sector_average_news_score
     *
     * @param float|null $sector_average_news_score Sectore average score.
     *
     * @return $this
     */
    public function setSectorAverageNewsScore($sector_average_news_score)
    {
        $this->container['sector_average_news_score'] = $sector_average_news_score;

        return $this;
    }

    /**
     * Gets sentiment
     *
     * @return \Finnhub\Model\Sentiment|null
     */
    public function getSentiment()
    {
        return $this->container['sentiment'];
    }

    /**
     * Sets sentiment
     *
     * @param \Finnhub\Model\Sentiment|null $sentiment sentiment
     *
     * @return $this
     */
    public function setSentiment($sentiment)
    {
        $this->container['sentiment'] = $sentiment;

        return $this;
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
     * @param string|null $symbol Requested symbol.
     *
     * @return $this
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

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

