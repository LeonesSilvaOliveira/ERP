CREATE TABLE funcionarios( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `created_at` datetime   NOT NULL  , 
      `deleted_at` datetime   , 
      `updated_at` datetime   , 
      `nome` varchar  (100)   NOT NULL  , 
      `email` varchar  (100)   NOT NULL  , 
      `senha` varchar  (255)   NOT NULL  , 
      `cargo` varchar  (50)   , 
      `telefone` varchar  (20)   , 
      `user_id` int   NOT NULL  , 
      `imagem` text   NOT NULL  , 
      `horario_entrada` datetime   NOT NULL  , 
      `horario_descanso` datetime   NOT NULL  , 
      `horario_volta_descanso` datetime   NOT NULL  , 
      `horario_saida` datetime   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE registro_ponto( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `created_at` datetime   NOT NULL  , 
      `deleted_at` datetime   , 
      `updated_at` datetime   , 
      `data` date   , 
      `hora_entrada` time   , 
      `hora_volta_almoco` time   , 
      `hora_saida` time   , 
      `total_horas` double   , 
      `imagem` text   , 
      `user_id` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 
 ALTER TABLE funcionarios ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionarios(id); 
