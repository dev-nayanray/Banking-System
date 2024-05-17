<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Banking System</h1>
        
     <div class="mb-3">
            <input type="text" class="form-control" id="search" placeholder="Search accounts...">
        </div>

        <!-- Search Results Modal -->
        <div class="modal fade" id="searchResultsModal" tabindex="-1" aria-labelledby="searchResultsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="searchResultsModalLabel">Account Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="searchResultsBody">
                        <!-- Account details will be dynamically inserted here -->
                    </div>
                </div>
            </div>
        </div>
         
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAccountModal">Create Account</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#depositModal">Deposit</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#withdrawModal">Withdraw</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#applyInterestModal">Apply Interest</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#takeLoanModal">Take Loan</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#repayLoanModal">Repay Loan</button>
        <div id="accountGrid" class="row mt-5">
            <script>
           function loadAccounts() {
    fetch('get_accounts.php')
    .then(response => response.json())
    .then(accounts => {
        const accountGrid = document.getElementById('accountGrid');
        accountGrid.innerHTML = ''; // Clear previous content

        // Loop through each account and create HTML elements
        accounts.forEach(account => {
            const accountCard = document.createElement('div');
            accountCard.classList.add('col-md-4', 'mb-3');
            accountCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${account.owner}</h5>
                        <p class="card-text">Account Number: ${account.accountNumber}</p>
                        <p class="card-text">Balance: $${account.balance}</p>
                        <p class="card-text">Loan Amount: $${account.loanAmount}</p>
                    </div>
                </div>
            `;
            accountGrid.appendChild(accountCard); // Append each account card to the grid
        });
    });
}
</script>
        </div>

        <!-- Modals -->
        <!-- Create Account Modal -->
        <div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAccountModalLabel">Create Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createAccountForm" action="create_account.php" method="POST">
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="accountNumber" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="owner" class="form-label">Owner Name</label>
                                <input type="text" class="form-control" id="owner" name="owner" required>
                            </div>
                            <div class="mb-3">
                                <label for="balance" class="form-label">Initial Balance</label>
                                <input type="number" class="form-control" id="balance" name="balance" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- Deposit Modal -->


<!-- Similar modals for Withdraw, Apply Interest, Take Loan, Repay Loan can be added here -->

    </div>
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="depositModalLabel">Deposit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="depositForm" action="deposit.php" method="POST">
                            <div class="mb-3">
                                <label for="depositAccountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="depositAccountNumber" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="depositAmount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="depositAmount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Deposit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdraw Modal -->
        <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="withdrawModalLabel">Withdraw</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="withdrawForm" action="withdraw.php" method="POST">
                            <div class="mb-3">
                                <label for="withdrawAccountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="withdrawAccountNumber" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="withdrawAmount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="withdrawAmount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Withdraw</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Apply Interest Modal -->
        <div class="modal fade" id="applyInterestModal" tabindex="-1" aria-labelledby="applyInterestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyInterestModalLabel">Apply Interest</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="applyInterestForm" action="apply_interest.php" method="POST">
                            <div class="mb-3">
                                <label for="interestAccountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="interestAccountNumber" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="interestRate" class="form-label">Interest Rate (%)</label>
                                <input type="number" class="form-control" id="interestRate" name="rate" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply Interest</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 <div class="modal fade" id="takeLoanModal" tabindex="-1" aria-labelledby="takeLoanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="takeLoanModalLabel">Take Loan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loanForm" action="loan.php" method="POST">
                            <div class="mb-3">
                                <label for="loanAccountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="loanAccountNumber" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="loanAmount" class="form-label">Loan Amount</label>
                                <input type="number" class="form-control" id="loanAmount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Take Loan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repay Loan Modal -->
<div class="modal fade" id="repayLoanModal" tabindex="-1" aria-labelledby="repayLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="repayLoanModalLabel">Repay Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="repayLoanForm" action="repay_loan.php" method="POST">
                    <div class="mb-3">
                        <label for="repayAccountNumber" class="form-label">Account Number</label>
                        <input type="text" class="form-control" id="repayAccountNumber" name="accountNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="repayAmount" class="form-label">Repay Amount</label>
                        <input type="number" class="form-control" id="repayAmount" name="amount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Repay Loan</button>
                </form>
            </div>
        </div>
    </div>
</div>

        
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value;
            if (query.length > 2) { // Fetch results when user has typed more than 2 characters
                fetch('search_accounts.php?q=' + query)
                    .then(response => response.json())
                    .then(data => {
                        let resultHtml = '';
                        if (data.length > 0) {
                            data.forEach(account => {
                                resultHtml += `
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">${account.owner}</h5>
                                            <p class="card-text">Account Number: ${account.accountNumber}</p>
                                            <p class="card-text">Balance: $${account.balance}</p>
                                            <p class="card-text">Loan Amount: $${account.loanAmount}</p>
                                        </div>
                                    </div>
                                `;
                            });
                        } else {
                            resultHtml = '<p>No accounts found.</p>';
                        }
                        document.getElementById('searchResultsBody').innerHTML = resultHtml;
                        var searchResultsModal = new bootstrap.Modal(document.getElementById('searchResultsModal'));
                        searchResultsModal.show();
                    });
            }
        });

        document.getElementById('createAccountForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('create_account.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Account created successfully!');
                    // Refresh account grid
                    loadAccounts();
                } else {
                    alert('Failed to create account: ' + data.message);
                }
                document.querySelector('#createAccountModal .btn-close').click();
            });
        });

        function loadAccounts() {
            fetch('get_accounts.php')
            .then(response => response.json())
            .then(accounts => {
                const accountGrid = document.getElementById('accountGrid');
                accountGrid.innerHTML = '';
                accounts.forEach(account => {
                    const accountCard = document.createElement('div');
                    accountCard.classList.add('col-md-4', 'mb-3');
                    accountCard.innerHTML = `
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${account.owner}</h5>
                                <p class="card-text">Account Number: ${account.accountNumber}</p>
                                <p class="card-text">Balance: $${account.balance}</p>
                                <p class="card-text">Loan Amount: $${account.loanAmount}</p>
                                <button class="btn btn-primary" onclick="openModal('${account.accountNumber}', 'deposit')">Deposit</button>
                                <button class="btn btn-primary" onclick="openModal('${account.accountNumber}', 'withdraw')">Withdraw</button>
                                <button class="btn btn-primary" onclick="openModal('${account.accountNumber}', 'applyInterest')">Apply Interest</button>
                                <button class="btn btn-primary" onclick="openModal('${account.accountNumber}', 'loan')">Take Loan</button>
                                <button class="btn btn-primary" onclick="openModal('${account.accountNumber}', 'repayLoan')">Repay Loan</button>
                            </div>
                        </div>
                    `;
                    accountGrid.appendChild(accountCard);
                });
            });
        }

        function openModal(accountNumber, action) {
            // Open the corresponding modal and pre-fill the account number
            const modalId = `${action}Modal`;
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            document.getElementById(`${action}AccountNumber`).value = accountNumber;
            modal.show();
        }

        document.getElementById('search').addEventListener('input', function(event) {
            const query = event.target.value.toLowerCase();
            const cards = document.querySelectorAll('#accountGrid .card');
            cards.forEach(card => {
                const owner = card.querySelector('.card-title').innerText.toLowerCase();
                if (owner.includes(query)) {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', loadAccounts);
    </script>

    <!-- Add script tags for Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
