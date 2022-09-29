/// <reference types="cypress" />

describe('User can Open Login Page', () => {
    it('Login Page can be Open and Have Correct Spesification', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");
    });


    it('user can Login', () => {
        cy.visit("http://127.0.0.1:8000/");
        cy.get('.h3').should("have.text", "Welcome");
        cy.get('.form-check-label').contains("Remember Me");
        cy.get('.btn').contains("Login").and("be.enabled");
        cy.get('a').contains("Register");

        cy.get('#username').type("admin01");
        cy.get('#password').type("admin");
        cy.get('.btn').click();
        cy.get('#navbarDropdown').contains("Admin Perpustakaan");
    });
});