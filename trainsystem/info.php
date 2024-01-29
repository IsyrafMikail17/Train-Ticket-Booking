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
    <title>Info Screen</title>
</head>
<body>

<div class="w-full h-full">
<?php
    if(isset($_POST['src_train']) && isset($_SESSION['username'])){
        $departure = $_POST['departure']; 
        $destination = $_POST['destination'];
        $dep_date = $_POST['dep_date'];
        $ret_date = $_POST['ret_date'];
        $pax = $_POST['pax'];
        if($_POST['departure'] === $_POST['destination']){
            header('Location: index.php?error=sameval');
            exit();
          }
          if($_POST['departure'] === '0'){
            header('Location: index.php?error=seldep');
            exit();
          }
          if($_POST['departure'] === '0'){
            header('Location: index.php?error=selarr');
            exit();
          } ?>

        <div class="px-5 py-5">
            <section class="bg-white dark:bg-gray-900">
                <div class="pb-8 px-4 max-w-screen-xl lg:py-6">
                    <h1 class="text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Train Timetable</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-md dark:text-gray-400 text-left p-0 m-0">Below are list of train that are available for you. Please select your train and book your train right now with our deals today.</p>
                </div>
            </section>
        <div>
    
<form action="pass_form.php" method="post">

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
                        Dep_Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ret_Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Available Coach
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Available Seats
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for ($i = 0; $i < count($GLOBAL__CONSTANT); $i++) { 
                        echo '
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                '.($i + 1).'
                            </th>
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
                                '.$GLOBAL__CONSTANT[$i]["AVAILABLE_COACH"].'
                            </td>
                            <td class="px-6 py-4">
                                '.$GLOBAL__CONSTANT[$i]["AVAILABLE_SITS"].' seats
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="mt-5 p-5">
        <div>
            <p class="text-3xl font-extrabold tracking-tight leading-none">Select your Train, Coach & Seat</p>
            <small class="text-gray-600">Below are your train information. Please complete your form below.</small>
        </div>

        <div class="mt-5 grid grid-cols-3 gap-3">
            <div>
                <div>
                    <label for="trainNo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-blue">Train No.</label>
                    <select name="trainNo" id="trainNo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>>
                        <option disable selected value="">-- Select Train --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-green">Select Coach</label>
                <select name="coachNumber" required id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">-- Select Coach --</option>
                    <?php
                    $query = 'SELECT * FROM `coach`';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt,$query);         
                    mysqli_stmt_execute($stmt);          
                    $result = mysqli_stmt_get_result($stmt);    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value='. $row['coachNumber'] .'>'. 
                        $row['coachNumber'] .'</option>';
                    }
                    ?>
                </select>
            </div>
                <?php for ($i = 0; $i < $_POST["pax"]; $i++) { ?>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-green">Select <!-- <?php echo ($i + 1); ?> -->Seat</label>
                <select name="seat" required id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">-- Select Seat Number <?php echo ($i + 1); ?> --</option>
                    <?php
                    $query = 'SELECT * FROM `coach_seat`';
                    $stmt = mysqli_stmt_init($con);
                    mysqli_stmt_prepare($stmt,$query);         
                    mysqli_stmt_execute($stmt);          
                    $result = mysqli_stmt_get_result($stmt);    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value='. $row['seatsID']  .'>'. 
                        $row['seatNumber'] .'</option>';
                    }
                    ?>
                </select>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="mt-5 p-5 flex flex-row gap-3 justify-end">
        <button type="button" onclick="goBack()" class="bg-red-700 text-white font-bold text-sm px-5 py-3 rounded">Go Back</button>
        <button type="submit" name="book_but" class="bg-blue-700 text-white font-bold text-sm px-5 py-3 rounded">Proceed Booking</button>
    </div>
</form>
<?php }?>

<script>

    function goBack() {
        window.history.back();
    }

</script>

</body>
</html>