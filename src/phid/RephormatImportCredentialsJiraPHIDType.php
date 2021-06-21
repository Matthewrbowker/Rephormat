<?php


class RephormatImportCredentialsJiraPHIDType extends PhabricatorPHIDType
{

    const TYPECONST = "RECJ";

    public function getTypeName()
    {
        return "Rephormat Import Jira Credentials";
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