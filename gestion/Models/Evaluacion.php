<?php //namespace Models;
include_once 'Conexion.php';
	
	class Evaluacion{
        private $idevaluacion;
        private $idempleado;
        private $ev_fecha;
        private $ev_hora;
        private $ev_descripcion;
        private $idusuario;
        //fechas para el filtro
        private $fecha1;
        private $fecha2;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarEvaluacion(){               
            $con = new Conexion();
			$sql = "INSERT INTO evaluacion(idempleado, ev_fecha, ev_hora, ev_descripcion, idusuario) VALUES ({$this->idempleado}, '{$this->ev_fecha}', '{$this->ev_hora}', '{$this->ev_descripcion}', {$this->idusuario})";
            $sql1 = "SELECT LAST_INSERT_ID() as idevaluacion";
            $con->consultaSimple($sql);
            $datos = $con->consultaRetorno($sql1);
            return $datos;
        }
        
        public function updateEvaluacion(){                            
            $con = new Conexion();
			$sql = "UPDATE evaluacion SET idempleado = {$this->idempleado}, ev_fecha = '{$this->ev_fecha}', ev_hora = '{$this->ev_hora}', ev_descripcion = '{$this->ev_descripcion}', idusuario = '{$this->idusuario}' WHERE idevaluacion = {$this->idevaluacion}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarEvaluacion(){                            
            $con = new Conexion();
			$sql = "DELETE FROM evaluacion WHERE idevaluacion = {$this->idevaluacion}";
			$sql1 = "DELETE FROM eva_preg_resp WHERE idevaluacion = {$this->idevaluacion}";
			$con->consultaSimple($sql);
            $con->consultaSimple($sql1);
        }

        public function verEvaluaciones(){                            
            $con = new Conexion();
			$sql = "SELECT evaluacion.idevaluacion, evaluacion.ev_fecha, evaluacion.ev_hora, empleado.emp_apellido, empleado.emp_nombre , count(desap.puntuacion)  as 'Des', count(ap.puntuacion) as 'Ap'
                    FROM empleado, evaluacion, pregunta, eva_preg_resp
                    
                    left JOIN
                    (
                        SELECT eva_preg_resp.ideva_preg_resp
                        , case 
                        	WHEN eva_preg_resp.puntuacion >= 6  then 1
                        	else 0
                        	end as 'puntuacion'
                        FROM eva_preg_resp, evaluacion
                        WHERE eva_preg_resp.idevaluacion = evaluacion.idevaluacion
                        AND evaluacion.ev_fecha = '{$this->ev_fecha}'
                        AND eva_preg_resp.puntuacion < 6
                    ) AS desap on desap.ideva_preg_resp = eva_preg_resp.ideva_preg_resp
                    left JOIN 
                    (
                        SELECT eva_preg_resp.ideva_preg_resp
                        , case 
                        	WHEN eva_preg_resp.puntuacion >= 6  then 1
                        	else 0
                        	end as 'puntuacion'
                        
                        FROM eva_preg_resp, evaluacion
                        WHERE eva_preg_resp.idevaluacion = evaluacion.idevaluacion
                        AND evaluacion.ev_fecha = '{$this->ev_fecha}'
                        AND eva_preg_resp.puntuacion >= 6 
                    ) AS ap on ap.ideva_preg_resp = eva_preg_resp.ideva_preg_resp
                    
                    WHERE 
                    empleado.idempleado = evaluacion.idempleado 
                    AND evaluacion.idevaluacion = eva_preg_resp.idevaluacion 
                    AND eva_preg_resp.idpregunta = pregunta.idpregunta 
                    AND evaluacion.ev_fecha = '{$this->ev_fecha}' 
                    GROUP BY evaluacion.idevaluacion
                    ORDER BY evaluacion.idevaluacion";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function promedioEvaluacion(){                            
            $con = new Conexion();
			$sql = "SELECT empleado.emp_nombre, empleado.emp_apellido, eva_preg_resp.idpregunta, pregunta.preg_descripcion, eva_preg_resp.puntuacion, eva_preg_resp.idevaluacion, evaluacion.ev_fecha, evaluacion.ev_hora, evaluacion.idempleado,  evaluacion.idusuario, 
            ((SELECT SUM(eva_preg_resp.puntuacion) AS suma FROM eva_preg_resp WHERE eva_preg_resp.idevaluacion = {$this->idevaluacion})/(SELECT COUNT(eva_preg_resp.idpregunta) as cont FROM eva_preg_resp WHERE eva_preg_resp.puntuacion IS NOT NULL AND eva_preg_resp.idevaluacion = {$this->idevaluacion})) AS promedio_total,
            (SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion >= 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion}) AS pbien,
            (SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion < 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion}) AS pmal,
            (SELECT COUNT(pregunta.idpregunta) FROM pregunta WHERE pregunta.idpregunta) AS total,
            (SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion IS NOT NULL AND eva_preg_resp.idevaluacion = {$this->idevaluacion}) AS evaluadas
            FROM evaluacion
            INNER JOIN eva_preg_resp ON evaluacion.idevaluacion = eva_preg_resp.idevaluacion
            INNER JOIN pregunta ON eva_preg_resp.idpregunta = pregunta.idpregunta
            INNER JOIN empleado ON evaluacion.idempleado = empleado.idempleado
                                
            WHERE evaluacion.idevaluacion = {$this->idevaluacion} GROUP BY pregunta.idpregunta ORDER BY pregunta.idpregunta";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function verPuntuacionPregunta(){                            
            $con = new Conexion();
            $sql = "SELECT pregunta.preg_descripcion, eva_preg_resp.puntuacion FROM pregunta, eva_preg_resp, evaluacion WHERE evaluacion.idevaluacion = eva_preg_resp.idevaluacion AND eva_preg_resp.idpregunta = pregunta.idpregunta AND evaluacion.idevaluacion = {$this->idevaluacion}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function porcentajeEvaluacion(){                            
            $con = new Conexion();
            $sql = "SELECT COUNT(eva_preg_resp.puntuacion) AS respuestas, (SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion >= 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion}) AS aprobadas, (SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion < 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion}) AS desaprobadas, ((SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion >= 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion})/(SELECT COUNT(eva_preg_resp.idpregunta) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion IS NOT NULL AND eva_preg_resp.idevaluacion = {$this->idevaluacion})) AS porcentaje_ap, ((SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion < 6 AND eva_preg_resp.idevaluacion = {$this->idevaluacion})/(SELECT COUNT(eva_preg_resp.idpregunta) FROM eva_preg_resp WHERE eva_preg_resp.puntuacion IS NOT NULL AND eva_preg_resp.idevaluacion = {$this->idevaluacion})) AS porcentaje_desap FROM pregunta, evaluacion, eva_preg_resp WHERE pregunta.idpregunta = eva_preg_resp.idpregunta AND evaluacion.idevaluacion = eva_preg_resp.idevaluacion AND evaluacion.idevaluacion = {$this->idevaluacion}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        public function promedioPorFechas(){                            
            $con = new Conexion();
			$sql = "CREATE OR REPLACE VIEW promedio_fechas_evaluacion AS SELECT evaluacion.ev_fecha, empleado.idempleado, empleado.emp_apellido, empleado.emp_nombre, evaluacion.idevaluacion, eva_preg_resp.idpregunta, pregunta.preg_descripcion, eva_preg_resp.puntuacion,
            (ROUND((SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion WHERE eva_preg_resp.puntuacion < 6 AND eva_preg_resp.idevaluacion = evaluacion.idevaluacion AND evaluacion.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}')/(SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion WHERE eva_preg_resp.idevaluacion = evaluacion.idevaluacion AND evaluacion.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}'),2))*100 AS desap,
            (ROUND((SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion WHERE eva_preg_resp.puntuacion >= 6 AND eva_preg_resp.idevaluacion = evaluacion.idevaluacion AND evaluacion.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}')/(SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion WHERE eva_preg_resp.idevaluacion = evaluacion.idevaluacion AND evaluacion.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}'),2))*100 AS ap,
            (SELECT COUNT(pregunta.idpregunta) FROM pregunta) AS total_preguntas,
            (SELECT COUNT(eva_preg_resp.idpregunta) FROM eva_preg_resp, evaluacion WHERE eva_preg_resp.puntuacion IS NOT NULL AND eva_preg_resp.idevaluacion = evaluacion.idevaluacion AND evaluacion.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}') AS preguntas_evaluadas,
            ((SELECT SUM(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion, pregunta, empleado WHERE empleado.idempleado = evaluacion.idempleado AND evaluacion.idevaluacion = eva_preg_resp.idevaluacion AND eva_preg_resp.idpregunta = pregunta.idpregunta AND empleado.idempleado = {$this->idempleado} AND evaluacion.ev_fecha >= '{$this->fecha1}' AND evaluacion.ev_fecha <= '{$this->fecha2}')/(SELECT COUNT(eva_preg_resp.puntuacion) FROM eva_preg_resp, evaluacion, pregunta, empleado WHERE empleado.idempleado = evaluacion.idempleado AND evaluacion.idevaluacion = eva_preg_resp.idevaluacion AND eva_preg_resp.idpregunta = pregunta.idpregunta AND empleado.idempleado = {$this->idempleado} AND evaluacion.ev_fecha >= '{$this->fecha1}' AND evaluacion.ev_fecha <= '{$this->fecha2}')) AS promedio_total
            FROM empleado
            INNER JOIN evaluacion ON empleado.idempleado = evaluacion.idempleado
            INNER JOIN eva_preg_resp ON evaluacion.idevaluacion = eva_preg_resp.idevaluacion
            INNER JOIN pregunta ON pregunta.idpregunta = eva_preg_resp.idpregunta
            
            WHERE empleado.idempleado = {$this->idempleado} AND evaluacion.ev_fecha <= '{$this->fecha2}' AND evaluacion.ev_fecha >= '{$this->fecha1}' ORDER BY evaluacion.idevaluacion, pregunta.idpregunta ASC";
            $con->consultaSimple($sql);
            $sql1 = "SELECT emp_apellido, emp_nombre, idpregunta, preg_descripcion, SUM(promedio_fechas_evaluacion.puntuacion) AS suma, (ROUND(CAST(SUM(promedio_fechas_evaluacion.puntuacion)AS DECIMAL)/COUNT(promedio_fechas_evaluacion.idpregunta),2)) AS promedio, ap, desap, total_preguntas, promedio_total, (SELECT COUNT(promedio_fechas_evaluacion.ev_fecha)) AS cant_evaluaciones FROM promedio_fechas_evaluacion GROUP BY promedio_fechas_evaluacion.idpregunta";
            $datos = $con->consultaRetorno($sql1);
            return $datos;
        }
	}
?>