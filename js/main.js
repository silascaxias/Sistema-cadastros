var GeneralFunctions = {};
GeneralFunctions.Format = function(mask, input) {
    var inputLength = input.value.length;
    var output = mask.substring(0, 1);
    var str = mask.substring(inputLength);
    
    if (str.substring(0,1) != output) {
    	input.value += str.substring(0,1);   	
    }
}

function mascaraTelefone(objeto){
  if(objeto.value.length == 0)
   objeto.value = '(' + objeto.value;

 if(objeto.value.length == 3)
  objeto.value = objeto.value + ')';

if(objeto.value.length == 8)
 objeto.value = objeto.value + '-';

}

function load_value($nome,$end,$cpf,$tel,$email,$senha,$nivel){
    document.getElementById('nome').value = $nome;
    document.getElementById('end').value = $end;
    document.getElementById('cpf').value = $cpf;
    document.getElementById('tel').value = $tel;
    document.getElementById('email').value = $email;
    document.getElementById('senha').value = $senha;
    document.getElementById('nivel').value = $nivel;
}