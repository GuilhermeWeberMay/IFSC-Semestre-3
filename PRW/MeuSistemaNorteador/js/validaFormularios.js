const input = document.getElementById('cpf');

input.addEventListener('focus', () => {
  if (input.value === '_._._-__') {
    input.setSelectionRange(0, 0);
  }
});

input.addEventListener('keydown', (e) => {
  e.preventDefault();

  // Mantém apenas números já digitados
  let numeros = input.value.replace(/\D/g, '').replace(/_/g, '');

  // Backspace
  if (e.key === 'Backspace') {
    numeros = numeros.slice(0, -1);
  }

  // Adiciona novo número
  if (/^\d$/.test(e.key) && numeros.length < 11) {
    numeros += e.key;
  }

  // Máscara base
  let mascara = '___.___.___-__'.split('');

  // Posições dos números no CPF
  const posicoes = [0,1,2,4,5,6,8,9,10,12,13];

  numeros.split('').forEach((num, index) => {
    mascara[posicoes[index]] = num;
  });

  input.value = mascara.join('');

  // Move cursor para próximo "_"
  const proximo = input.value.indexOf('_');

  if (proximo !== -1) {
    input.setSelectionRange(proximo, proximo);
  }
});