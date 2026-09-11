// =========================================
// EVENTO - JQUERY
// =========================================

$(document).ready(function () {
  console.log("evento.js carregado!");

  prepararCampos();

  aplicarMascaras();

  listarEventos();

  $("#formEvento").on("submit", function (event) {
    event.preventDefault();
  });

  validarFormulario();
  // =========================================
  // BOTÃO CANCELAR
  // =========================================

  $(".btn-cancelar").on("click", function () {
    window.location.href = "index.php?page=home";
  });
});

// =========================================
// PREPARA OS CAMPOS
// =========================================

function prepararCampos() {
  // =====================================
  // ADICIONA NAME AOS CAMPOS
  // =====================================

  $("#titulo").attr("name", "titulo");
  $("#categoria").attr("name", "categoria");
  $("#descricao").attr("name", "descricao");
  $("#imagem").attr("name", "imagem");
  $("#data").attr("name", "data");
  $("#horario").attr("name", "horario");
  $("#local").attr("name", "local");
  $("#endereco").attr("name", "endereco");
  $("#telefone").attr("name", "telefone");
  $("#email").attr("name", "email");
  $("#site").attr("name", "site");
}

// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {
  $("#telefone").mask("(00) 00000-0000");
}

// =========================================
// VALIDAÇÕES PERSONALIZADAS
// =========================================

function configurarValidacoesCustomizadas() {
  // =====================================
  // TELEFONE
  // =====================================

  $.validator.addMethod(
    "telefoneValido",
    function (value, element) {
      if (this.optional(element)) {
        return true;
      }

      return /^\(\d{2}\) \d{5}-\d{4}$/.test(value);
    },
    "Informe um telefone válido.",
  );

  // =====================================
  // SITE
  // =====================================

  $.validator.addMethod(
    "siteValido",
    function (value, element) {

        if (this.optional(element)) {
            return true;
        }

        value = value.trim();

        return /^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/.*)?$/.test(
            value
        );

    },
    "Digite um site válido."
);

  // =====================================
  // DATA
  // =====================================

  $.validator.addMethod(
    "dataValida",
    function (value, element) {
      if (this.optional(element)) {
        return true;
      }

      if (!/^\d{4}-\d{2}-\d{2}$/.test(value)) {
        return false;
      }

      const partes = value.split("-");

      const ano = parseInt(partes[0]);
      const mes = parseInt(partes[1]) - 1;
      const dia = parseInt(partes[2]);

      const data = new Date(ano, mes, dia);

      return (
        data.getFullYear() === ano &&
        data.getMonth() === mes &&
        data.getDate() === dia
      );
    },
    "Informe uma data válida.",
  );

  // =====================================
  // HORÁRIO
  // =====================================

  $.validator.addMethod(
    "horarioValido",
    function (value, element) {
      if (this.optional(element)) {
        return true;
      }

      return /^(?:[01]\d|2[0-3]):[0-5]\d$/.test(value);
    },
    "Informe um horário válido.",
  );

}

// =========================================
// VALIDAÇÃO
// =========================================

function validarFormulario() {
  console.log("Validação do evento iniciada!");

  const mensagem = $("#mensagem");

  configurarValidacoesCustomizadas();

  $("#formEvento").validate({
    // =====================================
    // NÃO PERMITE ENVIO SE EXISTIREM ERROS
    // =====================================

    onsubmit: true,

    // =====================================
    // REGRAS
    // =====================================

    rules: {
      titulo: {
        required: true,
        minlength: 3,
        maxlength: 100,
      },

      categoria: {
        required: true,
      },

      descricao: {
        required: true,
        minlength: 10,
        maxlength: 2000,
      },

      // imagem: {
      //   required: function () {
      //     return $("#id").val() === "";
      //   },

      //   imagemValida: true,
      // },

      data: {
        required: true,
        dataValida: true,
      },

      horario: {
        required: true,
        horarioValido: true,
      },

      local: {
        required: true,
        minlength: 3,
        maxlength: 150,
      },

      endereco: {
        required: true,
        minlength: 5,
        maxlength: 200,
      },

      telefone: {
        required: true,
        telefoneValido: true,
      },

      email: {
        required: true,
        email: true,
      },

      site: {
        required: true,
        siteValido: true,
      },
    },

    // =====================================
    // MENSAGENS
    // =====================================

    messages: {
      titulo: {
        required: "Informe o título do evento.",
        minlength: "O título deve ter pelo menos 3 caracteres.",
        maxlength: "O título deve ter no máximo 100 caracteres.",
      },

      categoria: {
        required: "Selecione uma categoria.",
      },

      descricao: {
        required: "Informe a descrição do evento.",
        minlength: "A descrição deve ter pelo menos 10 caracteres.",
        maxlength: "A descrição deve ter no máximo 2000 caracteres.",
      },

      // imagem: {
      //   required: "Selecione uma imagem de capa.",
      //   imagemValida: "Selecione uma imagem válida.",
      // },

      data: {
        required: "Informe a data do evento.",
        dataValida: "Informe uma data válida.",
      },

      horario: {
        required: "Informe o horário do evento.",
        horarioValido: "Informe um horário válido.",
      },

      local: {
        required: "Informe o local do evento.",
        minlength: "O local deve ter pelo menos 3 caracteres.",
        maxlength: "O local deve ter no máximo 150 caracteres.",
      },

      endereco: {
        required: "Informe o endereço do evento.",
        minlength: "O endereço deve ter pelo menos 5 caracteres.",
        maxlength: "O endereço deve ter no máximo 200 caracteres.",
      },

      telefone: {
        required: "Informe o telefone.",
        telefoneValido: "Informe o telefone completo: (00) 00000-0000.",
      },

      email: {
        required: "Informe o e-mail.",
        email: "Digite um e-mail válido.",
      },

      site: {
        required: "Informe o site.",
        siteValido: "Digite um site válido.",
      },
    },

    // =====================================
    // MOSTRA O ERRO
    // =====================================

    errorPlacement: function (error, element) {
      const campo = element.closest(".col-md-4, .col-md-6, .col-12");

      campo
        .find(".invalid-feedback")
        .first()
        .text(error.text())
        .addClass("d-block");
    },

    // =====================================
    // CAMPO INVÁLIDO
    // =====================================

    highlight: function (element) {
      const campo = $(element).closest(".col-md-4, .col-md-6, .col-12");

      $(element)
        .removeClass("is-valid")
        .addClass("is-invalid")
        .css("background-image", "none");

      campo.find(".invalid-feedback").first().addClass("d-block");
    },

    // =====================================
    // CAMPO VÁLIDO
    // =====================================

    unhighlight: function (element) {
      const campo = $(element).closest(".col-md-4, .col-md-6, .col-12");

      $(element)
        .removeClass("is-invalid")
        .addClass("is-valid")
        .css("background-image", "none");

      campo.find(".invalid-feedback").first().text("").removeClass("d-block");
    },
    // =====================================
    // FORMULÁRIO VÁLIDO
    // =====================================

    submitHandler: async function (formulario) {
      console.log("FORMULÁRIO LOCALMENTE VÁLIDO!");

      const dados = new FormData(formulario);

      console.table(Object.fromEntries(dados.entries()));

      mensagem
        .removeClass("d-none alert-danger alert-success")
        .addClass("alert-info");

      mensagem.text("Enviando dados do evento...");

      try {
        const resposta = await fetch("controllers/EventoController.php", {
          method: "POST",
          body: dados,
        });

        const resultado = await resposta.json();

        console.log("Resposta do Controller:", resultado);

        // =================================
        // CONTROLLER REJEITOU
        // =================================

        if (!resposta.ok || resultado.sucesso !== true) {
          mensagem
            .removeClass("alert-info alert-success")
            .addClass("alert-danger");

          mensagem.text(resultado.mensagem || "Corrija os campos indicados.");

          mostrarErrosController(resultado.erros);

          return false;
        }

        // =================================
        // SUCESSO
        // =================================

        const toastElemento = document.getElementById("toastSucesso");

        const toastMensagem = $(toastElemento).find(".toast-body");

        toastMensagem.text(
          resultado.mensagem || "Evento cadastrado com sucesso!",
        );

        const toast = new bootstrap.Toast(toastElemento, {
          autohide: true,
          delay: 4000,
        });

        toast.show();

        // =================================
        // LIMPA O FORMULÁRIO
        // =================================

        $("#id").val("");
        $("#acao").val("cadastrar");

        formulario.reset();

        listarEventos();

        $(formulario)
          .find(".form-control, .form-select")
          .removeClass("is-valid is-invalid");

        $(formulario).find(".invalid-feedback").text("").removeClass("d-block");
      } catch (erro) {
        console.error("Erro no fetch:", erro);

        mensagem
          .removeClass("alert-info alert-success")
          .addClass("alert-danger");

        mensagem.text("Erro ao conectar com o controller.");
      }
    },
  });

  // =========================================
  // RESET
  // =========================================

  $("#formEvento").on("reset", function () {
    $(this)
      .find(".form-control, .form-select")
      .removeClass("is-valid is-invalid");

    $(this).find(".invalid-feedback").text("").removeClass("d-block");

    mensagem
      .removeClass("alert-info alert-danger alert-success")
      .addClass("d-none");

    mensagem.text("");
  });
}

// =========================================
// ERROS DO CONTROLLER
// =========================================

function mostrarErrosController(erros) {
  if (!erros) {
    return;
  }

  $.each(erros, function (campo, mensagens) {
    const elemento = $("#" + campo);

    if (!elemento.length) {
      return;
    }

    const container = elemento.closest(".col-md-4, .col-md-6, .col-12");

    let mensagemErro = mensagens;

    if (Array.isArray(mensagens)) {
      mensagemErro = mensagens[0];
    }

    elemento.removeClass("is-valid").addClass("is-invalid");

    container
      .find(".invalid-feedback")
      .first()
      .text(mensagemErro)
      .addClass("d-block");
  });
}

// =========================================
// CRUD
// =========================================

// =========================================
// LISTAR EVENTOS
// READ
// =========================================

async function listarEventos() {
  try {
    const resposta = await fetch(
      "controllers/EventoController.php?acao=listar",
    );

    const resultado = await resposta.json();

    if (!resultado.sucesso) {
      console.log(resultado.mensagem);

      return;
    }

    const eventos = resultado.dados;

    let linhas = "";

    eventos.forEach(function (evento) {
      linhas += `
                <tr>

                    <td>
                        ${evento.id}
                    </td>

                    <td>
                        ${evento.titulo}
                    </td>

                    <td>
                        ${evento.categoria}
                    </td>

                    <td>
                        ${evento.data}
                    </td>

                    <td>
                        ${evento.horario}
                    </td>

                    <td>
                        ${evento.local}
                    </td>

                    <td>
                        ${evento.email}
                    </td>

                    <td class="text-center">

                        <button
                            type="button"
                            class="btn btn-warning btn-sm"
                            onclick="editarEvento(${evento.id})">

                            <i class="bi bi-pencil-fill"></i>

                        </button>


                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            onclick="excluirEvento(${evento.id})">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </td>

                </tr>
            `;
    });

    $("#tabelaEventos").html(linhas);
  } catch (erro) {
    console.error("Erro ao listar eventos:", erro);
  }
}

// =========================================
// EDITAR EVENTO
// BUSCA O EVENTO E PREENCHE O FORMULÁRIO
// =========================================

async function editarEvento(id) {
  try {
    const resposta = await fetch(
      "controllers/EventoController.php?acao=buscar&id=" + id,
    );

    const resultado = await resposta.json();

    if (!resultado.sucesso) {
      alert(resultado.mensagem);

      return;
    }

    const evento = resultado.dados;

    // ID DO EVENTO

    $("#id").val(evento.id);

    // MUDA A AÇÃO

    $("#acao").val("editar");

    // PREENCHE OS MESMOS CAMPOS
    // QUE OS ALUNOS JÁ CRIARAM

    $("#titulo").val(evento.titulo);

    $("#categoria").val(evento.categoria);

    $("#descricao").val(evento.descricao);

    $("#data").val(evento.data);

    $("#horario").val(evento.horario.substring(0, 5));

    $("#local").val(evento.local);

    $("#endereco").val(evento.endereco);

    $("#telefone").val(evento.telefone);

    $("#email").val(evento.email);

    $("#site").val(evento.site);

    // VOLTA PARA O FORMULÁRIO

    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  } catch (erro) {
    console.error("Erro ao buscar evento:", erro);
  }
}

// =========================================
// EXCLUIR EVENTO
// DELETE
// =========================================

async function excluirEvento(id) {
  const confirmar = confirm("Deseja excluir este evento?");

  if (!confirmar) {
    return;
  }

  const dados = new FormData();

  dados.append("acao", "excluir");

  dados.append("id", id);

  try {
    const resposta = await fetch("controllers/EventoController.php", {
      method: "POST",
      body: dados,
    });

    const resultado = await resposta.json();

    if (!resultado.sucesso) {
      alert(resultado.mensagem);

      return;
    }

    alert(resultado.mensagem);

    // ATUALIZA A TABELA

    listarEventos();
  } catch (erro) {
    console.error("Erro ao excluir evento:", erro);
  }
}
