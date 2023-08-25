//Array find
let arrFind = [
    {Lang : 'Html'},
    {Lang : 'Javascript'},
    {Lang : 'Css'},
    {Lang : 'PHP'}
];
arrFind.find((value, index) => {
    console.log(index, value.Lang);
} ) 
console.log("");

let arrFind2 = ['Html','Javascript','Css','PHP'];
console.log(arrFind2.find(value => value == 'Css')); 

//Array filter
let arrFilter = [
    {Lang : 'Html'},
    {Lang : 'Javascript'},
    {Lang : 'Css'},
    {Lang : 'PHP'}
];
console.log("");

arrFilter.filter((value, index) => {
    console.log("Value : ",index, value );
})
console.log("");
//Array Map - Can add or change the value within an object or an array

let arrMap = [
    {Lang : 'Html'},
    {Lang : 'Javascript'},
    {Lang : 'Css'},
    {Lang : 'PHP'}
];

const mapping = arrMap.map(value => {
    if(value.Lang == 'Html') {
        return { ...value, Abvr : 'Hypertext Markup Language'}
    }
    if (value.Lang == 'Css') {
        return { ...value, Abvr : 'Cascading Style Sheet'}
    } else {
        
    }
})

console.log(mapping);






