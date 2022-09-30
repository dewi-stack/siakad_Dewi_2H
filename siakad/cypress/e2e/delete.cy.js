describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get('body')
    cy.get('.btn-danger').eq(3).click()
  })
})