<?php

/**
 * Class Asignatura
 */
class Asignatura {
    /** @var string|null */
    private $nombre;
    /** @var Hora[] */
    private $horas;

    /**
     * Constructor de Asignatura.
     * @param string|null $asignatura
     * @throws UnexpectedValueException
     */
    public function __construct($asignatura) {
        $data = json_decode(file_get_contents("https://wikilab.firebaseio.com/asignaturas.json"));

        if(empty($data->$asignatura) && !is_null($asignatura)) {
            throw new UnexpectedValueException("La asignatura $asignatura no existe");
        }

        $this->nombre = $asignatura;
        $this->horas = null;
    }

    /**
     * @return string|null
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @return Hora[]
     */
    public function getHoras() {
        if(is_null($this->horas)) {
            $data = json_decode(file_get_contents("https://wikilab.firebaseio.com/aulas.json"));

            $this->horas = array();
            foreach($data as $aula => $horas) {
                $aula = new Aula($aula);
                $horas = $aula->getHoras();
                foreach($horas as $hora) {
                    if($hora->getAsignatura()->getNombre() == $this->getNombre()) {
                        array_push($this->horas, $hora);
                    }
                }
            }
        }

        return $this->horas;
    }
}