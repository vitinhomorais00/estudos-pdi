<?php
/**
 * Copyright © Vitor Morais, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Vitormorais\Whatsapp\Model\Config\Source;

class Position implements \Magento\Framework\Option\ArrayInterface
{
     /**
      * Options getter
      *
      * @return array
      */
     public function toOptionArray()
     {
          return [['value' => 'left', 'label' => __('Left')], ['value' => 'right', 'label' => __('Right')]];
     }

     /**
      * Get options in "key-value" format
      *
      * @return array
      */
     public function toArray()
     {
          return ['right' => __('Right'), 'left' => __('Left')];
     }
}
