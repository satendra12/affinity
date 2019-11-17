<?php


namespace Affinity\Catalogue\Controller\Adminhtml\Cataloguecatagory;

class Delete extends \Affinity\Catalogue\Controller\Adminhtml\Cataloguecatagory
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('cataloguecatagory_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Affinity\Catalogue\Model\Cataloguecatagory::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Cataloguecatagory.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['cataloguecatagory_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Cataloguecatagory to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
