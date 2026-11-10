$(document).ready(function() {
  // Executa a função após 5000 milissegundos (5 segundos)
  setTimeout(function() {
    $("#meuAlerta").alert('close'); // Remove o alerta usando a API do Bootstrap 4
  }, 5000);
});
