<?php
/**
 * Copyright © Vitor Morais, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace VitorMorais\WhatsApp\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManagerInterface;

class ConfigViewModel implements ArgumentInterface
{
     /** @var ScopeConfigInterface */
     private $scopeConfig;

     /** @var StoreManagerInterface */
     private $storeManager;

     /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
     public function __construct(
          ScopeConfigInterface $scopeConfig,
          StoreManagerInterface $storeManager
     ) {
          $this->scopeConfig = $scopeConfig;
          $this->storeManager = $storeManager;
     }

     public function isEnabled()
     {
          return $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/enabled',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );
     }

     public function getWhatsappNumber()
     {
          return $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/number',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );
     }

     public function getWhatsappMessage()
     {
          $messageFull = $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/message',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
               );
          if (empty($messageFull)) {
               return '';
          }

          if (!empty($messageFull)) {
               $messageTreated = str_replace(" ", "+", $messageFull);
               return '&text=' . $messageTreated;
          }
     }

     public function getWhatsappPosition()
     {
          return $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/position',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );
     }

     public function getOpenNewTab()
     {
          return $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/open_new_tab',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );
     }

     public function getWhatsappUrlApi()
     {
          return $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/url',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );
     }

     public function getCustomIcon()
     {
          $customIcon = $this->scopeConfig->getValue(
              'vitormorais_whatsapp/vitormorais_general/custom_icon',
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          );

          if (empty($customIcon)) {
               return null;
          }

          return $this->getMediaUrl() . 'custom_icon/' . $customIcon;
     }

     public function getMediaUrl()
     {
          return $this->storeManager
               ->getStore()
               ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
     }
}