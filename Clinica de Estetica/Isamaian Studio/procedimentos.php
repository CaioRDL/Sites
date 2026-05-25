<!-- procedimentos.php -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Procedimentos</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- SIDEBAR -->
    <?php include('../isamaianstudio/components/sidebar.php'); ?>

    <!-- MAIN -->

    <main class="main">

        <!-- HEADER -->

        <section class="header">

            <div>

                <h2>Procedimentos</h2>

                <p>
                    Cadastro e gerenciamento dos procedimentos realizados.
                </p>

            </div>

            <div class="header-buttons">

                <button
                    class="btn-gray"
                    onclick="window.location.href='index.php'"
                >
                    ← Voltar
                </button>

            </div>

        </section>

        <!-- FORM SECTION -->

        <section class="form-section">

            <h2>Novo Procedimento</h2>

            <p>
                Preencha os dados do procedimento realizado.
            </p>

            <form action="" method="POST">

                <div class="form-grid">

                    <!-- PACIENTE -->

                    <div class="input-group">

                        <label>
                            id_paciente
                        </label>

                        <select name="id_paciente">

                            <option value="">
                                Selecione o paciente
                            </option>

                        </select>

                    </div>

                    <!-- ATENDIMENTO -->

                    <div class="input-group">

                        <label>
                            id_atendimento
                        </label>

                        <select name="id_atendimento">

                            <option value="">
                                Selecione o atendimento
                            </option>

                        </select>

                    </div>

                    <!-- PROCEDIMENTO -->

                    <div class="input-group">

                        <label>
                            nome_procedimento
                        </label>

                        <input
                            type="text"
                            name="nome_procedimento"
                            placeholder="Digite o procedimento"
                        >

                    </div>

                    <!-- VALOR -->

                    <div class="input-group">

                        <label>
                            valor_procedimento
                        </label>

                        <input
                            type="text"
                            name="valor_procedimento"
                            placeholder="R$ 0,00"
                        >

                    </div>

                    <!-- STATUS -->

                    <div class="input-group">

                        <label>
                            status_procedimento
                        </label>

                        <select name="status_procedimento">

                            <option value="">
                                Selecione
                            </option>

                            <option value="pendente">
                                Pendente
                            </option>

                            <option value="realizado">
                                Realizado
                            </option>

                            <option value="cancelado">
                                Cancelado
                            </option>

                        </select>

                    </div>

                    <!-- DATA -->

                    <div class="input-group">

                        <label>
                            data_procedimento
                        </label>

                        <input
                            type="datetime-local"
                            name="data_procedimento"
                        >

                    </div>

                    <!-- DESCRIÇÃO -->

                    <div class="input-group full-width">

                        <label>
                            descricao_procedimento
                        </label>

                        <textarea
                            name="descricao_procedimento"
                            rows="5"
                            placeholder="Descrição do procedimento..."
                        ></textarea>

                    </div>

                    <!-- OBSERVAÇÕES -->

                    <div class="input-group full-width">

                        <label>
                            observacoes_procedimento
                        </label>

                        <textarea
                            name="observacoes_procedimento"
                            rows="5"
                            placeholder="Observações adicionais..."
                        ></textarea>

                    </div>

                </div>

                <!-- BOTÕES -->

                <div class="form-buttons">

                    <button
                        type="button"
                        class="btn-gray"
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="btn-pink"
                    >
                        Salvar Procedimento
                    </button>

                </div>

            </form>

        </section>

    </main>

</body>

</html>