<?php

/**
 * Class Alumno
 */
class Alumno {
    /** @var string */
    private $nombre;
    /** @var Asignatura[] */
    private $asignaturas;

    /**
     * Constructor de Alumno.
     * @param string $nombre
     * @throws UnexpectedValueException
     */
    public function __construct($nombre) {
        $alumnos = json_decode(file_get_contents("https://wikilab.firebaseio.com/alumnos.json"));

        $existe = false;
        foreach($alumnos as $alumno) {
            if ($alumno->nombre == $nombre) {
                $existe = true;

                //evitar cuando se haga una buena implementación:
                break;
            }
        }

        if(!$existe) {
            throw new UnexpectedValueException("El alumno no existe");
        }

        $this->nombre = $nombre;
        $this->asignaturas = null;
    }

    /**
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @return Asignatura[]
     */
    public function getAsignaturas() {
        if(is_null($this->asignaturas)) {
            $data = json_decode(file_get_contents("https://wikilab.firebaseio.com/asignaturas.json"));

            $this->asignaturas = array();
            foreach($data as $asignatura => $suscritos) {
                foreach($suscritos as $suscrito) {
                    if($suscrito == $this->nombre) {
                        array_push($this->asignaturas, new Asignatura($asignatura));
                    }
                }
            }
        }

        return $this->asignaturas;
    }
}