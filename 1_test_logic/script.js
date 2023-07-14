console.log("a.\n");
function sortString(input) {
  var alphabets = [];
  var numbers = [];
  for (var i = 0; i < input.length; i++) {
    var char = input[i];
    if (/[a-zA-Z]/.test(char)) {
      alphabets.push(char);
    } else if (/[0-9]/.test(char)) {
      numbers.push(char);
    }
  }
  alphabets.sort();
  numbers.sort();
  var result = alphabets.join('') + numbers.join('');
  return result;
}

console.log("i\n");
var input = "avcsyydcwe33421";
var result = sortString(input);
console.log(result); // Output: accdsvwyy123434

console.log("ii\n");
function hitungJumlahKarakter(string) {
  var karakter = {};
  
  for (var i = 0; i < string.length; i++) {
    var huruf = string.charAt(i);
    
    if (karakter[huruf]) {
      karakter[huruf]++;
    } else {
      karakter[huruf] = 1;
    }
  }
  
  return karakter;
}

var input = "qqooprttt";
var hasil = hitungJumlahKarakter(input);

for (var huruf in hasil) {
  console.log(huruf + " = " + hasil[huruf]);
}

console.log("b.\n");

const data = [
  { id: 1, name: "Hafidz Qodarisman", saldo: 3456999000 },
  { id: 2, name: "Tukang Bakwan", saldo: 399000 },
];

console.log("i\n");
let totalSaldo = 0;
data.forEach((item) => {
  totalSaldo += item.saldo;
});
console.log("Total saldo:", totalSaldo);

console.log("ii\n");
let saldoTerbesar = data[0];
data.forEach((item) => {
  if (item.saldo > saldoTerbesar.saldo) {
    saldoTerbesar = item;
  }
});
console.log("Saldo terbesar:", saldoTerbesar.name, saldoTerbesar.saldo);

console.log("iii\n");
let saldoTerkecil = data[0];
data.forEach((item) => {
  if (item.saldo < saldoTerkecil.saldo) {
    saldoTerkecil = item;
  }
});
console.log("Saldo terkecil:", saldoTerkecil.name, saldoTerkecil.saldo);
console.log("iv\n");
const rataRata = totalSaldo / data.length;
console.log("Rata-rata saldo:", rataRata);


