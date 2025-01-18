/*
* @author @ImraneSAHAB
*/
document.addEventListener('DOMContentLoaded', function () {
    // Calendrier
    flatpickr("#datepicker", {
        minDate: "today",
        inline: true,
        enabledate: true,
        dateFormat: "Y-m-d",
    });

    // Gestionnaire d'événements pour la mise à jour de l'input de date
    const datePickerInput = document.getElementById('datepicker');
    datePickerInput.addEventListener('change', function () {
        // Met à jour un autre input si nécessaire, par exemple :
        document.getElementById('dateUpdate').value = this.value;
    });    

    // Bouton horaire défilant
    const timeList = document.getElementById('time');
    const intervals = 30;

    for (let i = 8 * 60; i < 22 * 60; i += intervals) {
        const hours = Math.floor(i / 60);
        const minutes = i % 60;
        const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;

        const timeItem = document.createElement('div');
        timeItem.textContent = formattedTime;
        timeItem.classList.add('time-item');
        timeList.appendChild(timeItem);
    }

    timeList.addEventListener('click', function (event) {
        const selectedTime = event.target;
        if (selectedTime.classList.contains('time-item')) {
            // Déselectionne toutes les autres heures
            Array.from(timeList.children).forEach(timeItem => timeItem.classList.remove('selected'));
            selectedTime.classList.add('selected');
            document.getElementById('horairepicker').value = selectedTime.textContent; // Met à jour l'input
        }
    });
});