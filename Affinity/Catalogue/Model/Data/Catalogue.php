<?php


namespace Affinity\Catalogue\Model\Data;

use Affinity\Catalogue\Api\Data\CatalogueInterface;

class Catalogue extends \Magento\Framework\Api\AbstractExtensibleObject implements CatalogueInterface
{

    /**
     * Get catalogue_id
     * @return string|null
     */
    public function getCatalogueId()
    {
        return $this->_get(self::CATALOGUE_ID);
    }

    /**
     * Set catalogue_id
     * @param string $catalogueId
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setCatalogueId($catalogueId)
    {
        return $this->setData(self::CATALOGUE_ID, $catalogueId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Affinity\Catalogue\Api\Data\CatalogueExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Affinity\Catalogue\Api\Data\CatalogueInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
