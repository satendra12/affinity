<?php

namespace Affinity\Catalogue\Model;
class Catagoryselect implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('affinity_catalogue_catalogue'); //gives table name with prefix
        $sql = "Select * FROM " . $tableName;
        $result = $connection->fetchAll($sql);
        $itemArray = array('value' => '', 'label' => '--Please Select--');
        $categoryArray = array();
        $categoryArray[] = $itemArray;
        foreach ($result as $category)
        {
            $categoryArray[] = array('value' => $category['catalogue_id'], 'label' => $category['title']);
        }
        return $categoryArray;
    }
}