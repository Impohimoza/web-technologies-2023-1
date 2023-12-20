//Задание 1
function pickPropArray(array, prop) {
    const result = [];
    
    for (let i = 0; i < array.length; i++) {
        const element = array[i];
        if (element.hasOwnProperty(prop)) {
            result.push(element[prop]); 
        }
    }
    
    return result;
}

const students = [
    { name: 'Павел', age: 20 },
    { name: 'Иван', age: 20 },
    { name: 'Эдем', age: 20 },
    { name: 'Денис', age: 20 },
    { name: 'Виктория', age: 20 },
    { age: 40 },
 ]
 
 const result = pickPropArray(students, 'name');

 console.log(result);

 //Задание 2
 function createCounter() {
    let count=1;
  
    return function () {
      console.log(count++)
    }
  }
  
const counter1 = createCounter()
counter1() // 1
counter1() // 2

const counter2 = createCounter()
counter2() // 1
counter2() // 2

//Задание 3
function spinWords(str){
    const array=str.split(' ');
    const result=[];
    for (let i =0;i<array.length;i++){
        if(array[i].length>=5){
            result.push(array[i].split('').reverse().join(''));
        }
        else{
            result.push(array[i])
        }
    }
    return result.join(' ')
}

const result1 = spinWords( "Привет от Legacy" )
console.log(result1) // тевирП от ycageL

const result2 = spinWords( "This is a test" )
console.log(result2) // This is a test

//Задание 4

function numPair(nums, target){
    for(let i = 0;i<nums.length;i++){
        if(nums[i]<=target){
            for(let j = i;j<nums.length;j++){
                if(nums[i]+nums[j]==target){
                    return [i,j]
                }
            }
        }
    }
}

nums = [2,7,11,15];
target=9;
console.log(numPair(nums,target));

//Задание 5

function findLongestCommonSubstring(strings) {
    if (strings.length === 0) return "";

    let longestCommonSubstring = "";

    
    const referenceWord = strings[0];
    for (let i = 0; i < referenceWord.length; i++) {
        for (let j = i + 2; j <= referenceWord.length; j++) {
            let substring = referenceWord.substring(i, j);
            let commonToAll = strings.every(str => str.includes(substring));
            if (commonToAll && substring.length > longestCommonSubstring.length) {
                longestCommonSubstring = substring;
            }
        }
    }

    return longestCommonSubstring;
}

strs = ["цветок","поток","хлопок"];
console.log(findLongestCommonSubstring(strs));
strs2 = ["собака","гоночная машина","машина"]
console.log(findLongestCommonSubstring(strs2));