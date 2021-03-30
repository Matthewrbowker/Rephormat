<?php

class RephormatCreateStep2Controller extends RephormatController {

  private function _getStylizedName($name) {
    $name = strtolower($name);

    $name = ucfirst($name);

    if($name == "Github") {
      $name = "GitHub";
    }

    return $name;
  }

  private function _jiraFormControls($form) {
    return $form;
  }

  private function _githubFormControls($form) {
    return $form;
  }

  public function handleRequest(AphrontRequest $request) {
    $type = $request->getURIData('type');
    $type = strtolower($type);
    $stylizedName = $this->_getStylizedName($type);

    $crumbs = $this->createCrumbs("Create: " . $stylizedName);

    $services = new PHUIObjectBoxView();

    $services->setHeaderText($stylizedName);

    $form = new AphrontFormView();

    $form->setViewer($this->getViewer());

    if($type == "jira") {
      $form = $this->_jiraFormControls($form);
    }
    elseif($type == "github") {
      $form = $this->_githubFormControls($form);
    }
    else{
      return (new AphrontRedirectResponse())->setURI($this->getApplicationURI("create"));
    }

    $services->appendChild($form);

    return $this->newPage()
      ->setTitle("New Import: " . $stylizedName)
      ->setCrumbs($crumbs)
      ->appendChild($services);

  }
}
