<?php


class RephormatCreateController extends RephormatController
{
    public function handleRequest(AphrontRequest $request)
    {
        $viewer = $request->getUser();
        if ($request->isFormPost()) {

            $step = (int)$request->getStr("step", 0);

            if ($step == 1) {
                // Step 1: Enter credentials
                $type = $request->getStr('type');

                if (in_array($type, ['jira', 'github'])) {

                    $stylizedName = (new RephormatImport())->getImportTypeStylized($type);

                    $crumbs = $this->createCrumbs(["Create"]);

                    $services = new PHUIObjectBoxView();

                    $services->setHeaderText($stylizedName);

                    if ($type == "jira") {
                        $form = $this->createJiraForm();
                    } elseif ($type == "github") {
                        $form = $this->createGithubForm();
                    } else {
                        return (new AphrontRedirectResponse())->setURI($this->getApplicationURI("create"));
                    }

                    $services->appendChild($form);

                    return $this->newPage()
                        ->setTitle("New Import: " . $stylizedName)
                        ->setCrumbs($crumbs)
                        ->appendChild($services);
                }
            } elseif ($step == 2) {
                // Step 2: Save
            } else {
                return new Aphront404Response();
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
            (new AphrontFormTextControl())
                ->setHidden(true)
                ->setName("step")
                ->setValue(1)
        );

        $form->appendChild(
            (new AphrontFormSubmitControl())
                ->addCancelButton($this->getApplicationURI())
                ->setValue(pht('Continue')));

        $box = id(new PHUIObjectBoxView())
            ->setHeaderText("New Import")
            ->setBackground(PHUIObjectBoxView::WHITE_CONFIG)
            ->setValidationException()
            ->appendChild($form);

        $crumbs->setBorder(true);

        return $this->newPage()
            ->setTitle("New Import")
            ->setCrumbs($crumbs)
            ->appendChild($box);
    }
}
