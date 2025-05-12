export default function viewTicketList() {
    /**
     * Handles the display of tickets by adding click event listeners to each ticket.
     * When a ticket is clicked, it hides the detailed content of the previously displayed ticket
     * and shows the detailed content of the selected ticket.
     *
     * @returns {void}
     */
    let tickets = document.getElementsByClassName('ticket');
    let currentTicket = 0;
    for (let ticket of tickets) {
        ticket.addEventListener('click', function () {
            let ticketBottom = ticket.lastElementChild;
            if (ticketBottom.classList.contains('hide')) {
                ticketBottom.classList.remove('hide');
                if (currentTicket != ticket.dataset.index) {
                    tickets[currentTicket].lastElementChild.classList.add('hide');
                    currentTicket = ticket.dataset.index;
                }
            } else {
                ticketBottom.classList.add('hide');
            }
        })
    }
}