<?php


class PhabricatorRephormatImportRemarkupRule extends PhabricatorObjectRemarkupRule
{

    protected function getObjectNamePrefix()
    {
        return "Import ";
    }

    protected function loadObjects(array $ids)
    {
      $viewer = $this->getEngine()->getConfig('viewer');

      return id(new PhabricatorRephormatImportQuery)
        ->setViewer($viewer)
        ->withIDs($ids)
        ->execute();
    }
}
