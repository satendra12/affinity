<?php


namespace Affinity\Catalogue\Model;

use Affinity\Catalogue\Api\Data\CatalogueInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Affinity\Catalogue\Api\Data\CatalogueInterface;

class Catalogue extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'affinity_catalogue_catalogue';
    protected $catalogueDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CatalogueInterfaceFactory $catalogueDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Affinity\Catalogue\Model\ResourceModel\Catalogue $resource
     * @param \Affinity\Catalogue\Model\ResourceModel\Catalogue\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CatalogueInterfaceFactory $catalogueDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Affinity\Catalogue\Model\ResourceModel\Catalogue $resource,
        \Affinity\Catalogue\Model\ResourceModel\Catalogue\Collection $resourceCollection,
        array $data = []
    ) {
        $this->catalogueDataFactory = $catalogueDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve catalogue model with catalogue data
     * @return CatalogueInterface
     */
    public function getDataModel()
    {
        $catalogueData = $this->getData();
        
        $catalogueDataObject = $this->catalogueDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $catalogueDataObject,
            $catalogueData,
            CatalogueInterface::class
        );
        
        return $catalogueDataObject;
    }
}
