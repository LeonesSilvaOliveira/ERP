SELECT setval('funcionarios_id_seq', coalesce(max(id),0) + 1, false) FROM funcionarios;
SELECT setval('registro_ponto_id_seq', coalesce(max(id),0) + 1, false) FROM registro_ponto;