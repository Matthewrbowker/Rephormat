<?php


class RephormatCreateStep1Controller extends RephormatController
{
  public function handleRequest(AphrontRequest $request)
  {
    if ($request->isFormPost()) {
      $v_type = $request->getStr('type');

      if (in_array($v_type, ['jira', 'github'])) {
        return id(new AphrontRedirectResponse())->setURI(
          $this->getApplicationURI('create/'.$v_type.'/'));
      }
    }

    $crumbs = $this->createCrumbs("Create");

    $form = new AphrontFormView();

    $form->setViewer($request->getUser());

    $form->setFullWidth(false);

    $form->appendInstructions("Use this form to instruct the Daemons to pull information from the existing bug tracker.");

    $radio = new AphrontFormRadioButtonControl();

    $radio->setLabel("Service");

    $radio->setName("type");

    $radio->addButton("jira", "Jira", "Begin an import from Atlassian Jira.");
    $radio->addButton("github", "GitHub", "Begin an import from GitHub.");

    $form->appendControl($radio);

    $form->appendChild(
      (new AphrontFormSubmitControl())
      ->addCancelButton($this->getApplicationURI())
      ->setValue(pht('Continue')));

    $services = new PHUIObjectBoxView();

    $services->setHeaderText("New Import");

    $services->setForm($form);

    return $this->newPage()
      ->setTitle("New Import")
      ->setCrumbs($crumbs)
      ->appendChild($services);
  }
}
