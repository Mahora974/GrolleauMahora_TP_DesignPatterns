<?php


// TICKETS 

/**
 * Nouveau -> Pris en compte -> En cours de traitement -> A mettre en production -> en attente de cloture -> Cloturé
 * Annulé 
 */

class Ticket implements TicketState {
  private TicketState $state;

  public function __construct(TicketState $initialState)
  {
    $this->state = $initialState;
  }

  public function setState(TicketState $state) {
    $this->state = $state;
  }

  public function timeSpendOnState()
  {
    $this->state->timeSpendOnState();
  }

}

interface TicketState {
  public function timeSpendOnState();
}

class NewTicket implements TicketState {
  private $ticket;

  public function __construct(Ticket $ticket)
  {
    $this->ticket = $ticket;
  }


  public function timeSpendOnState()
  {
    echo 'Temps passé : 10 min';
  }

  public function takeAccount() {
    $state = new AccountForTicket($this->ticket);
    $this->ticket->setState($state);
  }

  public function workingOnIt() {
    $state = new WorkingOnItTicket($this->ticket);
    $this->ticket->setState($state);
  }

}

class AccountForTicket implements TicketState {
  private $ticket;

  public function __construct(Ticket $ticket)
  {
    $this->ticket = $ticket;
  }


  public function timeSpendOnState()
  {
    echo 'Temps passé : 10 min';
  }

  public function workingOnIt() {
    $state = new WorkingOnItTicket($this->ticket);
    $this->ticket->setState($state);
  }

}

class WorkingOnItTicket implements TicketState {
  private $ticket;

  public function __construct(Ticket $ticket)
  {
    $this->ticket = $ticket;
  }


  public function timeSpendOnState()
  {
    echo 'Temps passé : 10 min';
  }

}