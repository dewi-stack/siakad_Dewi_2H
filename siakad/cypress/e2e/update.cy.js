describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get('body')
    cy.get('.btn-primary').eq(4).click();
    cy.get('#Alamat').clear()
    cy.get('#Alamat').type("Ambon")
    cy.get('.btn-primary').click()
  })
})