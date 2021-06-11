<?php


abstract class PhabricatorRephormatDAO extends PhabricatorLiskDAO
{

    /**
     * @inheritDoc
     */
    public function getApplicationName()
    {
        return "rephormat";
    }
}