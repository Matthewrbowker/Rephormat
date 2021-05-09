<?php


class PhabricatorRephormatApplication extends PhabricatorApplication
{

    public function getName()
    {
        return pht("Rephormat");
    }

    public function getBaseURI()
    {
      return "/rephormat/";
    }

    public function getIcon()
    {
      return "fa-exchange";
    }

    public function getTitleGlyph()
    {
      return "\xE2\x87\x84";
    }

    public function getShortDescription()
    {
        return "Import from other places.";
    }

    public function getRoutes()
    {
      return array(
        "/rephormat/import/(?P<id>[1-9]\d*)" => "RephormatViewController",
        "/rephormat/" => "RephormatHomeController",
        "/rephormat/create/(?P<type>[^/]+)/" => "RephormatCreateStep2Controller",
        "/rephormat/create/" => "RephormatCreateStep1Controller",
        //"/rephormat/<id>/continue/" => "RephormatImportStep2Controller",
      );
    }

    public function getApplicationGroup()
    {
      return self::GROUP_UTILITIES;
    }

}
