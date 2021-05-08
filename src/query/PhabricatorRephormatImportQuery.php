<?php


class PhabricatorRephormatImportQuery extends PhabricatorCursorPagedPolicyAwareQuery
{
  private $ids;

    /**
     * PhabricatorRephormatImportQuery constructor.
     */
    public function __construct()
    {
    }

    public function newResultObject() {
      return new RephormatImport();
    }

    public function withIDs($ids) {
      $this->ids = $ids;
      return $this;
    }

    protected function buildWhereClauseParts(AphrontDatabaseConnection $conn)
    {
      $where = parent::buildWhereClauseParts($conn);

      if ($this->ids !== null) {
        $where[] = qsprintf(
          $conn,
          'import.ids in (%Ls)',
          join(",",$this->ids));
      }

      return $where;
    }

    public function getQueryApplicationClass() {
      return "PhabricatorRephormatApplication";

    }

  protected function loadPage()
  {
    $table = $this->newResultObject();
    $data = $this->loadStandardPageRows($table);
    return $table->loadAllFromArray($data);
  }
}
