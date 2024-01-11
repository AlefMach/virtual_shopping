<?php

include './model/ProductTypeModel.php';

class ProductTypeController
{
    public function create()
    {
        include './views/product_type/create.php';
    }

    public function save()
    {
        // Lógica para processar o salvamento do tipo de produto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $name = $_POST['name'];
            $taxRate = $_POST['tax_rate'];

            // Validação básica (pode ser mais robusta conforme suas necessidades)
            if (empty($name) || empty($taxRate)) {
                // Trate erros de validação aqui (redirecionamento ou exibição de mensagens de erro)
                header('Location: /product-type/create');
                exit();
            }

            $product_type = new ProductTypeModel([
                'name'=> $name,
                'tax_rate' => $taxRate,
            ]);

            $product_type->save();
            
            // Redirecione para a página de cadastro de tipo de produto
            header('Location: /product-type/create?success=true');
            exit();
        } else {
            // Se a requisição não for do tipo POST, redirecione para a página de cadastro de tipo de produto
            header('Location: /product-type/create');
            exit();
        }
    }
}