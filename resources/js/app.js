import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'alpinejs';

// Open modal function
window.modal = function (name) {
    return {
        show: function () {
            var modal = document.getElementById(name)
            modal.classList.remove('hidden')
            modal.classList.add('flex')
        },
        hide: function () {
            var modal = document.getElementById(name)
            modal.classList.remove('flex')
            modal.classList.add('hidden')
        }
    }
}

// Close modal function
window.closeModal = function () {
    var closeEvent = new Event('close-modal')
    window.dispatchEvent(closeEvent)
}

// Modal event listener
window.addEventListener('open-modal', function (event) {
    var modalName = event.detail
    window.modal(modalName).show()
})

window.addEventListener('close-modal', function (event) {
    var modals = document.getElementsByClassName('modal')
    for (var i = 0; i < modals.length; i++) {
        window.modal(modals[i].id).hide()
    }
})

