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

  public function handleRequest(AphrontRequest $request) {
    $type = $request->getURIData('type');
    $type = strtolower($type);
    $stylizedName = $this->_getStylizedName($type);

    $crumbs = $this->createCrumbs(["Create", $stylizedName]);

    $services = new PHUIObjectBoxView();

    $services->setHeaderText($stylizedName);

    if($type == "jira") {
      $form = $this->createJiraForm();
    }
    elseif($type == "github") {
      $form = $this->createGithubForm();
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
