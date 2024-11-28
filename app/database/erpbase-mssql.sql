CREATE TABLE funcionarios( 
      id  INT IDENTITY    NOT NULL  , 
      created_at datetime2   NOT NULL  , 
      deleted_at datetime2   , 
      updated_at datetime2   , 
      nome varchar  (100)   NOT NULL  , 
      email varchar  (100)   NOT NULL  , 
      senha varchar  (255)   NOT NULL  , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id int   NOT NULL  , 
      imagem nvarchar(max)   NOT NULL  , 
      horario_entrada datetime2   NOT NULL  , 
      horario_descanso datetime2   NOT NULL  , 
      horario_volta_descanso datetime2   NOT NULL  , 
      horario_saida datetime2   NOT NULL  , 
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

 
 ALTER TABLE funcionarios ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionarios(id); 
