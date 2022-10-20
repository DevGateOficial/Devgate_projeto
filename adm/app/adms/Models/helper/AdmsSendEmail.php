<?php

namespace App\adms\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Classe responsável em enviar o email para usuário.
 * 
 *
 */
class AdmsSendEmail
{
    /** @var array $data Receber as informações do conteúdo do e-mail */
    private array $data;

    /** @var array $dataInfoEmail Recebe as credenciais do e-mail */
    private array $dataInfoEmail;

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;

    /** @var bool $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $fromEmail Recebe o e-mail do remetente */
    private string $fromEmail;
    
    
    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }
    
    public function sendEmail(int $optionConfEmail): void
    {
        $this->data['toEmail'] = "felipe2@hotmail.com";
        $this->data['toName'] = "Felipe";
        $this->data['subject'] = "Confirmar e-mail";
        $this->data['contentHtml'] = "Cadastro realizado com sucesso!";
        $this->data['contentText'] = "Cadastro realizado com sucesso!";

        $this->sendEmailPhpMailer();
    }

    private function infoPHPMailer(): void
    {

        $confEmail = new \App\adms\Models\helper\AdmsRead();
        $confEmail->fullRead("select")
    }

    private function sendEmailPhpMailer(): void
    {
        $mail = new PHPMailer(true);
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = $this->dataInfoEmail['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->dataInfoEmail['username'];
            $mail->Password   = $this->dataInfoEmail['password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $this->dataInfoEmail['port'];

            $mail->setFrom($this->dataInfoEmail['fromEmail'], $this->dataInfoEmail['fromName']);
            $mail->addAddress($this->data['toEmail'], $this->data['toName']);

            $mail->isHTML(true);                                
            $mail->Subject = $this->data['subject'];
            $mail->Body    = $this->data['contentHtml'];
            $mail->AltBody =  $this->data['contentText'];

            $mail->send();
            $this->result = true;

            echo "ola internet";
        } catch (Exception $e) {
            $this->result = false;
        }
    }
}
