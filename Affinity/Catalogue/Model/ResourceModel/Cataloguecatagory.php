<?php


namespace Affinity\Catalogue\Model\ResourceModel;

class Cataloguecatagory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('affinity_catalogue_cataloguecatagory', 'cataloguecatagory_id');
    }
}
