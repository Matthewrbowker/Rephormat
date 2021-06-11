CREATE TABLE {$NAMESPACE}_rephormat.rephormat_import (
    id int unsigned not null auto_increment primary key
    name varchar(255) COLLATE `binary` not null,
    unique key (name),
    phid varchar(64) binary not null,
    importType varchar(20) not null,
    authorPHID varchar(64) binary not null,
    dateCreated int unsigned not null,
    dateModified int unsigned not null,
    active int unsigned not null default false
);
