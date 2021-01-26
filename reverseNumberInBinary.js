function reverseNumberInBinary(number) {
     return  parseInt(Array.from(parseInt(number).toString(2)).reverse().join(''), 2);
}

console.log(reverseNumberInBinary(process.argv[2]));