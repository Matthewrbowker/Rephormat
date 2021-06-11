<?php

final class PhabricatorRephormatSchemaSpec
    extends PhabricatorConfigSchemaSpec {

    public function buildSchemata() {
        $this->buildEdgeSchemata(new RephormatImport());
    }

}