<?php


namespace Affinity\Catalogue\Api\Data;

interface CatalogueInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CATALOGUE_ID = 'catalogue_id';
    const TITLE = 'title';
    const STATUS = 'status';

    /**
     * Get catalogue_id
     * @return string|null
     */
    public function getCatalogueId();

    /**
     * Set catalogue_id
     * @param string $catalogueId
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setCatalogueId($catalogueId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface $extensionAttributes
    );

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setStatus($status);
}
