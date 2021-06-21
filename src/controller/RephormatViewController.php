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

    $curtain = $this->newCurtainView();

      $curtain->addAction(
          id(new PhabricatorActionView())
              ->setName(pht('Continue Import'))
              ->setIcon('fa-arrow-right')
              ->setHref($this->getApplicationURI($data->getID() . "/continue"))
//              ->setWorkflow(!$can_edit)
//              ->setDisabled(!$can_edit));
            );

      $curtain->addAction(
          id(new PhabricatorActionView())
              ->setName(pht('Edit Import'))
              ->setIcon('fa-pencil')
              ->setHref($this->getApplicationURI('edit/'.$data->getID()))
//              ->setWorkflow(!$can_edit)
//              ->setDisabled(!$can_edit));
            );

      if($data->getActive()) {
          $curtain->addAction(
              id(new PhabricatorActionView())
                  ->setName(pht('Archive Import'))
                  ->setIcon('fa-ban')
                  ->setHref($this->getApplicationURI("archive/{$id}"))
//                  ->setDisabled(!$can_edit)
                  ->setWorkflow(true));
      } else {
          $curtain->addAction(
              id(new PhabricatorActionView())
                  ->setName(pht('Activate Import'))
                  ->setIcon('fa-check')
                  ->setHref($this->getApplicationURI("activate/{$id}"))
//                  ->setDisabled(!$can_edit)
                  ->setWorkflow(true));
      }

    $page->setCurtain($curtain);

    return $this->newPage()
        ->setTitle($data->getMonogram() . ": " . $data->getName())
        ->setCrumbs($this->createCrumbs($data->getMonogram()))
        ->appendChild($page);
  }

}
