CREATE TABLE funcionario( 
      id number(10)    NOT NULL , 
      created_at timestamp(0)   , 
      deleted_at timestamp(0)   , 
      updated_at timestamp(0)   , 
      nome varchar  (100)   , 
      email varchar  (100)   , 
      senha varchar  (255)   , 
      cargo varchar  (50)   , 
      telefone varchar  (20)   , 
      user_id number(10)    NOT NULL , 
      imagem varchar(3000)   , 
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

 
 ALTER TABLE funcionario ADD UNIQUE (email);
  
 ALTER TABLE registro_ponto ADD CONSTRAINT funcionario_id FOREIGN KEY (id) references funcionario(id); 
 CREATE SEQUENCE funcionario_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER funcionario_id_seq_tr 

BEFORE INSERT ON funcionario FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT funcionario_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE registro_ponto_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER registro_ponto_id_seq_tr 

BEFORE INSERT ON registro_ponto FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT registro_ponto_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
 