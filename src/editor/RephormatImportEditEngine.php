<?php


class RephormatImportEditEngine extends PhabricatorEditEngine
{

    const ENGINECONST = "report.import";

    public function getEngineApplicationClass()
    {
        return "PhabricatorRephormatApplication";
    }

    protected function buildCustomEditFields($object)
    {
        // TODO: Implement buildCustomEditFields() method.
    }

    /**
     * @inheritDoc
     */
    public function getEngineName()
    {
        return "Rephormat Import";
    }

    /**
     * @inheritDoc
     */
    protected function getObjectCreateTitleText($object)
    {
        return "Begin Import";
    }

    /**
     * @inheritDoc
     */
    protected function getObjectEditTitleText($object)
    {
        // TODO: Implement getObjectEditTitleText() method.
    }

    /**
     * @inheritDoc
     */
    protected function getObjectCreateShortText()
    {
        // TODO: Implement getObjectCreateShortText() method.
    }

    /**
     * @inheritDoc
     */
    protected function getObjectName()
    {
        // TODO: Implement getObjectName() method.
    }

    /**
     * @inheritDoc
     */
    protected function getObjectEditShortText($object)
    {
        // TODO: Implement getObjectEditShortText() method.
    }

    /**
     * @inheritDoc
     */
    public function getSummaryHeader()
    {
        // TODO: Implement getSummaryHeader() method.
    }

    /**
     * @inheritDoc
     */
    public function getSummaryText()
    {
        // TODO: Implement getSummaryText() method.
    }

    /**
     * @inheritDoc
     */
    protected function getObjectViewURI($object)
    {
        // TODO: Implement getObjectViewURI() method.
    }

    /**
     * @inheritDoc
     */
    protected function newEditableObject()
    {
        // TODO: Implement newEditableObject() method.
    }

    /**
     * @inheritDoc
     */
    protected function newObjectQuery()
    {
        // TODO: Implement newObjectQuery() method.
    }
}