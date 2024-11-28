PRAGMA foreign_keys=OFF; 

CREATE TABLE funcionarios( 
      id  INTEGER    NOT NULL  , 
      created_at datetime   NOT NULL  , 
      deleted_at datetime   , 
      updated_at datetime   , 
      nome varchar  (100)   NOT NULL  , 
      email varchar  (100)   NOT NULL  , 
      senha varchar  (255)   NOT NULL  , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id int   NOT NULL  , 
      imagem text   NOT NULL  , 
      horario_entrada datetime   NOT NULL  , 
      horario_descanso datetime   NOT NULL  , 
      horario_volta_descanso datetime   NOT NULL  , 
      horario_saida datetime   NOT NULL  , 
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
FOREIGN KEY(id) REFERENCES funcionarios(id)) ; 

 
 CREATE UNIQUE INDEX unique_idx_funcionarios_email ON funcionarios(email);
 