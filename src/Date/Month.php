<?php

namespace App\Date; 
/*** name space evita que alguém crie outra classe com o nome month em outra pasta e gere conflito..
 * Agora sempre que chamar essa classe tem de colocar o name space em tudo
 * ex.: new App\Date\Month
 * inclusive na Exception
 * veja new App\Date\Exeption("mensagem aqui");
   */

class Month {
    public $weekDay = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'];
    
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
     * 
     * $month % 12 - então será sempre numero correto.
     */
    public function __construct(?int $month = null, ?int $year = null)
    {   
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        $month = $month % 12;
        

        // need thate this put on var mnth and year so the function toString() can see it.
        $this->month = $month; 
        $this->year = $year;
    }
    /**
     * getStartingDay()
     * Verifica em qual dia da semana o mês começa
     * Retorna o primeiro dia do mês
     * 
     * @return \DateTime
     */
    public function getStartingDay (): \DateTime {
        return new \DateTime("{$this->year}-{$this->month}-01"); //year-month-day

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
    /**
     * getWeeks()
     * retorna o número de semanas que o mês tem.
     * Isso ajudará a saber quantas linhas e colunas terá seu
     * calendário no HTML
     * 
     * ele verfica se é negativo para evitar problemas caso o primeiro dia de janeiro se misture ao ano anterior
     * 
     * trabalhamos com as funções do PHP DateTime() e format()
     * 
     * @return integer
     */
    public function getWeeks(): int {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day'); //clona a var start e aplica o modify pra conseguir achar o ultimo dia do mes
        //var_dump($start, $end);
        //var_dump($end->format('W'),$start->format('W'));
        $weeks = intval($end->format('W')-$start->format('W')) +1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }
}