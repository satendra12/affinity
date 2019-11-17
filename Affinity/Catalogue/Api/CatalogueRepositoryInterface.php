<?php


namespace Affinity\Catalogue\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CatalogueRepositoryInterface
{

    /**
     * Save Catalogue
     * @param \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
    );

    /**
     * Retrieve Catalogue
     * @param string $catalogueId
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($catalogueId);

    /**
     * Retrieve Catalogue matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Affinity\Catalogue\Api\Data\CatalogueSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Catalogue
     * @param \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Affinity\Catalogue\Api\Data\CatalogueInterface $catalogue
    );

    /**
     * Delete Catalogue by ID
     * @param string $catalogueId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($catalogueId);
}
