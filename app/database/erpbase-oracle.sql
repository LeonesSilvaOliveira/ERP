CREATE TABLE funcionarios( 
      id number(10)    NOT NULL , 
      created_at timestamp(0)    NOT NULL , 
      deleted_at timestamp(0)   , 
      updated_at timestamp(0)   , 
      nome varchar  (100)    NOT NULL , 
      email varchar  (100)    NOT NULL , 
      senha varchar  (255)    NOT NULL , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id number(10)    NOT NULL , 
      imagem varchar(3000)    NOT NULL , 
      horario_entrada timestamp(0)    NOT NULL , 
      horario_descanso timestamp(0)    NOT NULL , 
      horario_volta_descanso timestamp(0)    NOT NULL , 
      horario_saida timestamp(0)    NOT NULL , 
 PRIMARY KEY (id)) ; 

CREATE TABLE registro_ponto( 
      id number(10)    NOT NULL , 
      created_at timestamp(0)    NOT NULL , 
      deleted_at timestamp(0)   , 
      updated_at timestamp(0)   , 
      data date   , 
      hora_entrada time   , 
      hora_volta_almoco time   , 
      hora_saida time   , 
      total_horas binary_double   , 
      imagem varchar(3000)   , 
      user_id number(10)    NOT NULL , 
 PRIMARY KEY (id)) ; 

 
 ALTER TABLE funcionarios ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionarios(id); 
 CREATE SEQUENCE funcionarios_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER funcionarios_id_seq_tr 

BEFORE INSERT ON funcionarios FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT funcionarios_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE registro_ponto_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER registro_ponto_id_seq_tr 

BEFORE INSERT ON registro_ponto FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT registro_ponto_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
 