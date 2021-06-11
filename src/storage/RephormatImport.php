<?php


class RephormatImport extends PhabricatorRephormatDAO
implements PhabricatorPolicyInterface
{
    protected $name;
    protected $authorPHID;
    protected $importType;
    protected $active;

    public function getCapabilities() {
        return array(
            PhabricatorPolicyCapability::CAN_VIEW,
            PhabricatorPolicyCapability::CAN_EDIT,
        );
    }

    public function getMonogram() {
        return "RI" . $this->getId();
    }

    public function getPolicy($capability) {
        return true;
        switch ($capability) {
            case PhabricatorPolicyCapability::CAN_VIEW:
                return $this->getViewPolicy();
            case PhabricatorPolicyCapability::CAN_EDIT:
                    return $this->getEditPolicy();
        }
    }

    public function hasAutomaticCapability($capability, PhabricatorUser $viewer)
    {
        return false;
    }


    protected function loadPage()
    {
        return $this->loadStandardPage(new RephormatImport());
    }

    public function getQueryApplicationClass()
    {
        return "rephormat";
    }

    public function getImportTypeStylized() {
        $name = strtolower($this->importType);

        $name = ucfirst($name);

        if($name == "Github") {
            $name = "GitHub";
        }

        return $name . " " . pht("Import");
    }
}
