<?php


namespace Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory;

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
            \Affinity\Catalogue\Model\Cataloguecatagory::class,
            \Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory::class
        );
    }
}
