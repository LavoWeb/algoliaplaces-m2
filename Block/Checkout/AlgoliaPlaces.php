<?php

namespace Lavoweb\AlgoliaPlaces\Block\Checkout;

use Magento\Framework\View\Element\Template;

class AlgoliaPlaces extends Template
{
    const XML_PATH_ENABLED = 'sales/algolia_places/enabled';
    const XML_PATH_APP_ID = 'sales/algolia_places/app_id';
    const XML_PATH_API_KEY = 'sales/algolia_places/api_key';

    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    protected $scopeConfig;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getAppId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_APP_ID, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getApiKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_API_KEY, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}