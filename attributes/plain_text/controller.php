<?php

namespace Concrete\Package\AttributePlainText\Attribute\PlainText;

use Database;
use Core;
use \Concrete\Core\Attribute\Controller as AttributeTypeController;

class Controller extends AttributeTypeController
{

    public $helpers = ['form'];

    /**
     * Returns the value entered in the HTML editor
     * @return string
     */
    public function getValue()
    {
        $db = Database::get();
        $ak = $this->getAttributeKey();
        $value = '';
        if (is_object($ak)) {
            $value = htmLawed($db->GetOne('SELECT value FROM atPlainText WHERE akID = ?', [$ak->getAttributeKeyID()]));
        }
        return $value;
    }

    /**
     * Shows the attribute configuration form
     */
    public function type_form()
    {
        $editor = Core::make('editor');
        $this->set('value', $this->getValue());
        $this->set('editor', $editor);
    }

    /**
     * Saves the attribute configuration
     * @param $data
     */
    public function saveKey($data)
    {
        $ak = $this->getAttributeKey();
        $db = Database::get();

        $db->Replace('atPlainText', [
            'akID' => $ak->getAttributeKeyID(),
            'value' => $data['value'],
        ], ['akID'], true);
    }

    /**
     * Shows the value, the HTML text in the form
     */
    public function form()
    {
        echo $this->getValue();
    }

    /**
     * Called when we're searching using an attribute. Uunused since we only show static text.
     * @param $list
     */
    public function searchForm($list)
    {

    }

    /**
     * Called when we're saving the attribute from the frontend. Unused since we only show static text defined
     * in the attribute type configuration.
     * @param $data
     */
    public function saveForm($data)
    {

    }

    /**
     * Called when the attribute is edited in the composer.
     */
    public function composer()
    {
        $this->form();
    }

}
