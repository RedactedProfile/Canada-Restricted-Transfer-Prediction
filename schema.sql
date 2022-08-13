create table reference_table
(
  reference               int(10) not null
    primary key,
  date_purchased          date default '0000-00-00',
  date_transfer_requested date     not null,
  is_private              smallint(1) not null default 0,
  owner_proof             char(36) not null,
  owner_province          char(2)  not null default 'ON',
  owner_purchaser         varchar(255),
  date_created            datetime          default CURRENT_TIMESTAMP null,
  date_updated            datetime          default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
) comment 'reference table';
