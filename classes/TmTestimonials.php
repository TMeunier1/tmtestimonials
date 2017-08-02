<?php

class TmTestimonials extends Module {

    public function __construct()
    {
        $this->name = 'tmtestimonials';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Tibau Meunier';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = false;

        parent::__construct();

        $this->displayName = $this->l('Tmtestimonials');
        $this->description = $this->l('Description of my Testimonials module.');

        $this->confirmUninstall = $this->l('Cmon don\'t uninstall this, are you serious?');
    }

    public function install()
    {

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install()

        ) {
            return false;
        }

        return true;
    }


    public function uninstall()
    {

        if (!parent::uninstall()

        ) {
            return false;
        }

        else {
            return true;
        }
    }
}
