-- TBL UNIDADE MEDIDA;
create table tbl_unidade_medida(
	id int primary key auto_increment,
    nome varchar(40),
    abrev varchar(10) not null
);

alter table tbl_produto_acabado add id_unidade_medida int not null;
alter table tbl_produto_acabado add foreign key (id_unidade_medida) references tbl_unidade_medida(id);

INSERT INTO `db_oncreate`.`tbl_unidade_medida` (`nome`, `abrev`) VALUES ('Litros', 'lt');
INSERT INTO `db_oncreate`.`tbl_unidade_medida` (`nome`, `abrev`) VALUES ('Quilogramas', 'kg');
INSERT INTO `db_oncreate`.`tbl_unidade_medida` (`nome`, `abrev`) VALUES ('Mililitros', 'ml');

alter table tbl_corredor modify column nome varchar(10) not null;

drop table tbl_corredor;

alter table tbl_produto_acabado drop foreign key fk_tbl_produto_acabado_tbl_prateleira;
alter table tbl_materia_prima drop foreign key fk_tbl_materia_prima_tbl_prateleira;
alter table tbl_embalagem drop foreign key fk_tbl_embalagem_tbl_prateleira;

drop table tbl_prateleira;

create table tbl_corredor(
	id_corredor int primary key auto_increment,
    nome varchar(10) not null
);

create table tbl_prateleira(
	id int primary key auto_increment,
    numero int not null,
    id_corredor int not null,
    
    FOREIGN KEY (id_corredor) REFERENCES tbl_corredor(id_corredor)
);


ALTER TABLE tbl_produto_acabado ADD FOREIGN KEY (localizacao) REFERENCES tbl_prateleira(id);
ALTER TABLE tbl_materia_prima ADD FOREIGN KEY (localizacao) REFERENCES tbl_prateleira(id);
ALTER TABLE tbl_embalagem ADD FOREIGN KEY (localizacao) REFERENCES tbl_prateleira(id);

ALTER TABLE tbl_prateleira ADD CONSTRAINT tbl_prateleira_numero_unique UNIQUE (numero);

INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('1', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('2', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('3', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('4', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('5', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('6', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('7', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('8', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('9', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('10', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('11', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('12', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('13', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('14', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('15', '1');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('16', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('17', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('18', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('19', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('20', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('21', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('22', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('23', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('24', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('25', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('26', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('27', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('28', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('29', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('30', '2');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('31', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('32', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('33', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('34', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('35', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('36', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('37', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('38', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('39', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('40', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('41', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('42', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('43', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('44', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('45', '3');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('46', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('47', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('48', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('49', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('50', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('51', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('52', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('53', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('54', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('55', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('56', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('57', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('58', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('59', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('60', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('61', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('62', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('63', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('64', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('65', '4');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('66', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('67', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('68', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('69', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('70', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('71', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('72', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('73', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('74', '5');
INSERT INTO `db_oncreate`.`tbl_prateleira` (`numero`, `id_corredor`) VALUES ('75', '5');

create view vw_prateleira as
select pra.*, cor.nome as nome_corredor from tbl_prateleira as pra inner join tbl_corredor as cor on cor.id_corredor = pra.id_corredor;

alter table tbl_produto_acabado drop foreign key fk_tbl_produto_acabado_tbl_nutricional;
alter table tbl_produto_acabado drop column id_nutricional;
alter table tbl_produto_acabado add id_nutricional int;

alter table tbl_prateleira add usando tinyint(1) default 0;
alter table tbl_produto_acabado add quantidade_medida int not null;

drop table tbl_nutricional;

create table tbl_nutricional(
	id int primary key auto_increment,
    id_produto int not null,
    elemento varchar(100) not null,
    quantidade int not null,
    vd float(4,2)
);

alter table tbl_produto_acabado drop column unidade_medida;

-- ELIMAR - 01/05/2019;
alter table tbl_produto_acabado drop column id_nutricional;
alter table tbl_nutricional add foreign key (id_produto) references tbl_produto_acabado(id_produto_acabado);
alter table tbl_produto_acabado drop column nome;
alter table tbl_produto_acabado add column nome varchar(100) not null;
alter table tbl_produto_acabado drop column preco_fardo;
alter table tbl_produto_acabado add column img varchar(400) default "C:/xampp/htdocs/inf4m20191/tcc/cms/view/img/uploaded/default.png";

-- ELIMAR 04/05/2019;
alter table tbl_materia_prima drop column unidade_medida;
alter table tbl_materia_prima drop column foto;
alter table tbl_materia_prima drop column peso_bruto;
alter table tbl_materia_prima add column id_unidade_medida int not null;
alter table tbl_materia_prima add foreign key (id_unidade_medida) references tbl_unidade_medida(id);
-- VERIFICAR -> ID UNIDADE MEDIDA REFERENTE À 'KG'
INSERT INTO `db_oncreate`.`tbl_materia_prima` (`descricao`, `imposto`, `tempo_ressuprimento`, `intervalo_ressuprimento`, `localizacao`, `quantidade_estoque`, `id_unidade_medida`) VALUES ('Açucar', '0.01', '10', '3', '15', '2015', '3');
-- drop view vw_materia_prima;
create view vw_materia_prima as
select mp.*, um.nome as nome_unidade_medida, um.abrev as abrev_unidade_medida, pr.numero as numero_prateleira, co.nome as nome_corredor
from tbl_materia_prima as mp
inner join tbl_unidade_medida as um on um.id = mp.id_unidade_medida
inner join tbl_prateleira as pr on mp.localizacao = pr.id
inner join tbl_corredor as co on pr.id_corredor = co.id_corredor;

-- ELIMAR 09/05/2019;
alter table tbl_produto_acabado alter img set default "default.png";