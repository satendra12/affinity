<?php


namespace Affinity\Catalogue\Api\Data;

interface CatalogueSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Catalogue list.
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Affinity\Catalogue\Api\Data\CatalogueInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
