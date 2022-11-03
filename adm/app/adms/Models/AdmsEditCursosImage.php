<?php

namespace App\adms\Models;

/**
 * Classe responsável na edição da imagem de cursos do banco de dados
 */
class AdmsEditCursosImage
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var array $dataImage Recebe os dados da imagem que devem ser inseridos no banco de dados*/
    private array|null $dataImage;

    /** @var array $delImage Recebe o endereco da imagem que deve ser excluida*/
    private string $delImage;

    /** @var string $diretorio Recebe o endereço de upload da imagem*/
    private string $diretorio;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewCurso(int $id): bool
    {
        $this->id = $id;

        $viewCurso = new \App\adms\Models\helper\AdmsRead();
        $viewCurso->fullRead("SELECT idCurso, foto
                                FROM curso
                                WHERE idCurso =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Curso não encontrado!</p>";
            $this->result = false;
            return false;
        }
    }

    public function update(array $data = null): void
    {
        $this->data = $data;
        $this->dataImage = $this->data['foto'];
        unset($this->data['foto']);

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            if (!empty($this->dataImage['name'])) {
                $this->valInput();
            } else {
                $_SESSION['msg'] = "<p style='color: red;'> Erro: Necessário selecionar uma imagem!</p>";
                $this->result = false;
            }
        } else {
            $this->result = false;
        }
    }

    /**
     * Verifica se existe o curso com o Id recebido
     * Caso encontre algum erro, retorna false.
     *
     * @return void
     */
    private function valInput(): void
    {
        $valImage = new \App\adms\Models\helper\AdmsValImg();
        $valImage->validadeImg($this->dataImage['type']);

        if (($this->viewCurso($this->data['idCurso'])) and ($valImage->getResult())) {
            $this->result = false;
            $this->upload();
        } else {
            $this->result = false;
        }
    }

    private function upload(): void
    {
        $this->diretorio = "app/adms/assets/img/cursos/" . $this->data['idCurso'] . "/";

        if ((!file_exists($this->diretorio)) and (!is_dir($this->diretorio))) {
            mkdir($this->diretorio, 0755);
        }

        if (move_uploaded_file($this->dataImage['tmp_name'], $this->diretorio . $this->dataImage['name'])) {
            $this->edit();
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível realizar o upload da imagem!</p>";
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $this->data['foto'] = $this->dataImage['name'];

        $updateCurso = new \App\adms\Models\helper\AdmsUpdate();
        $updateCurso->executeUpdate("curso", $this->data, "WHERE idCurso=:idCurso", "idCurso={$this->data['idCurso']}");

        if ($updateCurso->getResult()) {
            $this->deleteImage();
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar o curso!</p>";
            $this->result = false;
        }
    }

    private function deleteImage(): void
    {
        if ((!empty($this->resultBd[0]['foto']) or ($this->resultBd[0]['foto'] != null)) and ($this->resultBd[0]['foto'] != $this->data['foto'])) {
            $this->delImage = "app/adms/assets/img/cursos/" . $this->data['idCurso'] . "/" . $this->resultBd[0]['foto'];

            if (file_exists($this->delImage)) {
                unlink($this->delImage);
            }
        }

        $_SESSION['msg'] = "<p style='color: green;'> Imagem atualizada com sucesso! </p>";
        $this->result = true;
    }
}
