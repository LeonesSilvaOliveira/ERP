SELECT setval('funcionario_id_seq', coalesce(max(id),0) + 1, false) FROM funcionario;
SELECT setval('registro_ponto_id_seq', coalesce(max(id),0) + 1, false) FROM registro_ponto;