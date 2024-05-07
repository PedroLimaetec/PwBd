<?php
    class Pessoa {
        private $id;
        private $nome;
        private $endereco;
        private $bairro;
        private $cep;
        private $cidade;
        private $estado;
        private $telefone;
        private $celular;
 
        public function getId() {
            return $this->id;
        }
 
        public function setId() {
            $this->id = $id;
        }
 
        public function getNome() {
            return $this->nome;
        }
 
        public function setNome() {
            $this->nome = $nome;
        }
 
        public function getEndereco() {
            return $this->endereco;
        }
 
        public function setEndereco() {
            $this->endereco = $endereco;
        }
 
        public function getBairro() {
            return $this->bairro;
        }
 
        public function setBairro() {
            $this->bairro = $bairro;
        }
 
        public function getCep() {
            return $this->cep;
        }
 
        public function setCep() {
            $this->cep = $cep;
        }
 
        public function getCidade() {
            return $this->cidade;
        }
 
        public function setCidade() {
            $this->cidade = $cidade;
        }
 
        public function getEstado() {
            return $this->estado;
        }
 
        public function setEstado() {
            $this->estado = $estado;
        }
 
        public function getTelefone() {
            return $this->telefone;
        }
 
        public function setTelefone() {
            $this->telefone = $telefone;
        }
 
        public function getCelular() {
            return $this->celular;
        }
        public function setCelular() {
            $this->celular = $celular;
        }
    }
?>