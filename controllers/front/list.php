<?php
class TmTestimonialsListModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('list.tpl');
        $result = $this->get_testimonials();
        foreach ($result as $testimonial) {
            $testimonial["link"] = $this->context->link->getModuleLink('tmtestimonials', 'detail',
            array(
                'id' => $testimonial["id_testimonials"]
            ));
            $testimonial_detail[] = $testimonial;
        }
        $this->context->smarty->assign("testimonials", $testimonial_detail);
    }

    public function get_testimonials()
    {
        $testimonials = new DbQuery();
        $testimonials->select('*');
        $testimonials->from('testimonials');
        return Db::getInstance()->executeS($testimonials);
    }

}
