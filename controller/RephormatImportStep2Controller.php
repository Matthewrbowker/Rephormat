<?php


class RephormatImportStep2Controller extends RephormatController
{
  public function handleRequest(AphrontRequest $request)
  {
    $crumbs = parent::buildApplicationCrumbs();

    $crumbs->addCrumb((new PHUICrumbView())->setName("New Import"));

    $services = new PHUIBoxView();

    $form = new AphrontFormView();

    $form->appendControl(
      (new AphrontFormTextControl())
        ->setName("name")
        ->setID("name")
        ->setLabel("Name")
    );

    return $this->newPage()
      ->setTitle("TEST")
      ->setCrumbs($crumbs)
      ->appendChild($form);
  }

}
