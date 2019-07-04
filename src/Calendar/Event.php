<?php
namespace Calendar;
/**
 * Classe Evento com tudo que temos na base de dados
 * 
 * BOA PRÁTICA: colocamos tudo em privado e pegamos com getters()
 * A vantagem é que pode definir o tipo para precisar o tipo de retorno
 *  
 */
class Event {

    private $id;

    private $name;

    private $description;

    private $start; //data

    private $end; //data

    public function getId(): int {
        return $this->id;
    }

    public function getName (): string {
        return $this->name;
    }

    public function getDescription (): string {
        return $this->description ?? '';
        /**
         * Envia a descrição ou o nulo se estiver null.. isso evita erro
         * Tb poderia ter colocado ?string no retorno, era o mesmo (acho)
         * Mas assim é mais estruturado pois é array vazio (acho rsrs)
         */
    }

    public function getStart (): \DateTime { // DateTime tem \ pois está no namespace calendar
        return new \DateTime($this->start);
    }

    public function getEnd (): \DateTime { // DateTime tem \ pois está no namespace calendar
        return new \DateTime($this->end);
    }

}