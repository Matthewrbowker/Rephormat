<?php


class RephormatEditController extends RephormatController
{
    function handleRequest(AphrontRequest $request)
    {
        $viewer = $request->getUser();

        $form = id(new AphrontFormView())
            ->setViewer($viewer);

        $box = id(new PHUIObjectBoxView())
            ->setHeaderText("")
            ->setBackground(PHUIObjectBoxView::WHITE_CONFIG)
            ->setValidationException(null)
            ->appendChild($form);


        $page = $this->newPage();

        $page->appendChild($box);

        return $page;
    }

}