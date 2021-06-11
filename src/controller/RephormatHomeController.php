<?php


class RephormatHomeController extends RephormatController
{

    public function handleRequest(AphrontRequest $request) {
        $request = $this->getRequest();
        $controller = id(new PhabricatorApplicationSearchController())
            ->setQueryKey($request->getURIData('queryKey'))
            ->setSearchEngine(new PhabricatorRephormatSearchEngine())
            ->setNavigation($this->buildSideNavView());

        return $this->delegateToController($controller);
    }

    public function buildSideNavView() {
        $user = $this->getRequest()->getUser();

        $nav = new AphrontSideNavFilterView();
        $nav->setBaseURI(new PhutilURI($this->getApplicationURI()));

        id(new PhabricatorRephormatSearchEngine())
            ->setViewer($user)
            ->addNavigationItems($nav->getMenu());

        $nav->selectFilter(null);

        return $nav;
    }

  protected function buildApplicationCrumbs()
  {
      return $this->createCrumbs();
  }
}
