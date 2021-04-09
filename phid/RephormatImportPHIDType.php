<?php


class RephormatImportPHIDType extends PhabricatorPHIDType
{

  const TYPECONST = "REIM";

    public function getTypeName()
    {
        return pht("Rephormat Import");
    }

    /**
     * @inheritDoc
     */
    public function getPHIDTypeApplicationClass()
    {
        return 'PhabricatorRephormatApplication';
    }

    /**
     * @inheritDoc
     */
    protected function buildQueryForObjects(PhabricatorObjectQuery $query, array $phids)
    {
        // TODO: Implement buildQueryForObjects() method.
    }

    /**
     * @inheritDoc
     */
    public function loadHandles(PhabricatorHandleQuery $query, array $handles, array $objects)
    {
        // TODO: Implement loadHandles() method.
    }
}
