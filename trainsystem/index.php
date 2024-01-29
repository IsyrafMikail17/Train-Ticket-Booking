<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
include("secure.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Page</title>
</head>
<body>

<div class="header">

		<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full transition delay-150 duration-300 ease-in-out">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 transition delay-150 duration-300 ease-in-out">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Search your train today.
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
					<form action="info.php" method="post">
                    <div class="p-4 md:p-5 space-y-4">
						<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
							<div>
								<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose departure city</label>
								<select name="departure" required id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
									<option selected value="">-- Select Cities --</option>
									<?php
									$query = 'SELECT * FROM `train`';
									$stmt = mysqli_stmt_init($con);
									mysqli_stmt_prepare($stmt,$query);         
									mysqli_stmt_execute($stmt);          
									$result = mysqli_stmt_get_result($stmt);    
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<option value='. $row['departure']  .'>'. 
										$row['departure'] .'</option>';
									}
									?>
								</select>
							</div>
							<div>
								<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose destination city</label>
								<select name="destination" required id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
									<option selected value="">-- Select Cities --</option>
									<?php
									$query = 'SELECT * FROM `train`';
									$stmt = mysqli_stmt_init($con);
									mysqli_stmt_prepare($stmt,$query);         
									mysqli_stmt_execute($stmt);          
									$result = mysqli_stmt_get_result($stmt);    
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<option value='. $row['destination']  .'>'. 
										$row['destination'] .'</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-3">
							<div>
								<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departure Date</label>
								<div class="relative max-w-sm">
									<div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
										<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
										<path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
										</svg>
									</div>
									<input name="dep_date" required datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
								</div>
							</div>
							<div>
								<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return Date</label>
								<div class="relative max-w-sm">
									<div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
										<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
										<path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
										</svg>
									</div>
									<input name="ret_date" required datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
								</div>
							</div>
						</div>

						<div class="mt-5 grid grid-cols-1 gap-3">
							<label for="number-input" name="pax" class="block text-sm font-medium text-gray-900 dark:text-white">Number of Passenger</label>
    						<input value="1" name="pax" type="text" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example: 1">
						</div>
                    </div>
					
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" name="src_train" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                    </div>

					</form>
                </div>
            </div>
        </div>

		<div class="px-5 py-5">
            <section class="bg-white dark:bg-gray-900">
                <div class="pb-8 px-4 max-w-screen-xl lg:py-6">
                    <h1 class="text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Train Schedule</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-md dark:text-gray-400 text-left p-0 m-0">Below are list of train that are available for you. Please select your train and book your train right now with our deals today.</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center py-3 px-5 text-base font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Book Train
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button> 
                    </div>
                </div>
            </section>
        <div>
</div>


<div class="w-full h-full p-5">
	  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Train Number
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
                            Date
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
								<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
									'.$GLOBAL__CONSTANT[$i]["TRAIN_NO"].'
								</th>
								<td class="px-6 py-4">
									'.$GLOBAL__CONSTANT[$i]["DEPARTURE_FROM"].'
								</td>
								<td class="px-6 py-4">
									->
								</td>
								<td class="px-6 py-4">
									'.$GLOBAL__CONSTANT[$i]["DESTINATION"].'
								</td>
								<td class="px-6 py-4">
									'.$GLOBAL__CONSTANT[$i]["DATE"].'
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
</div>


</body>
</html>