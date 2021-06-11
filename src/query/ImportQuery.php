<?php


class ImportQuery extends PhabricatorCursorPagedPolicyAwareQuery
{
  private $ids;
  private $phids;
  private $active;

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

    public function withPHIDs($phids) {
        $this->phids = $phids;
        return $this;
    }

    public function withActive($active) {
        $this->active = $active;
        return $this;
    }

    protected function buildWhereClauseParts(AphrontDatabaseConnection $conn)
    {
      $where = parent::buildWhereClauseParts($conn);

      if ($this->ids !== null) {
          if(!is_array($this->ids)) {
              $this->ids = array($this->ids);
          }
        $where[] = qsprintf(
          $conn,
          'rephormat_import.id in (%Ls)',
          $this->ids);
      }

      if ($this->phids !== null) {
          if(!is_array($this->phids)) {
              $this->phids = array($this->phids);
          }
        $where[] = qsprintf(
          $conn,
          'rephormat_import.phid in (%Ls)',
          $this->phids);
      }

      if ($this->active !== null) {
        $where[] = qsprintf(
          $conn,
          'rephormat_import.active = %d',
          (int)$this->active);
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
