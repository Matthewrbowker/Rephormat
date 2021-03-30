<?php


class PhabricatorRephormatImportQuery extends PhabricatorQuery
{
  private $ids;

    /**
     * PhabricatorRephormatImportQuery constructor.
     */
    public function __construct()
    {
    }

    public function withIDs($ids) {
      $this->ids = $ids;
      return $this;
    }

  public function execute()
  {

    if(isset($ids)) {

    }
    return array();
    // TODO: Implement execute() method.
  }
}
