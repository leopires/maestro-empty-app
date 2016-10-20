<?php

namespace carcollection\models;

/**
 * Classe de modelo que representa os objetos de domínio do tipo Member.
 * Class Member
 * @package carcollection\models
 */
class Member extends map\MemberMap {

    public static function config() {
        return array(
            'log' => array(),
            'validators' => array(
                'firstName' => array('notnull', 'notblank'),
                'lastName' => array('notnull', 'notblank'),
                'email' => array('notnull', 'notblank'),
            ),
            'converters' => array()
        );
    }

    /**
     * Método usado para descrever a instância do objeto.
     * No contexto de Membro, esta descrição será o primeiro e o último nome do Membro concatenados.
     * @return string Descrição do Membro. Nome completo.
     */
    public function getDescription() {
        return $this->getFirstName() . " " . $this->getLastName();

    }

    /**
     * Permite buscar os membros do clube através do primeiro nome e/ou e-mail.
     * O resultado dessa busca é ordenado pelo primeiro nome do membro.
     * @param string $firstName Primeiro nome do membro a ser encontrado.
     * @param string $email E-Mail do membro a ser encontrado.
     * @return \RetrieveCriteria Objeto RetrieveCriteria com os critérios da pesquisa.
     */
    public function listByFirstNameOrEMailOrderByFirstNameAsc($firstName = "", $email = "") {

        // A ordem de preenchimento do objeto RetrieveCriteria não importa.

        // Cria a instância do objeto RetrieveCriteria e configura a ordenação.
        $criteria = $this->getCriteria()->orderBy("firstName");
        // Verifica se o parâmetro firstName foi informado.
        if($firstName) {
            // A pesquisa pelo pode ser feita informando parte do primeiro nome.
            $criteria->where("firstName like '{$firstName}%'");
        }
        // Verifica se o parâmetro email foi informado.
        if($email) {
            $criteria->where("email = '{$email}'");
        }
        return $criteria;
    }
}

?>