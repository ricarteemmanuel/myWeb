<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php require('header.php'); ?>


    <main>
        <div class="container">
            <h1 class="titleForm">Buy Tickets</h1>
            <form id="ticketForm" action="submit_ticket_purchase.php" method="POST">
                
                <div class="form-group">
                    <label for="eventSelection">Select Event:</label>
                    <select id="eventSelection" name="eventSelection" class="form-control">
                        <option value="">Select Event</option>
                        <option value="Conference - $100">Conference - $100</option>
                        <option value="Workshop - $50">Workshop - $50</option>
                        <option value="Seminar - $75">Seminar - $75</option>
                        <option value="Webinar - $30">Webinar - $30</option>
                    </select>
                    <span class="error" id="eventSelectionError"></span>
                </div>

                <div class="form-group">
                    <label for="ticketQuantity">Select Quantity:</label>
                    <input type="number" id="ticketQuantity" name="ticketQuantity" class="form-control" min="1" value="1">
                    <span class="error" id="ticketQuantityError"></span>
                </div>

                <div class="form-group">
                    <label for="totalPrice">Total Price: $<span id="totalPrice">100</span></label>
                </div>

                <div class="form-group">
                    <label for="customerName">Your Name:</label>
                    <input type="text" id="customerName" name="customerName" class="form-control">
                    <span class="error" id="customerNameError"></span>
                </div>

                <div class="form-group">
                    <label for="customerEmail">Email Address:</label>
                    <input type="email" id="customerEmail" name="customerEmail" class="form-control">
                    <span class="error" id="customerEmailError"></span>
                </div>

                <div class="form-group">
                    <label for="paymentMethod">Payment Method:</label>
                    <select id="paymentMethod" name="paymentMethod" class="form-control">
                        <option value="">Select Payment Method</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="PayPal">PayPal</option>
                    </select>
                    <span class="error" id="paymentMethodError"></span>
                </div>

                <div class="button-container">
                    <button type="submit" class="submit-btn">Purchase Tickets</button>
                </div>
            </form>

        </div>
    </main>

    <footer>
        <p>&copy; 2024 Event Ticketing. All Rights Reserved.</p>
    </footer>

    <script>
        document.getElementById('ticketQuantity').addEventListener('input', function() {
            const selectedEvent = document.getElementById('eventSelection').value;
            const ticketQuantity = this.value;
            const pricePerTicket = parseInt(selectedEvent.split(' - ')[1].replace('$', ''));
            const totalPrice = pricePerTicket * ticketQuantity;

            document.getElementById('totalPrice').textContent = totalPrice;
        });

        document.getElementById('ticketForm').addEventListener('submit', function(e) {
            e.preventDefault();
            validateForm();
        });

        function validateForm() {
            document.getElementById('eventSelectionError').innerText = '';
            document.getElementById('ticketQuantityError').innerText = '';
            document.getElementById('customerNameError').innerText = '';
            document.getElementById('customerEmailError').innerText = '';
            document.getElementById('paymentMethodError').innerText = '';

            let valid = true;

            const eventSelection = document.getElementById('eventSelection').value;
            if (eventSelection === '') {
                document.getElementById('eventSelectionError').innerText = 'Please select an event';
                valid = false;
            }

            const ticketQuantity = document.getElementById('ticketQuantity').value;
            if (ticketQuantity < 1) {
                document.getElementById('ticketQuantityError').innerText = 'Quantity must be at least 1';
                valid = false;
            }

            const customerName = document.getElementById('customerName').value;
            if (customerName === '') {
                document.getElementById('customerNameError').innerText = 'Your name is required';
                valid = false;
            }

            const customerEmail = document.getElementById('customerEmail').value;
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (customerEmail === '' || !customerEmail.match(emailPattern)) {
                document.getElementById('customerEmailError').innerText = 'Valid email is required';
                valid = false;
            }

            const paymentMethod = document.getElementById('paymentMethod').value;
            if (paymentMethod === '') {
                document.getElementById('paymentMethodError').innerText = 'Please select a payment method';
                valid = false;
            }

            if (valid) {
                alert('Tickets purchased successfully!');
                this.submit();
            }
        }
    </script>
    <?php require('footer.php'); ?>

</body>
</html>
