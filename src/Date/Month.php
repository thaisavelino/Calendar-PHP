<?php

namespace App\Date; 
/*** name space evita que alguém crie outra classe com o nome month em outra pasta e gere conflito..
 * Agora sempre que chamar essa classe tem de colocar o name space
 * ex.: new App\Date\Month
   */

class Month {
    private $monthName = ['Janeiro', 'Fevereiro', 'Março', 'Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
    private $month;
    private $year;
    /**
     * Month Constructor
     *
     * @param integer $month os meses entre 1 e 12
     * @param integer $year o ano maior que 1970
     * @throws Exception 
     * obs.: when theres no parameteres the default is null
     */
    public function __construct(?int $month = null, ?int $year = null)
    {   
        if ($month < 1 || $month > 12) {
            throw new App\Date\Exception("Mês $month não é válido");
        }
        if ($year < 1970) {
            throw new App\Date\Exception("Ano precisa ser superior a 1970");
        }

        $this->month = $month;
        $this->year = $year;
    }
    public function toString(): string {
        return $this->monthName[$this->month - 1] . ' ' . $this->year; //Mês 1 index 0, por isso faz menos 1
    }
}