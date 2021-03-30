<?php


class RephormatController extends PhabricatorController
{
  function createCrumbs($additional = null, $create = false) {
    {
      $crumbs = parent::buildApplicationCrumbs();

      if($additional != null) {
        $crumbs->addCrumb((new PHUICrumbView())->setName($additional));
      }


      $crumbs->setBorder(true);

      if($create) {
        $crumbs->addAction(
          id(new PHUIListItemView())
            ->setName(pht('New Import'))
            ->setHref($this->getApplicationURI('create/'))
            ->setIcon('fa-plus'));
      }


      return $crumbs;
    }
  }
}
