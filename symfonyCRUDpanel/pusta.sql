drop schema if exists rivers;
create schema rivers default character set utf8 collate utf8_polish_ci;
grant all on rivers.* to editor@localhost identified by 'secretPASSWORD';
flush privileges;