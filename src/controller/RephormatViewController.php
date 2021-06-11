<?php


class RephormatViewController extends RephormatController
{

  public function handleRequest(AphrontRequest $request)
  {
    $id = $request->getURIData("id");
    $page = id(new PHUITwoColumnView());
    $viewer = $this->getViewer();

    $data = id(new ImportQuery())
      ->setViewer($this->getViewer())
      ->withIDs($id)
      ->executeOne();

      if(!$data) {
          return new Aphront404Response();
      }

    $header = new PHUIHeaderView();

    $header->setUser($viewer);

    $header->setHeader($data->getName());

      $header->addTag((new PHUITagView())
          ->setType(PHUITagView::TYPE_SHADE)
          ->setName($data->getImportTypeStylized())
          ->setColor("green"));

    $header->setPolicyObject($data);

    if($data->getActive()) {
        $header->setStatus('fa-check', 'bluegrey', pht('Active'));
    } else {
        $header->setStatus('fa-ban', 'indigo', pht('Archived'));
    }

    $box = id(new PHUIObjectBoxView())
        ->setHeaderText(pht('Details'))
        ->setBackground(PHUIObjectBoxView::BLUE_PROPERTY);
        //->addPropertyList($property_list);

    $page->setHeader($header);

    $page->setMainColumn($box);

    $page->setCurtain($this->newCurtainView($data));

    return $this->newPage()
        ->setTitle($data->getMonogram() . ": " . $data->getName())
        ->setCrumbs($this->createCrumbs($data->getMonogram()))
        ->appendChild($page);
  }

}
