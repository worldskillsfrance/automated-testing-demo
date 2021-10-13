const { transactionGroupSums } = require('./task1')

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

describe('computes sums correctly', () => {
  test('empty array returns emptry array', () => {
    expect(transactionGroupSums([])).toStrictEqual([])
  })
  test('get sums', () => {
    expect(transactionGroupSums(arr1, arr2)).toStrictEqual([53.52, 27.99])
  })
  test('get sums in right order', () => {
    expect(transactionGroupSums(arr3, arr1)).toStrictEqual([27.11, 53.52])
  })
  test('get sums for 1 item only', () => {
    expect(transactionGroupSums(arr2)).toStrictEqual([27.99])
  })
  test('get sums for more than 2 items', () => {
    expect(transactionGroupSums(arr1, arr3, arr2)).toStrictEqual([53.52, 27.11, 27.99])
  })
})