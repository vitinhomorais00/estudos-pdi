<?php
/**
 * Copyright © Vitor Morais, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace VitorMorais\WhatsApp\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;


class ConfigViewModel implements ArgumentInterface
{
     /** @var ScopeConfigInterface  */
     private $scopeConfig;

     /**
          * @param ScopeConfigInterface $scopeConfig
          * @param StoreManagerInterface $storeManager
          */
     public function __construct(
          ScopeConfigInterface $scopeConfig
     ) {
          $this->scopeConfig = $scopeConfig;
     }

     public function isEnabled() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/enabled', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getWhatsappNumber() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/number', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getWhatsappPosition() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/position', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getOpenNewTab() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/open_new_tab', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getIconColor() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/icon_color', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getIconBackgroundColor() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/icon_background_color', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }

     public function getWidth() 
     {
          return $this->scopeConfig->getValue('vitormorais_whatsapp/vitormorais_general/width', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
     }
}