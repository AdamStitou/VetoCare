/*
* @author @gautierbayard
* Permets la mise à jour des donnnées de l'animal 
*/
document.addEventListener('DOMContentLoaded', function () {
    attachEventAdition('.editable-nom', 'text');
    attachEventAdition('.editable-dateNaissance', 'date');
    attachEventAdition('.editable-sexe', 'text');
    attachEventAdition('.editable-sterile', 'text');
    attachEventAdition('.editable-espece', 'text');
    attachEventAdition('.editable-race', 'text');
    attachEventAdition('.editable-robe', 'text');
    attachEventAdition('.editable-assure', 'text');
    attachEventAdition('.editable-signes', 'textarea');
    attachEventAdition('.editable-pedigre', 'textarea');
    attachEventAdition('.editable-tatouage', 'text');
    attachEventAdition('.editable-depistage', 'text');
    attachEventAdition('.editable-dateDepistage', 'date');
    attachEventAdition('.editable-vaccin', 'textarea');
    attachEventAdition('.editable-dateVaccin', 'date');
    attachEventAdition('.editable-vermifugation', 'text');
    attachEventAdition('.editable-dateVermifugation', 'date');
    attachEventAdition('.editable-produitVermifugation', 'textarea');
    attachEventAdition('.editable-tiques', 'textarea');
    attachEventAdition('.editable-dateTiques', 'date');
    attachEventAdition('.editable-produitTiques', 'text');
    attachEventAdition('.editable-alimentation', 'textarea');
    attachEventAdition('.editable-quantiteJournaliere', 'text');
    attachEventAdition('.editable-observations', 'textarea');

    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', () => adjustWidth(textarea));
        adjustWidth(textarea); 
    });
});

function attachEventAdition(selector, inputType) {
    const editableElements = document.querySelectorAll(selector);

    editableElements.forEach(element => {
        element.addEventListener('click', function() {

            // Sauvegardez la valeur actuelle
            const currentValue = this.innerText.trim();

            // Créez un champ de saisie
            let input;
            if (inputType === 'textarea') {
                input = document.createElement('textarea');
                input.rows = 2; 
            } else {
                input = document.createElement('input');
                input.type = inputType;
            }
            input.value = currentValue;
            input.className = 'info-input';

            this.replaceWith(input);
            input.focus();

            // Gérez la perte de focus pour sauvegarder la valeur et restaurer le div
            input.addEventListener('blur', function() {
                const newValue = this.value.trim();
                const div = document.createElement('div');
                div.className = 'info-content' + selector.replace('.', ' ');
                div.textContent = newValue;
                this.replaceWith(div);
                
                // Trouver le champ caché correspondant et mettre à jour sa valeur
                const hiddenInput = document.querySelector('input[type="hidden"][name="' + selector.replace('.editable-', '') + '"]');
                if (hiddenInput) {
                    hiddenInput.value = newValue;
                }

                // Ré-attacher l'événement après modification
                attachEventAdition(selector, inputType);
            });
        });
    });
}

// Ajuster la taille de la div d'écriture en fonction de sa longueur (non fonctionnel) 
function adjustWidth(textarea) {
    const text = textarea.value;
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    context.font = getComputedStyle(textarea).font;
    const width = context.measureText(text).width;

    textarea.style.width = (width + 100) + 'px';
}