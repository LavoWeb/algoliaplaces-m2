<?php

namespace Lavoweb\AlgoliaPlaces\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class ConfigProvider
 *
 * @package Lavoweb\AlgoliaPlaces\Model
 */
class ConfigProvider implements ConfigProviderInterface
{
    const XML_PATH_ENABLED = 'sales/algolia_places/enabled';
    const XML_PATH_APP_ID = 'sales/algolia_places/app_id';
    const XML_PATH_API_KEY = 'sales/algolia_places/api_key';

    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    protected $scopeConfig;

    /**
     * ConfigProvider constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is Enabled
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get App Id
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_APP_ID, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get Api Key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_API_KEY, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'algolia' => [
                'enabled' => $this->isEnabled(),
                'appid' => $this->getAppId(),
                'apikey' => $this->getApiKey(),
            ],
        ];
    }
}