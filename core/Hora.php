<?php

/**
 * Class Hora
 */
class Hora {
    /** @var string */
    private $aula;
    /** @var string */
    private $franja;
    /** @var  Asignatura */
    private $asignatura;

    /**
     * Contructor de Hora.
     * @param string $aula
     * @param string $franja
     * @param Asignatura $asignatura
     * @throws UnexpectedValueException
     */
    public function __construct($aula, $franja, $asignatura) {
        if(!($asignatura instanceof Asignatura)) {
            throw new UnexpectedValueException("$asignatura debe ser una instancia de Asignatura");
        }

        $this->aula = $aula;
        $this->franja = $franja;
        $this->asignatura = $asignatura;
    }

    /**
     * @return string
     */
    public function getAula() {
        return $this->aula;
    }

    /**
     * @return string
     */
    public function getFranja() {
        return $this->franja;
    }

    /**
     * @return Asignatura
     */
    public function getAsignatura() {
        return $this->asignatura;
    }
}