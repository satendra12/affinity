<?php


namespace Affinity\Catalogue\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Affinity\Catalogue\Model\ResourceModel\Catalogue as ResourceCatalogue;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Affinity\Catalogue\Api\CatalogueRepositoryInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Affinity\Catalogue\Model\ResourceModel\Catalogue\CollectionFactory as CatalogueCollectionFactory;
use Affinity\Catalogue\Api\Data\CatalogueInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Affinity\Catalogue\Api\Data\CatalogueSearchResultsInterfaceFactory;

class CatalogueRepository implements CatalogueRepositoryInterface
{

    protected $dataObjectHelper;

    protected $dataCatalogueFactory;

    protected $catalogueCollectionFactory;

    private $storeManager;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $catalogueFactory;


    /**
     * @param ResourceCatalogue $resource
     * @param CatalogueFactory $catalogueFactory
     * @param CatalogueInterfaceFactory $dataCatalogueFactory
     * @param CatalogueCollectionFactory $catalogueCollectionFactory
     * @param CatalogueSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCatalogue $resource,
        CatalogueFactory $catalogueFactory,
        CatalogueInterfaceFactory $dataCatalogueFactory,
        CatalogueCollectionFactory $catalogueCollectionFactory,
        CatalogueSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->catalogueFactory = $catalogueFactory;
        $this->catalogueCollectionFactory = $catalogueCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCatalogueFactory = $dataCatalogueFactory;
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
        \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
    ) {
        /* if (empty($catalogue->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $catalogue->setStoreId($storeId);
        } */
        
        $catalogueData = $this->extensibleDataObjectConverter->toNestedArray(
            $catalogue,
            [],
            \Affinity\Catalogue\Api\Data\CatalogueInterface::class
        );
        
        $catalogueModel = $this->catalogueFactory->create()->setData($catalogueData);
        
        try {
            $this->resource->save($catalogueModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the catalogue: %1',
                $exception->getMessage()
            ));
        }
        return $catalogueModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($catalogueId)
    {
        $catalogue = $this->catalogueFactory->create();
        $this->resource->load($catalogue, $catalogueId);
        if (!$catalogue->getId()) {
            throw new NoSuchEntityException(__('Catalogue with id "%1" does not exist.', $catalogueId));
        }
        return $catalogue->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->catalogueCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Affinity\Catalogue\Api\Data\CatalogueInterface::class
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
        \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
    ) {
        try {
            $catalogueModel = $this->catalogueFactory->create();
            $this->resource->load($catalogueModel, $catalogue->getCatalogueId());
            $this->resource->delete($catalogueModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Catalogue: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($catalogueId)
    {
        return $this->delete($this->get($catalogueId));
    }
}
