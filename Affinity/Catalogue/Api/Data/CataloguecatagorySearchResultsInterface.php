<?php


namespace Affinity\Catalogue\Api\Data;

interface CataloguecatagorySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Cataloguecatagory list.
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
