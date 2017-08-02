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
        || !$this->installdb()
        || !$this->menutab()
        ) {
            return false;
        }

        return true;
    }

    public function installdb()
    {
        return Db::getInstance()->Execute('
        CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'testimonials (
            `id_testimonials` int(11) NOT NULL AUTO_INCREMENT,
            `title`  char(100) NOT NULL,
            `author` char(100) NOT NULL,
            `body` text NOT NULL,
            PRIMARY KEY (`id_testimonials`)
            ) ENGINE= '._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
            ');
    }

    public function menutab()
    {
        $parent_tab = new Tab();
        $parent_tab->name[$this->context->language->id] = $this->l('Testimonial');
        $parent_tab->class_name = 'AdminTmTestimonials';
        $parent_tab->id_parent = 0; // Home tab
        $parent_tab->module = $this->name;
        $parent_tab->add();
        return $parent_tab;
    }

    public function uninstalldb()
    {

        return Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'testimonials');
    }

    public function uninstallmenutab()
    {
        $tab = new Tab((int)Tab::getIdFromClassName('AdminTmTestimonials'));
        $tab->delete();
        return $tab;
    }

    public function uninstall()
    {

        if (!parent::uninstall()
        || !$this->uninstalldb()
        || !$this->uninstallmenutab()
        ) {
            return false;
        }

        else {
            return true;
        }
    }
}
