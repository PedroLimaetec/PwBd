<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/controller/conexao.php';
//indica onde este arquivo irá buscar informações em outra pasta no arquivo conexao.php

class Pessoa{
    private $id;
    private $nome;
    private $endereco;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $telefone;
    private $celular;
    private $conexao;
    //cria as variáveis para receber informações do usuário do arquivo index.php que apresenta uma tela de cadastro

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getCep() {
        return $this->cep;
    }
    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getCelular() {
        return $this->celular;
    }
    public function setCelular($celular) {
        $this->celular = $celular;
    }
    /*no geral eles todos os get e set servem para receber a informação correspondente 
    ex: getCelular e setCelular pegam a informação do celular e guardam na variável $celular*/


    public function __construct() {
        $this->conexao = new Conexao();
    }
    //intância a classe conexão

    public function inserir() {
        $sql = "INSERT INTO pessoa (`nome`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `celular`) VALUES (?,?,?,?,?,?,?,?)";
        //utiliza o comando INSERT do sql para inserir dados no banco de dados, mas deixa os valores vazios
        $stmt = $this->conexao->getConexao()->prepare($sql);
        //a partir de conexao que é um objeto de Conexao, ele usa a função getConexao e prepare para de fato inserir os dados
        $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);
        //nesta linha os valores são de fato inseridos
        return $stmt->execute();
        //retorna a execução dos comandos
    }

    public function listar() {
        $sql = "SELECT * FROM pessoa";
        //utiliza o comando SELECT para exibir as informações
        $stmt = $this->conexao->getConexao()->prepare($sql);
        //a partir de conexao que é um objeto de Conexao, ele usa a função getConexao e prepare para de fato exibir os dados
        $stmt->execute();
        //executa os comandos
        $result = $stmt->get_result();
        //recebe os resultados dos comandos, ou seja as informações do usuário
        $pessoas = [];
        while($pessoa = $result->fetch_assoc()) {
            $pessoas[] = $pessoa;
            //repete esse processo para pessoas diferentes e armazena em um vetor
        }
        return $pessoas;
        //retorna as informações das pessoas cadastradas
    }

    public function buscarporid($id){
        $sql = "SELECT * FROM pessoa WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->blind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizar($id){
        $sql = "UPDATE pessoa SET nome = ?, endereco = ?, bairro = ?, cep = ?, cidade = ?, estado = ?, telefone = ?, celular = ? WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssssssi', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);
        return $stmt->execute();
    }
}

?>