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
        "/RI(?P<id>[1-9]\d*)" => "RephormatViewController",
        "/rephormat/" => "RephormatHomeController",
        '/rephormat/(?:query/(?P<queryKey>[^/]+)/)?' => "RephormatHomeController",
        "/rephormat/create/" => "RephormatCreateController",
      );
    }

    public function getApplicationGroup()
    {
      return self::GROUP_UTILITIES;
    }

}
