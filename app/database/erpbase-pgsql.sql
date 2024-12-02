CREATE TABLE funcionario( 
      id  SERIAL    NOT NULL  , 
      created_at timestamp   , 
      deleted_at timestamp   , 
      updated_at timestamp   , 
      nome varchar  (100)   , 
      email varchar  (100)   , 
      senha varchar  (255)   , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id integer   NOT NULL  , 
      imagem text   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE registro_ponto( 
      id  SERIAL    NOT NULL  , 
      created_at timestamp   NOT NULL  , 
      deleted_at timestamp   , 
      updated_at timestamp   , 
      data date   , 
      hora_entrada time   , 
      hora_volta_almoco time   , 
      hora_saida time   , 
      total_horas float   , 
      imagem text   , 
      user_id integer   NOT NULL  , 
 PRIMARY KEY (id)) ; 

 
 ALTER TABLE funcionario ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionario(id); 
 
 CREATE index idx_registro_ponto_id on registro_ponto(id); 
