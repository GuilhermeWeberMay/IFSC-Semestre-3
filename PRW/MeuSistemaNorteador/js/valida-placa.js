const tipoPlacaSelect = document.getElementById('tipoPlaca');
const placaInput = document.getElementById('placa');
const validarBtn = document.getElementById('cadastrar-veiculo');
const resultadoDiv = document.getElementById('resultado');

function applyMask(value, type) {
 value = value.toUpperCase().replace(/[^A-Z0-9]/g, '');
 if (type === 'antiga') {
  if (value.length > 7) value = value.slice(0, 7);
  if (value.length > 3) {
   return value.slice(0, 3) + '-' + value.slice(3);
  }
  return value;
 } else { // mercosul
  if (value.length > 7) value = value.slice(0, 7);
  return value;
 }
}

function updateInputConfig(type) {
 if (type === 'antiga') {
  placaInput.placeholder = 'ABC-1234';
  placaInput.maxLength = 8;
 } else {
  placaInput.placeholder = 'ABC1D23';
  placaInput.maxLength = 7;
 }
 placaInput.value = '';
 validate();
}

function validate() {
 const type = tipoPlacaSelect.value;
 const cleanPlaca = placaInput.value.replace(/[^A-Z0-9]/g, '').toUpperCase();
 let isValid = false;

 if (type === 'mercosul') {
  const regex = /^[A-Z]{3}[0-9][A-Z][0-9]{2}$/;
  isValid = regex.test(cleanPlaca);
 } else { // antiga
  const regex = /^[A-Z]{3}[0-9]{4}$/;
  isValid = regex.test(cleanPlaca);
 }

 validarBtn.disabled = !isValid;
 return isValid;
}

// Event listeners
placaInput.addEventListener('input', function (e) {
 const type = tipoPlacaSelect.value;
 e.target.value = applyMask(e.target.value, type);
 validate();
});

tipoPlacaSelect.addEventListener('change', function () {
 updateInputConfig(this.value);
});

validarBtn.addEventListener('click', function () {
 resultadoDiv.innerHTML = '<strong style="color: green;">Placa válida!</strong>';
});

// Initial validation
validate();