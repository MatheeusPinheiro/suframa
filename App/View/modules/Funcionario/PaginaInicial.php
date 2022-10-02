<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndex.css" />
    <title>Principal</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="capa">

            </div>
            <div class="user">
                <div class="user-avatar">
                    <img src="<?= $modelLogin->path ?>" alt="img-user" />
                </div>
            </div>

            <div class="modal-big-foto">
                <div class="modal-big-foto-area">
                    <div class="close-big-foto-modal">
                        <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <div class="big-foto">
                        <img src="<?= $modelLogin->path ?>" alt="" />
                    </div>
                </div>
            </div>


            <!--Adiconar DEMANDA -->
            <div class="modal-demanda">
                <div class="modal-demanda-area">
                    <div class="close-modal-demanda">

                        <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <div class="area-cad-demanda">
                        <form method="POST" action="paginaInicial/save">
                            <input type="hidden" name="funcionario_id" value="<?= $modelLogin->funcId ?>">
                            <div class="nome-funcionario">
                                <div class="img-func">
                                    <img src="<?= $modelLogin->path ?>" />
                                </div>
                                <span></span>
                            </div>

                            <div class="observacao-option">
                                <span>Demanda:</span>
                                <!--
                                        <input type="text" name="descricao"> -->

                                <textarea name="descricao" placeholder="Digite a demanda aqui."></textarea>
                            </div>

                            <div class="demanda-option">
                                <span>Tipo de Demanda:</span>
                                <select name="tipo_demanda_id">
                                    <option>Tipo Demanda</option>
                                    <?php foreach ($modelTipoDemanda->rows as $item) : ?>
                                        <option value="<?= $item->id ?>"> <?= $item->nome ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="demanda-option">
                                <span>Início:</span>
                                <input type="date" name="data_inicio">
                            </div>

                            <div class="demanda-option">
                                <span>Terminio:</span>
                                <input type="date" name="data_termino">
                            </div>

                            <div class="demanda-option">
                                <span>Prioridade:</span>
                                <select name="prioridade_id">
                                    <option>Prioridade</option>
                                    <?php foreach ($modelPrioridade->rows as $item) : ?>
                                        <option value="<?= $item->id ?>"> <?= $item->nome ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="demanda-option">
                                <span>Andamento:</span>
                                <select name="andamento_id">
                                    <option>Andamento</option>
                                    <?php foreach ($modelAndamento->rows as $item) : ?>
                                        <option value="<?= $item->id ?>"> <?= $item->porcentagem ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="observacao-option">
                                <span>Observações:</span>
                                <textarea name="observacao" placeholder="Escreva a observação da demanda aqui."></textarea>
                            </div>
                            <div class="modal-demanda-button">
                                <input type="submit" value="salvar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- INFORMAÇÕES DO USUÁRIO -->
            <div class="user-info">
                <span><?= $modelLogin->fnome ?></span>
                <span><?= $modelLogin->cargo ?></span>
            </div>

            <div class="arrow">
                <<>>
            </div>


            <div class="grid">

                <div class="grid-area">
                    <?php
                    $id = 0;
                    if (is_array($modelDemanda) || is_object($modelDemanda)){
                    ?>
                    
                    <?php foreach ($modelDemanda as $item) : ?>

                        <div class="demanda-item">
                            <div class="d-num">
                                <?php
                                echo $id = $id + 1; ?>
                            </div>
                            <div class="d-item">
                                <span>Demanda:</span>
                                <span><?= $item->descricao ?></span>
                            </div>
                            <div class="d-item">
                                <span>Tipo de Demanda:</span>
                                <span><?= $item->tipoDemanda ?></span>
                            </div>
                            <div class="d-item">
                                <span>Inicio:</span>
                                <span><?= $item->data_inicio ?></span>
                            </div>
                            <div class="d-item">
                                <span>Previsão de termino:</span>
                                <span><?= $item->data_termino ?></span>
                            </div>
                            <div class="d-item">
                                <span>Prioridade:</span>
                                <span><?= $item->prioridade ?></span>
                            </div>
                            <?php if ($item->porcentagem == 100) { ?>
                                <div class="d-item" style="background-color: green;">
                                <?php } else { ?>
                                <div class="d-item">
                                <?php } ?>
                                    <span>Andamento:</span>
                                    <span> <?= $item->porcentagem ?></span>
                                </div>
                                <div class="d-item">
                                    <span>Observações:</span>
                                    <span><?= $item->observacao ?></span>
                                </div>
                            </div>

                            <?php endforeach ?>
                            <?php }?>
                        </div>

                </div>

            </div>


            <div class="menu-lateral">

                <div class="menu">
                    <div data-key="0" class="menu-option active">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="">Home</a>
                    </div>
                    <div data-key="1" class="menu-option" id="addDemanda">
                        <i class="fa-solid fa-book-medical"></i>
                        <a href="#">Add demandas</a>
                    </div>
                    <div data-key="0" class="menu-option ">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a href="../Controller/sair.php">Sair</a>
                    </div>
                </div>
            </div>

            <div class="button-close">
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>



            <script src="../js/script.js"></script>
            <script src="../js/modals.js"></script>
</body>
<?php if (isset($_GET['message'])) echo (printMessage($_GET['message']));
function printMessage($message)
{
    if ($message == 'success-create')
        return "<div class='modal2'>
                            <div class='modal-area2'>
                                <div class='modal-info2'>
                                    <div class='texto-agente'>
                                    CADASTRADO COM SUCESSO
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let abrirModal = () => document.querySelector('.modal2').style.display = 'flex';
                            let fecharModal = () => document.querySelector('.modal2').style.display = 'none';
                            setTimeout(() => {
                                abrirModal();
                                clearTimeout();
                            }, 0)

                            setTimeout(() => {
                                fecharModal();
                                window.location.replace('../Views/paginainicial.php');
                            }, 1000)
                        </script>
                        ";
    if ($message == 'error-create')
        return "<div class='modal2'>
                            <div class='modal-area2' style='background-color: #9d3535'>
                                <div class='modal-info2'>
                                    <div class='texto-agente'>
                                    DADOS J&Aacute; EXISTENTE
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let abrirModal = () => document.querySelector('.modal2').style.display = 'flex';
                            let fecharModal = () => document.querySelector('.modal2').style.display = 'none';
                            setTimeout(() => {
                                abrirModal();
                                clearTimeout();
                            }, 0)

                            setTimeout(() => {
                                fecharModal();
                                window.location.replace('../Views/adm.php');
                            }, 1000)
                        </script>
                        ";
}
?>

</html>