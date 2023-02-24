<?php # Classe raiz do websocket
namespace WebSockets;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
date_default_timezone_set('America/Sao_Paulo'); # Horário de SP

class Socket implements MessageComponentInterface {
    public function __construct(){
        $this->clients = new \SplObjectStorage;
        $this->setLog("Servidor iniciado!");
    }

    protected function setLog($log){ # Salva um Log de tudo o que acontece e exibe no console
        echo date("Y-m-d H:i:s")." ".$log."\n";
        fwrite(fopen("logs.log", 'a'), date("Y-m-d H:i:s")." ".$log."\n");
    }

    protected function conAtivas(){ # Retorna a quantidade de conexões ativas;
        return "Conexões ativas: ".count($this->clients);
    }

    protected function getUserOnline($UsrID){
        $ret = false;
        foreach($this->clients as $client){
            if($UsrID == $client->resourceId) $ret = true;
        }
        return $ret;
    }

    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn); # Adiciona o Objeto
        $this->setLog("Nova conexão no Servidor! ({$conn->resourceId})");
        $this->setLog($this->conAtivas());        
        # Envia mensagem de boas vindas + o comando /help
        $conn->send(
            json_encode(
                array(
                    'from'=>"Servidor",
                    'nick'=>"@Usuário{$conn->resourceId}",
                    'msg'=>"Bem vindo Usuário {$conn->resourceId}!<br> use /help para ajuda."
                )
            )
        );
        /* Caso precise implementar algo relacionado a Status do usuário, será necessário atualizar os demais usuários sobre a conexão que foi iniciada
        foreach($this->clients as $client){
            if($conn->resourceId == $client->resourceId) continue;
            $this->setLog("A Conexão {$client->resourceId} recebeu o alerta de online de {$conn->resourceId}");
            $client->send(json_encode(array('from'=>'Servidor','msg'=>"O usuário {$conn->resourceId} está online!")));
        } */
    }

    public function onMessage(ConnectionInterface $from, $msg){
        if($msg=="/help"){ # Listando os comandos para o usuário
            $from->send(json_encode(array('from'=>"Servidor",'msg'=>("Segue lista de comandos<br><br>/help = Lista os comandos<br>/online = Total de usuários<br>/users = Lista das IDs dos usuários<br>[ID user] + MSG = Enviar mensagem privada"))));
        }elseif($msg=="/online"){ # Caso o comando for enviado, o server responde a quantidade apenas para o $from
            $from->send(json_encode(array('from'=>"Servidor",'msg'=>count($this->clients)." usuários online!")));
        }elseif($msg=="/users"){ # Caso o comando for enviado para listar os usuários online
            $String = "IDs dos usuários online";
            foreach($this->clients as $client){
                $String .= ($String!=""?"<br>":"").$client->resourceId.($from->resourceId == $client->resourceId?" (você)":"");
            }
            $from->send(json_encode(array('from'=>"Servidor",'msg'=>$String)));
        }else{ # Caso seja uma mensagem para entregas aos demais conectados (ou um usuário específico)
            $privateID = false;
            if(preg_match("/\[([0-9]\d*)\]/",$msg,$arrResult)) $privateID = $arrResult[1]; # Caso seja uma mensagem privada
            $this->setLog("Mensagem de {$from->resourceId} Msg: '$msg'".($privateID?" para {$privateID}".(!$this->getUserOnline($privateID)?" (offline)":""):""));
            if($privateID){ # Caso seja uma mensagem privada
                $UsrIsOnline = $this->getUserOnline($privateID); # Se o usuário está online
                foreach($this->clients as $client){
                    if($UsrIsOnline){
                        if($from->resourceId == $client->resourceId) continue; # Não precisa enviar ao usuário que mandou a msg
                        if($privateID==$client->resourceId){
                            $this->setLog("A Conexão {$client->resourceId} recebeu a mensagem de {$from->resourceId}");
                            $client->send(json_encode(array('from'=>'Usuário'.$from->resourceId,'msg'=>"(msg privada)<br>".trim(str_replace($arrResult[0],"",$msg)))));
                        }
                    }else{
                        if($from->resourceId != $client->resourceId) continue; # Não precisa enviar aos demais usuários
                        if($from->resourceId == $client->resourceId){
                            $client->send(json_encode(array('from'=>'Servidor','msg'=>"Que pena, o usuário $privateID não está conectado!")));
                        }
                    }
                }
            }else{ # Mensagem para todos
                foreach($this->clients as $client){
                    if($from->resourceId == $client->resourceId) continue; # Não precisa enviar ao usuário que mandou a msg
                    $this->setLog("A Conexão {$client->resourceId} recebeu a mensagem de {$from->resourceId}");
                    $client->send(json_encode(array('from'=>'Usuário'.$from->resourceId,'msg'=>$msg)));
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        $this->setLog("Conexão encerrada ({$conn->resourceId})");
        $this->setLog($this->conAtivas());
        /* Caso precise implementar algo relacionado a Status do usuário, será necessário atualizar os demais usuários sobre a conexão que foi encerrada
        foreach($this->clients as $client){
            if($conn->resourceId == $client->resourceId) continue;
            $this->setLog("A Conexão {$client->resourceId} recebeu o alerta de desconectado de {$conn->resourceId}");
            $client->send(json_encode(array('from'=>'Servidor','msg'=>"O usuário {$conn->resourceId} saiu!")));
        } */
    }

    public function onError(ConnectionInterface $conn, \Exception $e){
        $this->setLog("Erro na conexão ID ({$conn->resourceId})");
    }
}