<?php


class PhabricatorRephormatSearchEngine extends PhabricatorApplicationSearchEngine
{

    /**
     * @inheritDoc
     */
    protected function getURI($path)
    {
        return "/rephormat/" . $path;
    }

    /**
     * @inheritDoc
     */
    public function getResultTypeDescription()
    {
        return pht("Imports");
    }

    public function getApplicationClassName()
    {
        return "PhabricatorRephormatApplication";
    }

    protected function buildCustomSearchFields() {
        return array(
            id(new PhabricatorSearchThreeStateField())
                ->setLabel(pht('Active'))
                ->setKey('active')
                ->setOptions(
                    pht('(Show All)'),
                    pht('Show Only Active Imports'),
                    pht('Hide Active Imports')),
        );
    }

    public function newQuery() {
        return new ImportQuery();
    }

    protected function buildQueryFromParameters(array $map) {
        $query = $this->newQuery();

        if ($map['active']) {
            $query->withActive($map['active']);
        }

        return $query;
    }

    protected function renderResultList(array $imports, PhabricatorSavedQuery $query, array $handles)
    {
        $viewer = $this->requireViewer();

        $list = new PHUIObjectItemListView();
        $list->setUser($viewer);
        foreach ($imports as $import) {
            $item = id(new PHUIObjectItemView())
                ->setObject($import)
                ->setObjectName($import->getMonogram())
                ->setHeader($import->getName())
                ->setSubHead($import->getImportTypeStylized())
                ->setHref('/'.$import->getMonogram());

            $list->addItem($item);
        }

        $result = new PhabricatorApplicationSearchResultView();
        $result->setObjectList($list);
        $result->setNoDataString(pht('No imports found.'));

        return $result;
    }

    protected function getNewUserBody() {
        $create_button = id(new PHUIButtonView())
            ->setTag('a')
            ->setText(pht('Start an import'))
            ->setHref('/rephormat/create/')
            ->setColor(PHUIButtonView::GREEN);

        $icon = $this->getApplication()->getIcon();
        $app_name =  $this->getApplication()->getName();
        $view = id(new PHUIBigInfoView())
            ->setIcon($icon)
            ->setTitle(pht('Welcome to %s', $app_name))
            ->setDescription(
                pht('Import from other places.'))
            ->addAction($create_button);

        return $view;
    }

}