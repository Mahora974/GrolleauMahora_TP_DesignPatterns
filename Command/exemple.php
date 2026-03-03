<?php


class Button {
  private $command;

  public function __construct(Command $command)
  {
    $this->command = $command;
  }
}

interface Command{
  function execute();
}

class SendEmail implements Command {
  private $receiver;
  private $params;

  public function __construct(Mailer $receiver, array $params)
  {
    $this->receiver = $receiver;
    $this->params = $params;
  }

  public function execute()
  {
    $this->receiver->send($this->params);
  }
}

class Mailer {

  public function send($params) {
    foreach ($params as $param) {
      var_dump($param);
    }
  }

}

$command = new SendEmail(new Mailer(), ['test']);
$asking = new Button($command);