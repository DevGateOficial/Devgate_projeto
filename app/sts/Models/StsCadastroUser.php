<?php

namespace Sts\Models;

class StsCadastroUser
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var array $result */
    private $result;

    /** @var array $fromEmail */
    private string $fromEmail;

    /** @var array $firstName */
    private string $firstName;

    /** @var array $url */
    private string $url;

    /** @var array $emailData */
    private array $emailData;


    public function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $valEmptyField = new \Sts\Models\helper\StsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->valInput();
        } else {
            $this->result = false;
        }
    }

    /**
     * Valida o email e senha do usuário. 
     * Verifica se o email é válido e se já existe no banco de dados.
     * Verifica se o nome de usuário ja existe no banco de dados.
     *
     * @return void
     */
    private function valInput(): void
    {
        //Instancia o método de verificação das informações do  usuário
        $valUserCad = new \Sts\Models\helper\StsValUser();
        //Valida se o forma do email é válido
        $valUserCad->validadeEmail($this->data['email']);
        //Validação do email e do nome de usuário
        $valUserCad->validadeUser($this->data['nomeUsuario'], $this->data['email']);

        //Validação da senha
        $valPassword = new \Sts\Models\helper\StsValPassword();
        $valPassword->validatePass($this->data['senha']);

        if (($valUserCad->getResultEmail()) and ($valUserCad->getResultUser()) and ($valPassword->getResult())) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    private function add(): void
    {
        $this->data['senha'] = password_hash($this->data['senha'], PASSWORD_DEFAULT);
        $this->data['confEmail'] = password_hash($this->data['senha'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        $cadastrarUser = new \App\adms\Models\helper\AdmsCreate();
        $cadastrarUser->executeCreate("usuario", $this->data);

        if ($cadastrarUser->getResult()) {
            $this->sendEmail();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
            $this->result = false;
        }
    }

    private function sendEmail(): void
    {
        $this->contentEmailHtml();
        $this->contentEmailText();

        $sendEmail = new \App\adms\Models\helper\AdmsSendEmail();
        $sendEmail->sendEmail($this->emailData, 1);

        if ($sendEmail->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso! Acesse a sua caixa de e-mail para confirmar o e-mail!</p>";
            $this->result = true;
        } else {
            $this->fromEmail = $sendEmail->getFromEmail();
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso. Houve erro ao enviar o e-mail de confirmação, entre em contato
            com {$this->fromEmail} para mais informações!</p>";
            $this->result = false;
        }
    }

    private function contentEmailHtml(): void
    {
        $name = explode(" ", $this->data['nomeUsuario']);
        $this->firstName = $name[0];

        $this->emailData['toEmail'] = $this->data['email'];
        $this->emailData['toName'] = $this->data['nomeCompleto'];
        $this->emailData['subject'] = "Confirmar sua conta";
        $this->url = URLADM . "conf-email/index?key=" . $this->data['confEmail'];

        $this->emailData['contentHtml'] = "Prezado(a) {$this->firstName}<br><br>";
        $this->emailData['contentHtml'] .= "Clique no link a baixo para confirmar seu e-mail:<br><br>";
        $this->emailData['contentHtml'] .= "<a href='{$this->url}'>Clique aqui<br><br></a>";
    }

    private function contentEmailText(): void
    {
        $url = URLADM . "conf-email/index?key=" . $this->data['confEmail'];
        $this->emailData['contentText'] = "Prezado(a) {$this->firstName}\n\n";
        $this->emailData['contentText'] .= "Clique no link a baixo para confirmar seu e-mail:\n\n";
        $this->emailData['contentText'] .= $this->url . "\n\n";
    }
}
