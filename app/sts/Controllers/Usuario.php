<?php

    namespace Sts\Controllers;

    class Usuario
    {
        /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW*/
        private array|string|null $data = null;

        /** @var array|string|null $dataForm Recebe os dados enviados para VIEW*/
        private array|string|null $dataForm;

        public function index(): void
        {
            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($this->dataForm['CriarUsuario'])){
                
                unset($this->dataForm['CriarUsuario']);
                $createUsuario = new \Sts\Models\StsUsuario();
            
                if($createUsuario->create($this->dataForm)){
                    echo "Cadastrado com sucesso!<br>";
                    echo $_SESSION['msg'];
                }
                else{
                    echo "Não foi possivel cadastrar!<br>";
                    echo $_SESSION['msg'];
                    $this->data['form'] = $this->dataForm;
                }
            }

            $loadView = new \Core\ConfigView("sts/Views/cadastroUsuario", $this->data);
            $loadView->loadView();
        }
    }