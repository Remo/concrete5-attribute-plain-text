<?php

namespace Concrete\Package\AttributePlainText;

use Concrete\Core\Backup\ContentImporter;
use Package;

class Controller extends Package
{

    protected $pkgHandle = 'attribute_plain_text';
    protected $appVersionRequired = '5.7.4';
    protected $pkgVersion = '1.0.1';

    public function getPackageName()
    {
        return t('Plain text attribute');
    }

    public function getPackageDescription()
    {
        return t('Installs a plain text attribute you can use to add labels and hints');
    }

    protected function installXmlContent()
    {
        $pkg = Package::getByHandle($this->pkgHandle);

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function install()
    {
        $pkg = parent::install();

        $this->installXmlContent();
    }

    public function upgrade()
    {
        parent::upgrade();

        $this->installXmlContent();
    }

}
