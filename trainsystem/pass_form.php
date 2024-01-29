<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
include("secure.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <title>Booking Details</title>
</head>
<body>

    <?php
    if(isset($_SESSION['username']) && isset($_POST['book_but'])) {
        $departure = $_POST['departure'];
        $destination = $_POST['destination'];
        $dep_date = $_POST['dep_date'];
        $ret_date = $_POST['ret_date'];
        $coachNumber = $_POST['coachNumber'];
        $seat = $_POST['seat'];
        $pax = $_POST['pax'];
        $trainNo = $_POST['trainNo'];
    ?>

<div class="px-5 py-5">
    <section class="bg-white dark:bg-gray-900">
        <div class="pb-8 px-4 max-w-screen-xl lg:py-6">
            <h1 class="text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Train Details</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-md dark:text-gray-400 text-left p-0 m-0">Please check your train details before booking.</p>
        </div>
    </section>
<div>
    
<form action="pass_detail_inc.php" method="post">
    <input type="hidden" name="departure" value='<?php echo "$departure"; ?>'>
    <input type="hidden" name="destination" value='<?php echo "$destination"; ?>'>
    <input type="hidden" name="dep_date" value='<?php echo "$dep_date"; ?>'>
    <input type="hidden" name="ret_date" value='<?php echo "$ret_date"; ?>'>
    <input type="hidden" name="pax" value='<?php echo "$pax"; ?>'>

    <div class="mt-5 p-5 flex flex-row gap-3 justify-end">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        Train No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departure From
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destination
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Departure Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Return Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Coach No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Seat No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        echo '
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                '.$trainNo.'
                            </td>
                            <td class="px-6 py-4">
                                '.$departure.'
                            </td>
                            <td class="px-6 py-4">
                                ->
                            </td>
                            <td class="px-6 py-4">
                                '.$destination.'
                            </td>
                            <td class="px-6 py-4">
                                '.$dep_date.'
                            </td>
                            <td class="px-6 py-4">
                                '.$ret_date.'
                            </td>
                            <td class="px-6 py-4">
                                '.$coachNumber.'
                            </td>
                            <td class="px-6 py-4">
                                '.$seat.'
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>';
                ?>
            </tbody>
        </table>
    </div>

    <?php for($i=1;$i<=$pax;$i++) {
            echo '  
        <div class="px-5">
                <div>
                    <p class="text-3xl font-extrabold tracking-tight leading-none">Passenger Details</p>
                    <small class="text-gray-600">Below are your Passenger information. Please complete your details below.</small>
                </div>

                <div class="mt-5 grid grid-cols-3 gap-3">
                    <div>
                        <div>
                            <label for="firstname'.$i.'" class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue">First Name</label>
                            <input name="firstname" type="text" id="firstname'.$i.'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div>
                        <div>
                        <label for="lastname'.$i.'" class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue">Last Name</label>
                        <input name="lastname" type="text" id="lastname'.$i.'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Family Name" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="phoneNo'.$i.'" class="block mb-2 text-sm font-medium text-gray-900 dark:text-yellow">Phone Number</label>
                            <input name="phoneNo[]" type="int" id="phoneNo'.$i.'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-green">Date of Birth</label>
                            <input name="dob[]" type="date" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select Date" required>
                        </div>
                    </div>
                </div>
        </div> '; 
    } ?>


    <div class="mt-5 p-5 flex flex-row gap-3 justify-end">
        <button type="button" onclick="goBack()" class="bg-red-700 text-white font-bold text-sm px-5 py-3 rounded">Go Back</button>
        <button type="submit" name="pass_but" class="bg-blue-700 text-white font-bold text-sm px-5 py-3 rounded">Proceed Payment</button>
    </div>

</form>

    <?php } ?>

<script>

    function goBack() {
        window.history.back(); }

</script>

</body>
</html>