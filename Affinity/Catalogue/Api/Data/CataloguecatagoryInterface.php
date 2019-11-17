<?php


namespace Affinity\Catalogue\Api\Data;

interface CataloguecatagoryInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const PDFFILE = 'pdffile';
    const CATEGORY = 'category';
    const NAME = 'name';
    const IMAGE = 'image';
    const CATALOGUECATAGORY_ID = 'cataloguecatagory_id';
    const STATUS = 'status';

    /**
     * Get cataloguecatagory_id
     * @return string|null
     */
    public function getCataloguecatagoryId();

    /**
     * Set cataloguecatagory_id
     * @param string $cataloguecatagoryId
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setCataloguecatagoryId($cataloguecatagoryId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Affinity\Catalogue\Api\Data\CataloguecatagoryExtensionInterface $extensionAttributes
    );

    /**
     * Get category
     * @return string|null
     */
    public function getCategory();

    /**
     * Set category
     * @param string $category
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setCategory($category);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setImage($image);

    /**
     * Get pdffile
     * @return string|null
     */
    public function getPdffile();

    /**
     * Set pdffile
     * @param string $pdffile
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setPdffile($pdffile);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Affinity\Catalogue\Api\Data\CataloguecatagoryInterface
     */
    public function setStatus($status);
}
