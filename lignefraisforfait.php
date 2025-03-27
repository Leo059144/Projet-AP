<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Expense Tracker</h1>
        
        <div class="expense-row">
            <div class="expense-item description">
                <span>frais de restauration</span>
            </div>
            <div class="expense-item">
                <input type="number" placeholder="quantité">
            </div>
            <div class="expense-item">
                <input type="number" placeholder="prix">
            </div>
            <div class="expense-item total">
                <span>€0.00</span>
            </div>
        </div>

        <div class="expense-row">
            <div class="expense-item description">
                <span>frais de nuitée</span>
            </div>
            <div class="expense-item">
                <input type="number" placeholder="quantité">
            </div>
            <div class="expense-item">
                <input type="number" placeholder="prix">
            </div>
            <div class="expense-item total">
                <span>€0.00</span>
            </div>
        </div>

        <div class="expense-row">
            <div class="expense-item description">
                <span>frais de kilometrage</span>
            </div>
            <div class="expense-item">
                <input type="number" placeholder="quantité">
            </div>
            <div class="expense-item">
                <input type="number" placeholder="prix">
            </div>
            <div class="expense-item total">
                <span>€0.00</span>
            </div>
        </div>

        <div class="expense-row total-row">
            <div class="expense-item description"></div>
            <div class="expense-item"></div>
            <div class="expense-item"></div>
            <div class="expense-item grand-total">
                <span>total general</span>
                <span>€0.00</span>
            </div>
        </div>
    </div>
</body>
</html>

