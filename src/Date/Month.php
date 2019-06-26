<?php

namespace App\Date; 
/*** name space evita que alguém crie outra classe com o nome month em outra pasta e gere conflito..
 * Agora sempre que chamar essa classe tem de colocar o name space em tudo
 * ex.: new App\Date\Month
 * inclusive na Exception
 * veja new App\Date\Exeption("mensagem aqui");
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
     * obs.: Quando nao passa paramentro na chamada continua funcionando
     * pq por default month e year são =null e tem o ? pra dizer que sáo nulaveis
     * 
     * intval() método que converte valor em int, para evitar problemas futuros
     * date() metodo date() pega data e coloca no formato que definiu em ()
     */
    public function __construct(?int $month = null, ?int $year = null)
    {   
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        if ($month < 1 || $month > 12) {
            throw new App\Date\Exception("Mês $month não é válido");
        }
        if ($year < 1970) {
            throw new App\Date\Exception("Ano precisa ser superior a 1970");
        }

        // need thate this put on var mnth and year so the function toString() can see it.
        $this->month = $month; 
        $this->year = $year;
    }
    /**
     *  : string  - é o tipo de retorno
     *  Função retorna o mês escrito por extenso
     * 
     * @return string
     */
    public function toString(): string { 
        return $this->monthName[$this->month - 1] . ' ' . $this->year; //Mês 1 index 0, por isso faz menos 1
    }
}