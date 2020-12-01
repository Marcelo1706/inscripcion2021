SELECT grados.grado, grados.seccion, grados.turno, COUNT(datos_academicos.id) FROM datos_academicos INNER JOIN grados on datos_academicos.grado_matricular = grados.idGrado INNER JOIN proceso_inscripcion ON proceso_inscripcion.id = datos_academicos.idProceso WHERE grados.idGrado = 2 GROUP BY datos_academicos.grado_matricular

SELECT proceso_inscripcion.id, estudiantes_antiguo.*, grados.grado, grados.seccion, grados.turno FROM datos_academicos INNER JOIN grados on datos_academicos.grado_matricular = grados.idGrado INNER JOIN proceso_inscripcion ON proceso_inscripcion.id = datos_academicos.idProceso INNER JOIN estudiantes_antiguo ON estudiantes_antiguo.idEstudiante = proceso_inscripcion.idEstudiante WHERE grados.idGrado = 3 AND proceso_inscripcion.tipo = "antiguo" AND proceso_inscripcion.estado = 2

SELECT estudiantes_nuevo.nie, estudiantes_nuevo.pnombre, estudiantes_nuevo.snombre, estudiantes_nuevo.papellido, estudiantes_nuevo.sapellido, grados.grado, grados.seccion, informacion_estudiante.direccion, informacion_estudiante.fecha_nacimiento, aspectos_generales.hermano FROM datos_academicos INNER JOIN grados on datos_academicos.grado_matricular = grados.idGrado INNER JOIN proceso_inscripcion ON proceso_inscripcion.id = datos_academicos.idProceso INNER JOIN estudiantes_nuevo ON estudiantes_nuevo.idEstudiante = proceso_inscripcion.idEstudiante INNER JOIN datos_personales ON datos_personales.idProceso = proceso_inscripcion.id INNER JOIN informacion_estudiante ON informacion_estudiante.idProceso = proceso_inscripcion.id INNER JOIN aspectos_generales.idProceso = proceso_inscripcion.id WHERE proceso_inscripcion.tipo = "nuevo" AND proceso_inscripcion.estado = 2 AND datos_academicos.grado_matricular = 1