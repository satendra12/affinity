<?php


namespace Affinity\Catalogue\Model\Data;

use Affinity\Catalogue\Api\Data\CataloguecatagoryInterface;

class Cataloguecatagory extends \Magento\Framework\Api\AbstractExtensibleObject implements CataloguecatagoryInterface
{

    /**
     * Get cataloguecatagory_id
     * @return string|null
     */
    public function getCataloguecatagoryId()
    {
        return $this->_get(self::CATALOGUECATAGORY_ID);
    }

    /**
     * Set cataloguecatagory_id
     * @param string $cataloguecatagoryId
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setCataloguecatagoryId($cataloguecatagoryId)
    {
        return $this->setData(self::CATALOGUECATAGORY_ID, $cataloguecatagoryId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get category
     * @return string|null
     */
    public function getCategory()
    {
        return $this->_get(self::CATEGORY);
    }

    /**
     * Set category
     * @param string $category
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * Get image
     * @return string|null
     */
    public function getImage()
    {
        return $this->_get(self::IMAGE);
    }

    /**
     * Set image
     * @param string $image
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get pdffile
     * @return string|null
     */
    public function getPdffile()
    {
        return $this->_get(self::PDFFILE);
    }

    /**
     * Set pdffile
     * @param string $pdffile
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setPdffile($pdffile)
    {
        return $this->setData(self::PDFFILE, $pdffile);
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
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
