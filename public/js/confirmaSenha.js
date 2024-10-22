$(function(){
	$("#submit").click(function(){
      var senha = $("#senha1").val();
      var senha2 = $("#senha2").val();
      if(senha != senha2){
        event.preventDefault();
      	alert("As senhas não são iguais!");
      }
    });
  });
