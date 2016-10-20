<?php

use \carcollection\models\Member as Member;

class MemberController extends \MController {

    const MODULE_MAIN = ">carcollection/main";
    const ACTION_FORM_FIND = ">carcollection/member/formFind";
    const ACTION_SAVE = "@carcollection/member/save/";

    /**
     * Action URL: helloworld/carcollection/member/main
     * Redireciona para a action formFind.
     */
    public function main() {
        // Redireciona para a action formFind.
        $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
    }

    /**
     *
     */
    public function formFind() {

        try {
            $firstName = trim($this->data->txtFirstName);
            $email = trim($this->data->txtEMail);
            $this->data->members = Member::create()->listByFirstNameOrEMailOrderByFirstNameAsc($firstName, $email)->asQuery();
            $this->render();
        }catch (Exception $ex) {

        }
    }

    public function formNew() {
        $this->data->actionSave = self::ACTION_SAVE;
        $this->render();
    }

    /**
     * Salva os dados do Membro. A execução desta action pode acontecer de duas maneiras diferentes:
     * - Inclusão: quando o $this->data->id for nulo ou inválido o método Member::create irá retornar um objeto Member não persistente.
     * Seria o mesmo que invocar: new Member();
     * - Alteração: quando o $this->data->id for de um objeto existente no banco de dados, o Member::create retornará uma instância de Member.
     */
    public function save() {
        // Uma vez que operação lida com Banco de Dados, é importante colocá-la dentro de um bloco try/catch.
        try {
            // Cria ou tenta recuperar uma instância de Member.
            $member = Member::create($this->data->id);
            // Preenche o objeto com os dados vindos do $this->data.
            $member->setData($this->data->member);
            // Solicita que os dados sejam persistidos.
            $member->save();
            // Informa ao usu[ario que a operação ocorreu com sucesso.
            // Os parâmetros do renderPrompt são:
            // 1 - Tipo da mensagem: dependendo do tipo, as cores e até mesmo o ícone da box renderizada mudam.
            // 2 - Mensagem a ser exibida na box.
            // 3 - Ação a ser executada ao clicar no botão. Esse ação é o caminho para uma action.
            $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Member '{$member->getDescription()}' saved with success!", self::ACTION_FORM_FIND);
        } catch (EDataValidationException $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, $ex->getMessage(), self::ACTION_FORM_FIND);
        } catch (Exception $ex) {
            // Informa ao usuário que ocorreu um erro ao salvar os dados.
            // Obs. Não é uma boa prática exibir mensagens de erro com conteúdo técnico para o usuário.
            // -- O usuário não vai entender o que está acontecendo.
            // -- Mensagens técnicas podem expor falhas no sistema que a serem exploradas por um eventual atacante.
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to save the Member data.", self::ACTION_FORM_FIND);
        }
    }
}

?>