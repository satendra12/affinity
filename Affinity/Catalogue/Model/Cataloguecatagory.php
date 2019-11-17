<?php


namespace Affinity\Catalogue\Model;

use Affinity\Catalogue\Api\Data\CataloguecatagoryInterface;
use Affinity\Catalogue\Api\Data\CataloguecatagoryInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Cataloguecatagory extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'affinity_catalogue_cataloguecatagory';
    protected $cataloguecatagoryDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CataloguecatagoryInterfaceFactory $cataloguecatagoryDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory $resource
     * @param \Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CataloguecatagoryInterfaceFactory $cataloguecatagoryDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory $resource,
        \Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory\Collection $resourceCollection,
        array $data = []
    ) {
        $this->cataloguecatagoryDataFactory = $cataloguecatagoryDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve cataloguecatagory model with cataloguecatagory data
     * @return CataloguecatagoryInterface
     */
    public function getDataModel()
    {
        $cataloguecatagoryData = $this->getData();
        
        $cataloguecatagoryDataObject = $this->cataloguecatagoryDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $cataloguecatagoryDataObject,
            $cataloguecatagoryData,
            CataloguecatagoryInterface::class
        );
        
        return $cataloguecatagoryDataObject;
    }

}
