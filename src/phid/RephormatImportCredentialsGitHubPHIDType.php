<?php


class RephormatImportCredentialsGitHubPHIDType extends PhabricatorPHIDType
{

    const TYPECONST = "RECG";

    public function getTypeName()
    {
        return "Rephormat Import GitHub Credentials";
    }

    /**
     * @inheritDoc
     */
    public function getPHIDTypeApplicationClass()
    {
        return "PhabricatorRephormatApplication";
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