<?php

namespace App\adms\Models;

class AdmsCadastroUser
{
    /**
     * Undocumented variable
     *
     * @var array|null
     */
    private array|null $data;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $result;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private string $fromEmail;


    /**
     * Undocumented variable
     *
     * @var string
     */
    private string $firstName;

    /**
     * Undocumented variable
     *
     * @var array
     */
    private array $emailData;

    public function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
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
     *
     * @return void
     */
    private function valInput(): void
    {
        //Validação do email
        $valEmail = new \App\adms\Models\helper\AdmsValEmail();
        $valEmail->validadeEmail($this->data['email']);
        $valEmail->validadeEmailSingle($this->data['email']);

        //Validação do nome de usuário
        $valUsuario = new \App\adms\Models\helper\AdmsValUsuario();
        $valUsuario->validadeUserSingleLogin($this->data['nomeUsuario']);

        //Validação da senha
        $valPassword = new \App\adms\Models\helper\AdmsValPassword;
        $valPassword->validatePass($this->data['senha']);

        if(($valEmail->getResult()) and ($valPassword->getResult()) and ($valUsuario->getResult())){
            $this->add();
        }else{
            $this->result = false;
        }
    }

    private function add(): void
    {
        $this->data['senha'] = password_hash($this->data['senha'], PASSWORD_DEFAULT);

        $cadastrarUser = new \App\adms\Models\helper\AdmsCreate();
        $cadastrarUser->executeCreate("usuario", $this->data);

        if ($cadastrarUser->getResult()) {
            $this->sendEmail();
            
            // $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
            // $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
            $this->result = false;
        }
    }

    private function sendEmail(): void
    {
        $this->contentEmailHtml();
        $sendEmail = new \App\adms\Models\helper\AdmsSendEmail();
        $sendEmail->sendEmail(2);

        if($sendEmail->getResult()){
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso! Acesse a sua caixa de e-mail para confirmar o e-mail!</p>";
            $this->result = true;
        } else {
            $this->fromEmail = $sendEmail->getFromEmail();
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário cadastrado com sucesso. Houve erro ao enviar o e-mail de confirmação, entre em contato com {$this->fromEmail} para mais informações!</p>";
            $this->result = false;
        }
        
    }

    private function contentEmailHtml(): void
    {
        $name = explode(" ", $this->data['name']);
        $this->firstName = $name[0];
    
        $this->emailData['toEmail'] = $this->data['email'];
        $this->emailData['toName'] = $this->data['name'];
        $this->emailData['subject'] = "Confirmar sua conta";
        $this->emailData['contentHtml'] = "Prezado(a) {$this->firstName}<br><br>" ;
    }

    private function contentEmailText(): void
    {

    }

}
