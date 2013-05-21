<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 21.05.13
 * Time: 21:10
 * To change this template use File | Settings | File Templates.
 */
class Mage_Adminhtml_Block_Newsletter_Subscriber_Grid_Render_Lastname extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{

    public function render(Varien_Object $row){
//        var_dump($row->getData()); exit;
        /**
         * @var Mage_Sales_Model_Order
         */
        $email = $row->getData('subscriber_email');
        $allorders = Mage::getModel('sales/order')->getCollection()
            ->addAttributeToFilter('customer_email',array('eq'=>$email));
        if ($allorders->getSize() > 0){
            foreach ($allorders as $order){
                $name = $order->getData('customer_lastname');
                if ($name){
                    break;
                }
            }
        }

        return $name;
    }
}