<?php

use \carcollection\models\Member as Member;

class MemberController extends \MController {

    const MODULE_MAIN = ">carcollection/main";
    const ACTION_FORM_FIND = ">carcollection/member/formFind";
    const ACTION_SAVE = "@carcollection/member/save/";
    const ACTION_DELETE = "@carcollection/member/delete/";
    const ACTION_OBJECT = ">carcollection/member/formObject/";

    /**
     * Action URL: helloworld/carcollection/member/main
     */
    public function main() {
        // Redireciona para a action formFind.
        $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
    }

    /**
     * Exibe o formulário de listagem e pesquisa de Membros.
     * Action URL: helloworld/carcollection/member/formFind
     */
    public function formFind() {
        try {
            $firstName = trim($this->data->txtFirstName);
            $email = trim($this->data->txtEMail);
            $this->data->members = Member::create()->listByFirstNameOrEMailOrderByFirstNameAsc($firstName, $email)->asQuery();
            // Carrega: views/member/formFind.xml
            $this->render();
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to list the Members.", self::MODULE_MAIN);
        }
    }

    /**
     * Exibe o formulário de cadastro de novos Membros.
     * Action URL: helloworld/carcollection/member/formNew
     */
    public function formNew() {
        $this->data->actionSave = self::ACTION_SAVE;
        // Carrega? views/member/formnew.xml
        $this->render();
    }

    /**
     * Exibe as ações que podem ser tomadas com determinada instância do objeto Membro.
     * As ações são: Edit e Delete.
     */
    public function formObject() {
        try {
            $member = Member::create($this->data->id);
            if (!$member->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $this->data->member = $member->getData();
                // Carrega: views/member/formObject.xml
                $this->render();
            }
        } catch (\Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to load Member data.", self::ACTION_FORM_FIND);
        }
    }

    /**
     * Exibe o formulário para alteração dos dados cadastrados.
     */
    public function formUpdate() {
        try {
            $member = Member::create($this->data->id);
            if (!$member->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $this->data->member = $member->getData();
                $this->data->actionSave = self::ACTION_SAVE . $member->getIdMember();
                // Carrega: views/member/formUpdate.xml
                $this->render();
            }
        } catch (\Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to load Member data.", self::ACTION_FORM_FIND);
        }
    }

    /**
     * Solicita a confirmação do usuário do sistema quanto à exclusão do Membro.
     */
    public function formDelete() {
        $member = null;
        try {
            $member = Member::create($this->data->id);
            if (!$member->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                // Monta as actions para realizar a exclusão ou cancelar a operação.
                $yesAction = self::ACTION_DELETE . $member->getIdMember();
                $noAction = self::ACTION_OBJECT . $member->getIdMember();
                // Solicita a confirmação do usuário.
                $this->renderPrompt(MPrompt::MSG_TYPE_CONFIRMATION,
                    "Are you sure about to delete the Member: {$member->getDescription()}?",
                    $yesAction, $noAction);
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to retrieve Member data.", self::ACTION_FORM_FIND);
        }
    }

    public function delete() {
        $member = null;
        try {
            $member = Member::create($this->data->id);
            if (!$member->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $member->delete();
                $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Member deleted with success!", self::ACTION_FORM_FIND);
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "Cannot delete Member due to an error.", self::ACTION_FORM_FIND);
        }
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
            // Informa ao usuário que a operação ocorreu com sucesso.
            // Os parâmetros do renderPrompt são:
            // 1 - Tipo da mensagem: dependendo do tipo, as cores e até mesmo o ícone da box renderizada mudam.
            // 2 - Mensagem a ser exibida na box.
            // 3 - Ação a ser executada ao clicar no botão. Esse ação é o caminho para uma action.
            $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Member '{$member->getDescription()}' saved with success!", self::ACTION_FORM_FIND);
        } catch (EDataValidationException $ex) {
            // Quando alguma das validações do model falha. Ver: Member.php, método public static function config().
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, $ex->getMessage(), self::ACTION_FORM_FIND);
        } catch (Exception $ex) {
            // Informa ao usuário que ocorreu um erro ao salvar os dados.
            // Obs. Não é uma boa prática exibir mensagens de erro com conteúdo técnico para o usuário.
            // - O usuário não vai entender o que está acontecendo.
            // - Mensagens técnicas podem expor falhas no sistema a serem exploradas por um eventual atacante.
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to save the Member data.", self::ACTION_FORM_FIND);
        }
    }
}

?>