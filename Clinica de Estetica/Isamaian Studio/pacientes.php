<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro de Paciente</title>

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

        <h2>Cadastro de Paciente</h2>

        <p>
          Cadastro e edição das informações do paciente.
        </p>

      </div>

      <div class="header-buttons">

        <button class="btn-black" onclick="window.location.href='index.php'">

          Voltar
        </button>

      </div>

    </section>

    <!-- FORMULÁRIO -->

    <section class="form-section">

      <h2>Informações do Paciente</h2>

      <p>
        Preencha os dados abaixo.
      </p>

      <form action="" method="POST">

        <div class="form-grid">

          <!-- NOME -->

          <div class="input-group">

            <label>
              nome_completo
            </label>

            <input type="text" name="nome_completo" placeholder="Digite o nome completo">

          </div>

          <!-- DATA NASCIMENTO -->

          <div class="input-group">

            <label>
              data_nascimento
            </label>

            <input type="date" name="data_nascimento">

          </div>

          <!-- CPF -->

          <div class="input-group">

            <label>
              cpf
            </label>

            <input type="text" name="cpf" placeholder="Digite o CPF">

          </div>

          <!-- TELEFONE -->

          <div class="input-group">

            <label>
              telefone
            </label>

            <input type="text" name="telefone" placeholder="Digite o telefone">

          </div>

          <!-- EMAIL -->

          <div class="input-group">

            <label>
              email
            </label>

            <input type="email" name="email" placeholder="Digite o e-mail">

          </div>

          <!-- GÊNERO -->

          <div class="input-group">

            <label>
              genero
            </label>

            <select name="genero">

              <option value="">
                Selecione
              </option>

              <option value="feminino">
                Feminino
              </option>

              <option value="masculino">
                Masculino
              </option>

              <option value="outro">
                Outro
              </option>

            </select>

          </div>

          <!-- ENDEREÇO -->

          <div class="input-group full-width">

            <label>
              endereco
            </label>

            <input type="text" name="endereco" placeholder="Digite o endereço">

          </div>

          <!-- OBSERVAÇÕES -->

          <div class="input-group full-width">

            <label>
              observacoes
            </label>

            <textarea name="observacoes" rows="6" placeholder="Observações sobre o paciente"></textarea>

          </div>

        </div>

        <!-- BOTÕES -->

        <div class="form-buttons">

          <button type="button" class="btn-gray">
            Cancelar
          </button>

          <button type="submit" class="btn-pink">
            Salvar Paciente
          </button>

        </div>

      </form>

    </section>

  </main>

</body>

</html>