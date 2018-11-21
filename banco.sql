CREATE TABLE tbpessoa(
    pescodigo serial NOT NULL,
    pesnome varchar(100) NOT NULL,
    CONSTRAINT pk_tbpessoa PRIMARY KEY (pescodigo)
);

insert into tbpessoa (pesnome) values('Hugo');
insert into tbpessoa (pesnome) values('Diego');
insert into tbpessoa (pesnome) values('Ana');

select * from tbpessoa;

update tbpessoa set pesnome = 'Novo nome' where pescodigo = 'parametro';

delete from tbpessoa where pescodigo - 'parametro';
