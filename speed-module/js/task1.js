/* Task 1
  Complete the function that displays an array of sums of customer transactions, ordered by ascendant ID.
  
  Example : 
  const arr1 = [{
    id: 2,
    amount: 10.00
  }, {
    id: 1,
    amount: 33.52
  },{
    id: 16,
    amount: 10.00
  }]

  const arr2 = [{
    id: 31,
    amount: 12.00
  },{
    id: 155,
    amount: 15.99
  }]

  const arr3 = [{
    id: 311,
    amount: 12.11
  },{
    id: 1211,
    amount: 15.00
  }]

  transactionGroupSums(arr1, arr2, arr3) => [53.52, 27.99, 27.11]
*/

const transactionGroupSums = (...arr) => {
  // return arr.map((group) => {
  //   return group.reduce((acc, cur) => {
  //     return Math.round((acc + cur.amount + Number.EPSILON) * 100) / 100
  //   }, 0)
  // })
  return []
}


module.exports = {
  transactionGroupSums
}