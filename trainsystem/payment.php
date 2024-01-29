<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

<?php if(isset($_SESSION['username'])) { ?>

<form action="invoice.php" method="post">

    <div class="px-5 py-5">
        <div>
            <p class="text-3xl font-extrabold tracking-tight leading-none">Payment Details</p>
            <small class="text-gray-600">Please complete your bank information below.</small><hr><br><br>
        </div>

                <div class="mt-5 p-2">
                    <label for="cards" class="block mb-2 text-sm font-medium text-gray-900 dark:text-red">Accepted Cards</label>
                    <div class="cards">
                        <select id="cards" name="cards" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>>>
                            <option disabled selected value="">--Select you Bank--</option>
                            <option value="Maybank">Maybank</option>
                            <option value="Bank Islam">Bank Islam</option>
                            <option value="Hong Leong Bank">Hong Leong Bank</option>
                            <option value="CIMB Bank">CIMB Bank</option>
                        </select>
                    </div>

                    <div>
                        <label for="cc-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue">Card number</label>
                        <input name="cc-number" type="text" id="cc-number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Debit / Credit Card No." autocomplete="off">
                        <span class="invalid-feedback">Enter a valid 12 to 16 digit card number</span>
                    </div>
                </div>

            <div class="mt-1 p-2 grid grid-cols-2 gap-2">
                <div>
                    <div>
                        <label for="cc-exp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-red">Expiration</label>
                        <input name="cc-exp" type="text" id="cc-exp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="MM / YY" autocomplete="cc-exp">
                        <span class="invalid-feedback">Enter the expiration date</span>
                    </div>
                </div>

                <div>
                    <div>
                        <label for="CVV" class="block mb-2 text-sm font-medium text-gray-900 dark:text-yellow">CVV</label>
                        <input name="CVV" type="text" id="CVV" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXX" autocomplete="off">
                        <span class="invalid-feedback">Enter the 3-digit code on back of the card</span>
                    </div>
                </div>
                
            </div>

        <div class="mt-5 p-5 flex flex-row gap-3 justify-end">
            <button type="button" onclick="goBack()" class="bg-red-700 text-white font-bold text-sm px-5 py-3 rounded">Go Back</button>
            <button type="submit" class="bg-blue-700 text-white font-bold text-sm px-5 py-3 rounded">Pay</button>
        </div>
    </div>
</form>

<?php } ?>

<script>

    function goBack() {
        window.history.back(); }

</script>

</body>
</html>