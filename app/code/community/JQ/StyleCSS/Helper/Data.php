<?php
class JQ_StyleCSS_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isEnabledCriticalPathCSS() {
        if (Mage::getStoreConfig('stylecss/critical_path/enable', Mage::app()->getStore()) && Mage::getStoreConfig('dev/css/merge_css_files', Mage::app()->getStore())) {
            return 1;
        } else {
            return 0;
        }
    }

    public function isEnabledCustomStyles() {
        return Mage::getStoreConfig('stylecss/custom_styles/enable', Mage::app()->getStore());
    }

    public function getCriticalStyles() {
        $criticalStyles = Mage::getStoreConfig('stylecss/critical_path/style', Mage::app()->getStore()); // general and Home Page critical styles
        $criticalStylesCatalog = Mage::getStoreConfig('stylecss/critical_path/style_catalog', Mage::app()->getStore()); // Catalog Page
        $criticalStylesProduct = Mage::getStoreConfig('stylecss/critical_path/style_product', Mage::app()->getStore()); //Product Page

        if(Mage::app()->getFrontController()->getRequest()->getControllerName() == 'category' && $criticalStylesCatalog != "") {
            $criticalStyles = $criticalStylesCatalog;
        }
        else if (Mage::app()->getFrontController()->getRequest()->getControllerName() == 'product' && $criticalStylesProduct != "") {
            $criticalStyles = $criticalStylesProduct;
        }

        return $criticalStyles;
    }

    public function getCustomStyles() {
        return Mage::getStoreConfig('stylecss/custom_styles/all_pages', Mage::app()->getStore());
    }
}
     