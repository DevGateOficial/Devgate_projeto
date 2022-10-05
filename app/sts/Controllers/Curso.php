<?php

    namespace Sts\Controllers;


    class Curso
    {
        /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW*/
        private array|string|null $data;

        /** @var array|string|null $dataForm Recebe os dados enviados para VIEW*/
        private array|string|null $dataForm;

        public function index(): void
        {
            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($this->dataForm['CriarCurso'])){
                var_dump($this->dataForm);
            }

            $this->data = "Mensagem enviada com sucesso!<br>";
            $loadView = new \Core\ConfigView("sts/Views/cadastroCurso", $this->data);
            $loadView->loadView();
        }
    }