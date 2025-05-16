

let tickets = document.getElementsByClassName('ticket');
let currentTicket = 0;
let focus = null;
let deleteMode = false;
let validateMode = false;
let refuseMode = false;

for (let ticket of tickets) {
    ticket.addEventListener('click', function () {
        let ticketBottom = ticket.lastElementChild;
        if (deleteMode) {
            // Delete ticket in delete mode
            let id = ticket.dataset.index_bdd;
            ticket.classList.add('hide');
            deleteTicket(id);
        } else if (validateMode) {
            let id = ticket.dataset.index_bdd;
            ticket.firstElementChild.firstElementChild.src = "../assets/condition_2.png";
            validateTicket(id, 2);
        } else if (refuseMode) {
            let id = ticket.dataset.index_bdd;
            ticket.firstElementChild.firstElementChild.src = "../assets/condition_3.png";
            validateTicket(id, 3)
        } if (ticketBottom.classList.contains('hide')) {
            //show ticket details
            ticketBottom.classList.remove('hide');
            focus = ticket;
            if (currentTicket != ticket.dataset.index) {
                tickets[currentTicket].lastElementChild.classList.add('hide');
                currentTicket = ticket.dataset.index;
            }
        } else {
            // Hide details of precedent selected ticket
            ticketBottom.classList.add('hide');
            focus = null;
        }
    })
}

if (document.getElementsByClassName('new-ticket-btn') != null) {

    // Mode ticket edition activate
    for (let btn of document.getElementsByClassName('new-ticket-btn')) {
        btn.addEventListener('click', function () {
            // Redirect to new ticket page
            document.location.href="../pages/new_ticket.php";
        })
    }

    for (let btn of document.getElementsByClassName('delete-ticket-btn')) {
        btn.addEventListener('click', function (e) {
            /* Delete a ticket ort active delete mode if there is no ticket already selected*/
            e.stopPropagation()
            let id;
            if (focus != null) {
                // delete focused ticket
                id = focus.dataset.index_bdd;
                focus.classList.add('hide');
                deleteTicket(id);
            } else {
                // Active Delete Mode
                deleteMode = true;
                console.log("delete mode on");
                //Take off delete mode if we click outside of a ticket
                document.addEventListener('click', function () {
                    deleteMode = false;
                    console.log("delete mode off");
                })
            }
        });
    }
}

if (document.getElementsByClassName('validate-btn') != null) {
    // Ticket Management activate
    for (let btn of document.getElementsByClassName('validate-btn')) {
        btn.addEventListener('click', function (e) {
            /* Delete a ticket ort active delete mode if there is no ticket already selected*/
            e.stopPropagation()
            let id;
            if (focus != null) {
                // delete focused ticket
                id = focus.dataset.index_bdd;
                focus.firstElementChild.firstElementChild.src = "../assets/condition_2.png";
                validateTicket(id, 2);
            } else {
                // Active Delete Mode
                validateMode = true;
                console.log("validate mode on");
                //Take off delete mode if we click outside of a ticket
                document.addEventListener('click', function () {
                    validateMode = false;
                    console.log("validate mode off");
                })
            }
        });

        for (let btn of document.getElementsByClassName('refuse-btn')) {
            btn.addEventListener('click', function (e) {
                /* Delete a ticket ort active delete mode if there is no ticket already selected*/
                e.stopPropagation()
                let id;
                if (focus != null) {
                    // delete focused ticket
                    id = focus.dataset.index_bdd;
                    focus.firstElementChild.firstElementChild.src = "../assets/condition_3.png";
                    validateTicket(id, 3);
                } else {
                    // Active Delete Mode
                    refuseMode = true;
                    console.log("refuse mode on");
                    //Take off delete mode if we click outside of a ticket
                    document.addEventListener('click', function () {
                        refuseMode = false;
                        console.log("refuse mode off");
                    })
                }
            });
        }
    }
}

if (document.getElementsByClassName('manage-user-btn') != null) {
    // User management activate
    for (let btn of document.getElementsByClassName('manage-user-btn')) {
        btn.addEventListener('click', function () {
            // Redirect to manage user page
            document.location.href="../pages/manage_user.php?action=edit";
        })
    }

    for (let btn of document.getElementsByClassName('new-user-btn')) {
        btn.addEventListener('click', function () {
            // Redirect to new user page
            document.location.href="../pages/new_user.php?action=edit";
        })
    }
}

function deleteTicket(id) {
    // Send request to delete ticket from database
    fetch("../php_assets/delete_ticket.php?id=" + id)
        .then(response => response.text())
        .then(data => {
            console.log("Réponse PHP :", data);
        })
        .catch(error => {
            console.error("Erreur lors de la requête :", error);
        });

    console.log("ID envoyé :", id);
}

function validateTicket(id, action) {
    // Send request to delete ticket from database
    fetch("../php_assets/validate_ticket.php?id=" + id + "&action=" + action)
        .then(response => response.text())
        .then(data => {
            console.log("Réponse PHP :", data);
        })
        .catch(error => {
            console.error("Erreur lors de la requête :", error);
        });

    console.log("ID envoyé :", id);
}

