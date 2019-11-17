<?php

namespace Affinity\Catalogue\Model;

class Catagoryselect implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
      //  $catalogue = $this->catalogueFactory->create()->getCollection();
        return [
            ['value' => 0, 'label' => __('Option 1')],
            ['value' => 1, 'label' => __('Option 2')],
            ['value' => 2, 'label' => __('Option 3')],
            ['value' => 3, 'label' => __('Option 4')]
        ];
    }
}