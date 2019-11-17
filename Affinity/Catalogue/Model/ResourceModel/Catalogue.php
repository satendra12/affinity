<?php


namespace Affinity\Catalogue\Model\ResourceModel;

class Catalogue extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('affinity_catalogue_catalogue', 'catalogue_id');
    }
}
