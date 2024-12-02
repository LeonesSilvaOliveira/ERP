PRAGMA foreign_keys=OFF; 

CREATE TABLE funcionario( 
      id  INTEGER    NOT NULL  , 
      created_at datetime   , 
      deleted_at datetime   , 
      updated_at datetime   , 
      nome varchar  (100)   , 
      email varchar  (100)   , 
      senha varchar  (255)   , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id int   NOT NULL  , 
      imagem text   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE registro_ponto( 
      id  INTEGER    NOT NULL  , 
      created_at datetime   NOT NULL  , 
      deleted_at datetime   , 
      updated_at datetime   , 
      data date   , 
      hora_entrada text   , 
      hora_volta_almoco text   , 
      hora_saida text   , 
      total_horas double   , 
      imagem text   , 
      user_id int   NOT NULL  , 
 PRIMARY KEY (id),
FOREIGN KEY(id) REFERENCES funcionario(id)) ; 

 
 CREATE UNIQUE INDEX unique_idx_funcionario_email ON funcionario(email);
 