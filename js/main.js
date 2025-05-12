

let tickets = document.getElementsByClassName('ticket');
let currentTicket = 0;
let focus = null;
for (let ticket of tickets) {
    ticket.addEventListener('click', function () {
        let ticketBottom = ticket.lastElementChild;
        if (ticketBottom.classList.contains('hide')) {
            ticketBottom.classList.remove('hide');
            focus = ticket;
            if (currentTicket != ticket.dataset.index) {
                tickets[currentTicket].lastElementChild.classList.add('hide');
                currentTicket = ticket.dataset.index;
            }
        } else {
            ticketBottom.classList.add('hide');
            focus = null;
        }
    })
}

document.getElementById('new-ticket-btn').addEventListener('click', function () {
    document.location.href="../pages/new_ticket.php?action=new";
})

document.getElementById('manage-user-btn').addEventListener('click', function () {
    document.location.href="../pages/manage_user.php?action=edit";
})

document.getElementById('new-user-btn').addEventListener('click', function () {
    document.location.href="../pages/new_user.php?action=edit";
})

document.getElementById('delete-ticket-btn').addEventListener('click', function () {
        if (focus != null) {
            const id = focus.dataset.index_bdd;
            focus.delete();
        } else {

        }

        fetch("../php_assets/delete_ticket.php?id=" + id)
            .then(response => response.text())
            .then(data => {
                console.log("Réponse PHP :", data);
            })
            .catch(error => {
                console.error("Erreur lors de la requête :", error);
            });

        console.log("ID envoyé :", id);

});