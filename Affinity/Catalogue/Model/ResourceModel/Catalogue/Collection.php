<?php


namespace Affinity\Catalogue\Model\ResourceModel\Catalogue;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Affinity\Catalogue\Model\Catalogue::class,
            \Affinity\Catalogue\Model\ResourceModel\Catalogue::class
        );
    }
}
