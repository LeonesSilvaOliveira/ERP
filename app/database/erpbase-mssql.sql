CREATE TABLE funcionario( 
      id  INT IDENTITY    NOT NULL  , 
      created_at datetime2   , 
      deleted_at datetime2   , 
      updated_at datetime2   , 
      nome varchar  (100)   , 
      email varchar  (100)   , 
      senha varchar  (255)   , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id int   NOT NULL  , 
      imagem nvarchar(max)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE registro_ponto( 
      id  INT IDENTITY    NOT NULL  , 
      created_at datetime2   NOT NULL  , 
      deleted_at datetime2   , 
      updated_at datetime2   , 
      data date   , 
      hora_entrada time   , 
      hora_volta_almoco time   , 
      hora_saida time   , 
      total_horas float   , 
      imagem nvarchar(max)   , 
      user_id int   NOT NULL  , 
 PRIMARY KEY (id)) ; 

 
 ALTER TABLE funcionario ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionario(id); 
