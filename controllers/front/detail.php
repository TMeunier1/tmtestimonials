<?php
class TmTestimonialsDetailModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('detail.tpl');
        $this->context->smarty->assign("testimonial", $this->get_testimonial(Tools::getValue("id")));
    }

    public function get_testimonial(int $id)
    {
        $testimonials = new DbQuery();
        $testimonials->select('*');
        $testimonials->from('testimonials');
        $testimonials->where('id_testimonials ='.$id);
        return Db::getInstance()->executeS($testimonials);

    }
}
