<?php


namespace Affinity\Catalogue\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CataloguecatagoryRepositoryInterface
{

    /**
     * Save Cataloguecatagory
     * @param \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
    );

    /**
     * Retrieve Cataloguecatagory
     * @param string $cataloguecatagoryId
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($cataloguecatagoryId);

    /**
     * Retrieve Cataloguecatagory matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagorySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Cataloguecatagory
     * @param \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface $cataloguecatagory
    );

    /**
     * Delete Cataloguecatagory by ID
     * @param string $cataloguecatagoryId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($cataloguecatagoryId);
}
