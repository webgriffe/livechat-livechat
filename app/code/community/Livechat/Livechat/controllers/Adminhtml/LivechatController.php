<?php
class Livechat_Livechat_Adminhtml_LivechatController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() 
	{
		$block = $this->getLayout()->createBlock(
			'Mage_Core_Block_Template',
			'livechat_config',
			array('template' => 'livechat/livechat_config.phtml')
		);

		$this->loadLayout()
			->_setActiveMenu('livechat')
			->_addContent($block)
			->renderLayout();
	}

	public function postAction() 
	{
		$livechat_license_number = filter_input(INPUT_POST, 'livechat_license_number',FILTER_SANITIZE_SPECIAL_CHARS);
		$livechat_login = filter_input(INPUT_POST, 'livechat_login',FILTER_SANITIZE_SPECIAL_CHARS);
		$livechat_mobile = filter_input(INPUT_POST, 'livechat_mobile',FILTER_SANITIZE_SPECIAL_CHARS);
		$livechat_sounds = filter_input(INPUT_POST, 'livechat_sounds',FILTER_SANITIZE_SPECIAL_CHARS);
		$livechat_cart = filter_input(INPUT_POST, 'livechat_cart',FILTER_SANITIZE_SPECIAL_CHARS);

		!isset($livechat_license_number) ? $livechat_license_number = ' ' : $livechat_license_number;
		!isset($livechat_login) ? $livechat_login = ' ' : $livechat_login;
		!isset($livechat_mobile) ? $livechat_mobile = 'No' : $livechat_mobile;  
		!isset($livechat_sounds) ? $livechat_sounds = 'No' : $livechat_sounds;  
		!isset($livechat_cart) ? $livechat_cart = 'Yes' : $livechat_cart;  

		Mage::getConfig()->saveConfig('livechat/general/license', $livechat_license_number);
		Mage::getConfig()->saveConfig('livechat/general/login', $livechat_login);
		Mage::getConfig()->saveConfig('livechat/general/mobile', $livechat_mobile);
		Mage::getConfig()->saveConfig('livechat/general/sounds', $livechat_sounds);
		Mage::getConfig()->saveConfig('livechat/general/cart', $livechat_cart);

		Mage::app()->getCacheInstance()->flush();

		$this->_redirect('*/*/index');
	}

	public function resetAction() {
		Mage::getConfig()->deleteConfig('livechat/general/license');
		Mage::getConfig()->deleteConfig('livechat/general/login');
		Mage::getConfig()->deleteConfig('livechat/general/mobile');
		Mage::getConfig()->deleteConfig('livechat/general/sounds');
		Mage::getConfig()->deleteConfig('livechat/general/cart');

		Mage::app()->getCacheInstance()->flush();

		$this->_redirect('*/*/index');
	}
}