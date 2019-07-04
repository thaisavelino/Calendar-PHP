<?php
namespace Calendar;

class Events {

    private $pdo; // cria o PDO para outras funcoes usarem

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo; //inicializa o PDO para outras funcoes usarem
    }

    /**
     * Récupère les évènements commençant entre 2 dates
     * * No caso estamos usando para pegar todos do mês que o usuário está
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetween (\DateTime $start, \DateTime $end): array {
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    /**
     * Récupère les évènements commençant entre 2 dates indexé par jour
     * * para mostrar do daquele dia
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetweenByDay (\DateTime $start, \DateTime $end): array {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    /**
     * Récupère un évènement
     * 
     * Usamos o modo fetch class, para ter mais coisas para ler, 
     * pois temos um array associativo.
     * Então começando recuperando o statement
     * definindo o modo do fetch, com iso temos a instancia do evento,  
     * Depois passamos ele para o $result e
     * faz o fetch como sempre "->fetch()" inclusive como estava antes,
     * porém agora tem o modo definido.
     * 
     * if previne caso tente acessar um id de evento inexistente
     * Envia uma mensagem ao invés de erro. isso será chamado no
     * try catch do "event.php"
     * 
     * @param int $id
     * @return Event
     * @throws \Exception
     */
    public function find (int $id): Event {
        // $result = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1")->fetch();
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result = $statement->fetch();
        if ($result === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $result;
    }

}
