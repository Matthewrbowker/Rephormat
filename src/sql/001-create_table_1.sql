-- Change this line to change your namespace
SET @namespace = "phabricator";

-- Don't touch anything below this line!
SET @databasename = CONCAT(@namespace,"_rephormat");

SET @q1 = CONCAT("CREATE DATABASE ", @databasename, ";");

prepare stmt from @q1;
execute stmt;
DEALLOCATE PREPARE stmt;

set @q2 = CONCAT("CREATE TABLE ",@databasename, ".imports (",
    "id int unsigned not null auto_increment primary key,",
    "name varchar(255) COLLATE `binary` not null,",
    "unique key (name),",
    "phid varchar(64) binary not null,",
    "importType varchar(20) not null,"
    "authorPHID varchar(64) binary not null,",
    "dateCreated int unsigned not null,",
    "dateModified int unsigned not null",
")");

prepare stmt from @q2;
execute stmt;
DEALLOCATE PREPARE stmt;
