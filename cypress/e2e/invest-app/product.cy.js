/// <reference types="cypress" />

describe('User can CRUD', () => {
    it('User can Create', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");

        cy.get('#username').type("admin01");
        cy.get('#password').type("admin");
        cy.get('.btn').click();
        cy.get(':nth-child(5) > .nav-link').click();
        cy.get('.btn-success').click();
        cy.get('#judul').type("Apalah");
        cy.get('#penerbit').type("Clover");
        cy.get('#pengarang').type("Oda");
        cy.get('#jenis').type("Novel");
        cy.get('#stok').type("6");
        cy.get('.btn').click();
        cy.get('p').should("have.text", "Buku Berhasil Ditambahkan");
    });

    it('User can See Data', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");

        cy.get('#username').type("admin01");
        cy.get('#password').type("admin");
        cy.get('.btn').click();
        cy.get(':nth-child(5) > .nav-link').click();
        cy.get(':nth-child(2) > :nth-child(7) > center > form > .btn-info').click();
        cy.get('.btn').click();
    });

    it('User can Edit', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");

        cy.get('#username').type("admin01");
        cy.get('#password').type("admin");
        cy.get('.btn').click();
        cy.get(':nth-child(5) > .nav-link').click();
        cy.get(':nth-child(2) > :nth-child(7) > center > form > .btn-primary').click();
        cy.get('#judul').clear().type("itulah");
        cy.get('.btn-primary').click();
        cy.get('p').should("have.text", "Buku Berhasil Diupdate");
    });

    it('User can Delete', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");

        cy.get('#username').type("admin01");
        cy.get('#password').type("admin");
        cy.get('.btn').click();
        cy.get(':nth-child(5) > .nav-link').click();
        cy.get(':nth-child(2) > :nth-child(7) > center > form > .btn-danger').click();
        cy.get('p').should("have.text", "Buku Berhasil Dihapus");
    });
});