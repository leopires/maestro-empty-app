<?php

namespace carcollection\models\map;

/**
 * Classe de mapeamento da entidade Member.
 * Class BrandMap
 * @package carcollection\models\map
 */
class MemberMap extends \MBusinessModel {


    /**
     * Este método é responsável por fornecer as informações para a camada de persistência.
     * @return array
     */
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'db_car_collection', // Banco de Dados. Ver: helloworld/modules/carcollection/conf/conf.php
            'table' => 'Members',
            // Mapeamento dos atributos da classe para colunas no banco de dados.
            'attributes' => array(
                'idMember' => array('column' => 'idMember', 'key' => 'primary', 'idgenerator' => 'identity', 'type' => 'integer'),
                'firstName' => array('column' => 'firstName', 'type' => 'string'),
                'lastName' => array('column' => 'lastName', 'type' => 'string'),
                'email' => array('column' => 'email', 'type' => 'string'),
                'city' => array('column' => 'city', 'type' => 'string'),
                'state' => array('column' => 'state', 'type' => 'string')
            ),
            // Mapeamento das associações. Um Membro do clube pode possuir (estar associado à) vários carros.
            'associations' => array(
                // O atributo de identificador único da tabela Cars está como idCard devido a um erro de digitação e foi gerado no banco de dados assim.
                'cars' => array('toClass' => 'carcollection\models\Car', 'cardinality' => 'oneToMany', 'keys' => 'idCard:idCard'),
            )
        );
    }

    // Atributos da classe de modelo. Geralmente, tem relação com colunas no banco de dados.
    // São do tipo PROTECTED pois a classe Member (member.php) que herda dessa classe, precisa ter acesso à estes atributos.

    protected $idMember;

    protected $firstName;

    protected $lastName;

    protected $email;

    protected $city;

    protected $state;

    // Associações

    /**
     * Guarda uma lista/coleção de objetos do tipo Car.
     * Esta lista diz respeito aos carros de determinado Membro.
     * @var array Lista de Carros.
     */
    protected $cars;

    // Setters e Getters dos atributos da classe.
    // Regra básica de encapsulamento.

    /**
     * Retorna o identificador único (chave primária) do Membro.
     * @return integer Identificador único do Membro.
     */
    public function getIdMember()
    {
        return $this->idMember;
    }

    /**
     * Seta um valor para o identificado único do Membro.
     * @param integer $idMember Identificador único.
     */
    public function setIdMember($idMember)
    {
        $this->idMember = $idMember;
    }

    /**
     * Recupera o primeiro nome do Membro.
     * @return string Primeiro nome do Membro.
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Seta um valor para o primeiro nome do Membro.
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


    public function getCars() {
        if (is_null($this->cars)) {
            $this->getAssociationCars();
        }
        return $this->cars;
    }

    public function setCars($value) {
        $this->cars = $value;
    }

    public function getAssociationCars() {
        $this->retrieveAssociation("cars");
    }

}

?>