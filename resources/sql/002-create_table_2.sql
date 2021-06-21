create table {$NAMESPACE}_rephormat.rephormat_import_credentials_jira
(
    id int unsigned not null auto_increment primary key,
    phid varchar(64) not null,
    import int not null,
    url varchar(255) null,
    username varchar(255) null,
    password varchar(255) null
);

