<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_ZendeskIntegration
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\ZendeskIntegration\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class for helper Data
 */
class Data extends AbstractHelper
{
    const IS_POPUP_ENABLED = 'zESettings/popup/enabled';
    const CONFIG_POPUP_SNIPPET = 'zESettings/popup/snippet';
    const CONFIG_CONTACT_US_LINK = 'zESettings/popup/contactUsLink';

    protected StoreManagerInterface $storeManager;

    /**
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @param $configPath
     * @return mixed
     */
    private function getConfig($configPath)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return bool
     */
    public function isZePopupEnabled()
    {
        return (bool)$this->getConfig(self::IS_POPUP_ENABLED);
    }

    /**
     * @return string
     */
    public function getZePopupSnippet()
    {
        return (string)$this->getConfig(self::CONFIG_POPUP_SNIPPET);
    }

    /**
     * @return string
     */
    public function getZeContactUsLink()
    {
        return (string)$this->getConfig(self::CONFIG_CONTACT_US_LINK);
    }
}
