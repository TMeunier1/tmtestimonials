<?php
class TmTestimonialsListModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('list.tpl');
        $result = $this->get_testimonials();
        $this->context->smarty->assign("testimonials", $result);
    }

    public function get_testimonials()
    {
        $testimonials = new DbQuery();
        $testimonials->select('*');
        $testimonials->from('testimonials');
        return Db::getInstance()->executeS($testimonials);
    }

}
