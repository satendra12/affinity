<?php


namespace Affinity\Catalogue\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Affinity\Catalogue\Api\CataloguecatagoryRepositoryInterface;
use Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory\CollectionFactory as CataloguecatagoryCollectionFactory;
use Affinity\Catalogue\Api\Data\CataloguecatagoryInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Affinity\Catalogue\Model\ResourceModel\Cataloguecatagory as ResourceCataloguecatagory;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Affinity\Catalogue\Api\Data\CataloguecatagorySearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class CataloguecatagoryRepository implements CataloguecatagoryRepositoryInterface
{

    protected $dataObjectHelper;

    private $storeManager;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $cataloguecatagoryCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $cataloguecatagoryFactory;

    protected $dataCataloguecatagoryFactory;


    /**
     * @param ResourceCataloguecatagory $resource
     * @param CataloguecatagoryFactory $cataloguecatagoryFactory
     * @param CataloguecatagoryInterfaceFactory $dataCataloguecatagoryFactory
     * @param CataloguecatagoryCollectionFactory $cataloguecatagoryCollectionFactory
     * @param CataloguecatagorySearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCataloguecatagory $resource,
        CataloguecatagoryFactory $cataloguecatagoryFactory,
        CataloguecatagoryInterfaceFactory $dataCataloguecatagoryFactory,
        CataloguecatagoryCollectionFactory $cataloguecatagoryCollectionFactory,
        CataloguecatagorySearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->cataloguecatagoryFactory = $cataloguecatagoryFactory;
        $this->cataloguecatagoryCollectionFactory = $cataloguecatagoryCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCataloguecatagoryFactory = $dataCataloguecatagoryFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
    ) {
        /* if (empty($cataloguecatagory->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $cataloguecatagory->setStoreId($storeId);
        } */
        
        $cataloguecatagoryData = $this->extensibleDataObjectConverter->toNestedArray(
            $cataloguecatagory,
            [],
            \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface::class
        );
        
        $cataloguecatagoryModel = $this->cataloguecatagoryFactory->create()->setData($cataloguecatagoryData);
        
        try {
            $this->resource->save($cataloguecatagoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the cataloguecatagory: %1',
                $exception->getMessage()
            ));
        }
        return $cataloguecatagoryModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($cataloguecatagoryId)
    {
        $cataloguecatagory = $this->cataloguecatagoryFactory->create();
        $this->resource->load($cataloguecatagory, $cataloguecatagoryId);
        if (!$cataloguecatagory->getId()) {
            throw new NoSuchEntityException(__('Cataloguecatagory with id "%1" does not exist.', $cataloguecatagoryId));
        }
        return $cataloguecatagory->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->cataloguecatagoryCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
    ) {
        try {
            $cataloguecatagoryModel = $this->cataloguecatagoryFactory->create();
            $this->resource->load($cataloguecatagoryModel, $cataloguecatagory->getCataloguecatagoryId());
            $this->resource->delete($cataloguecatagoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Cataloguecatagory: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($cataloguecatagoryId)
    {
        return $this->delete($this->get($cataloguecatagoryId));
    }
}
