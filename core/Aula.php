<?php

/**
 * Class Aula
 */
class Aula {
    /** @var int */
    private $id;
    /** @var Hora[] */
    private $horas;
    /**
     * Constructor de Aula.
     * @param string $aula
     * @throws UnexpectedValueException
     */
    public function __construct($aula) {
        $data = json_decode(file_get_contents("https://wikilab.firebaseio.com/aulas.json"));

        if(empty($data->$aula)) {
            throw new UnexpectedValueException("El aula no existe");
        }

        $this->id = intval($aula);
        $this->horas = null;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Hora[]
     */
    public function getHoras() {
        if(is_null($this->horas)) {
            $data = json_decode(file_get_contents("https://wikilab.firebaseio.com/aulas.json"));

            $aula = $this->id;
            $this->horas = array();
            foreach($data->$aula->horas as $hora) {
                $asig = isset($hora->asignatura) ? $hora->asignatura : null;
                array_push($this->horas, new Hora($this->id, $hora->franja, new Asignatura($asig)));
            }
        }

        return $this->horas;
    }
}
