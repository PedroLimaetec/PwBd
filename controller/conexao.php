<?php

    class Conexao {
    //cria a classe Conexao
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "exemplo_aula_pw";
        private $conexao;
        //cria as variáveis para armazenar informações da conecxão com o banco de dados como o host por exemplo

        public function __construct() {
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
            //atualiza as variáveis com informações da conexão ao banco de dados

            if ($this->conexao->connect_error) {
                die("Falha na conexão: " . $this->conexao->connect_error);
                //caso exista algum erro durante a conexão será exibido uma mensagem de erro
            }
        }
        
        public function getConexao() {
            return $this->conexao;
            //essa função retorna a conexão
        }

    }
?>