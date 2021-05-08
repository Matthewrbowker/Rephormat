<?php


class RephormatHomeController extends RephormatController
{

  public function handleRequest(AphrontRequest $request)
  {
    $view = new AphrontMultiColumnView();

    $col1 = new AphrontSideNavFilterView();

    $col1->setBaseURI(new PhutilURI($this->getApplicationURI()));
    $col1->selectFilter(null);

    $col1->addMenuItem(
      (new PHUIListItemView())
        ->setName("Active Imports")
        ->setHref($this->getApplicationURI())
        ->setType(PHUIListItemView::TYPE_LINK)
    );

    $col1->addMenuItem(
      (new PHUIListItemView())
        ->setName("All Imports")
        ->setHref($this->getApplicationURI("all"))
        ->setType(PHUIListItemView::TYPE_LINK)
    );

    $view->addColumn($col1);

    $col2 = new PHUIListItemView();

    //$col2->setURI(new PhutilURI($this->getApplicationURI()), "offset");

    $view->addColumn($col2);

    return $this->newPage()
      ->setTitle("TEST")
      ->setCrumbs($this->createCrumbs(null, true))
      ->appendChild($view);
  }
}
