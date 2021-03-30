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
      return "fa-arrows";
    }

    public function getTitleGlyph()
    {
      return "\xE2\x98\x88";
    }

  public function getRoutes()
    {
      return array(
        "/RI(?P<id>[1-9]\d*)" => "RephormatViewController",
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
