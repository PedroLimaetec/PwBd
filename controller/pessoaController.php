<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/model/pessoa.php';
//indica onde este arquivo irá buscar as informações em outra pasta no arquivo pessoa.php

class PessoaController {
    private $pessoa;
    //cria a var pessoa

    public function __construct() {
        $this->pessoa = new Pessoa();
        //var pessoa se torna um objeto de Pessoa
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            /*instância a classe pessoa e chama sua função inserir para adicionar dados ao banco
            os ddos só serão inseridos se a var acao tiver valor igual a inserir, ela deve ser declarada
            na url para executar esta ação"*/
        }
    }

    public function inserir() {
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);
        /*seta as informações com o que foi escrito no index.php ou seja a var pessoa recebe todas essas 
        informações, importante lembrar que está função é diferente da função inserir da classe Pessoa
        apenas possume o mesmo nome mas tem lógicas diferentes*/

        $this->pessoa->inserir();
        /*passa as informações para a função inserir da classe Pessoa a função inserir da classe Pesoa
        é que de fato irá colocar as informações dentro do banco com sql*/
    }

    public function listar(){
        return $this->pessoa->listar();
        //chama a função listar para que as informações apareçam em consultar.php
    }

    public function atualizar(){
        
    }

    public function buscarporid($id){

    }
}

new PessoaController();
//instancia a classe PessoaController

?>