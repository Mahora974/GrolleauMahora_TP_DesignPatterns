<?php

interface TicketInterface {
  public function update();
}

class Ticket implements TicketInterface {
  public function update()
  {
    echo "modifie le ticket";
  }
}


class JiraTicket implements TicketInterface {
  private $jira;

  public function __construct(Jira $jira) {
    $this->jira = $jira;
  }

  public function update() {
    // Logique d'adaptation
    $this->jira->edit();
  }
}


class Jira {
  function edit ( ) {
    echo "modifie le ticket Jira";
  }
}

$JiraApi = new Jira();
$ticket = new JiraTicket($JiraApi);
$ticket->update();

