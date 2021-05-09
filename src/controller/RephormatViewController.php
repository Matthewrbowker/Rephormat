<?php


class RephormatViewController extends RephormatController
{

  public function handleRequest(AphrontRequest $request)
  {
    $id = $request->getURIData("id");
    $page = $this->newPage();

    //$data = (new PhabricatorRephormatImportQuery())
    //  ->setViewer($this->getViewer())
    //  ->execute();

    //var_dump($data);

    $page->setTitle("Import ". $id);

    $header = new PHUIHeaderView();

    $header->setHeader("Import " . $id);

    $header->addTag((new PHUITagView())
      ->setType(PHUITagView::TYPE_SHADE)
      ->setName("Import " . $id)
      ->setColor("grey"));

    $page->appendChild($header);

    return $page;
  }

}
