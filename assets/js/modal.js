function evenementBouton() {
    const maModale = document.getElementById('modale')
    maModale.style.display = 'flex'
}
const monBouton = document.getElementById('bouton')
  
monBouton.addEventListener('click', evenementBouton)


function evenementBouton2() {
    const maModale = document.getElementById('modale')
    maModale.style.display = 'none'
}
const BoutonFerme = document.getElementById('bouton-ferme')
  
BoutonFerme.addEventListener('click', evenementBouton2)


function evenementBouton3() {
    const maModale = document.getElementById('modale-on')
    maModale.style.display = 'flex'
}
const monBouton2 = document.getElementById('bouton')
  
monBouton2.addEventListener('click', evenementBouton3)


function evenementBouton4() {
    const maModale = document.getElementById('modale-on')
    maModale.style.display = 'none'
}
const BoutonFerme2 = document.getElementById('bouton-ferme')
  
BoutonFerme2.addEventListener('click', evenementBouton4)