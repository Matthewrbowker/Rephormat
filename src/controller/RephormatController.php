<?php


abstract class RephormatController extends PhabricatorController
{
  function createJiraForm($path = "", $username = "") {
    $form = new AphrontFormView();
    $form->setViewer($this->getViewer());

    $uriField = new AphrontFormTextControl();
    $uriField->setName("uri");
    $uriField->setLabel("URI");
    $uriField->setValue($path);

    $form->appendChild($uriField);

    $usernameField = new AphrontFormTextControl();
    $usernameField->setName("username");
    $usernameField->setLabel("Username for Jira");
    $usernameField->setValue($username);

    $form->appendChild($usernameField);

    $passwordForm = new AphrontFormPasswordControl();
    $passwordForm->setName("password");
    $passwordForm->setLabel("Password for Jira");

    $form->appendChild($passwordForm);

      $form->appendChild(
          (new AphrontFormSubmitControl())
              ->addCancelButton($this->getApplicationURI($path))
              ->setValue(pht('Continue')));

    return $form;
  }

  function createGithubForm($path = "", $repository = "", $username = "") {
    $form = new AphrontFormView();
    $form->setViewer($this->getViewer());

    $text1 = new AphrontFormTextControl();
    $text1->setName("repository");
    $text1->setLabel("Repository");

    if($repository != "") {
      $text1->setValue($repository);
    }

    $form->appendChild($text1);

    $text2 = new AphrontFormTextControl();
    $text2->setName("username");
    $text2->setLabel("Username");

    if($username != "") {
      $text2->setValue($username);
    }

    $form->appendChild($text2);

    $text3 = new AphrontFormPasswordControl();
    $text3->setName("password");
    $text3->setLabel("Password");

    $form->appendChild($text3);

    $form->appendChild(
      (new AphrontFormSubmitControl())
        ->addCancelButton($this->getApplicationURI($path))
        ->setValue(pht('Continue')));

    return $form;
  }

  function createCrumbs($additional = null, $create = true)
  {
      {
          $crumbs = parent::buildApplicationCrumbs();

          if (is_array($additional)) {
              foreach ($additional as $link) {
                  $crumb = new PHUICrumbView();
                  $crumb->setHref($this->getApplicationURI(strtolower($link)));
                  $crumb->setName($link);
                  $crumbs->addCrumb($crumb);
              }
          } elseif ($additional != null) {
              $crumbs->addCrumb((new PHUICrumbView())->setName($additional));
          }


          $crumbs->setBorder(true);

          if ($create) {
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
