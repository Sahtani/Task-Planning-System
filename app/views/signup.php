<html>

<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    Saira: ["Saira Condensed", "sans-serif"],
                },
                extend: {
                    colors: {
                        text: "#0F0F0F ",
                        background: "#FFFFFF",
                        primary: "#155831",
                        secondary: "#D7E4DC",
                        accent: "#C20002",
                        primary2: "#3E5815",
                        hoverd: "#FF4F4D",
                        dark: "#1e1b4b",
                        secondary: "#312e81",
                        blueText: "#1e40af",
                        primary: "#1d4ed8",
                        blutextbtn: "#2563eb",
                        blueText2: "#3b82f6",
                        background: "#60a5fa",
                        btn: "#93c5fd",
                        deleted: "#FF6D4D",
                        hoverd: "#FF4F4D",
                    },
                },
            },
        };
    </script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="flex flex-row gap-1 items-center justify-center ml-2 ">


                <h2 class="ms-3 font-extrabold text-dark font-semibold text-2xl">Data</h2>
                <img src="<?= BASE_URL_ASSETS ?>img/brand.png" alt=brand />
                <h2 class="ms-3 font-extrabold text-dark font-semibold text-2xl">are </h2>
            </div>
            <div class=" flex flex-col items-center">

                <div class=" w-full flex-1 ">


                    <div class="my-4 border-b text-center">
                        <p class="border-b  leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Alreadt Have an account? <a href="<?= BASE_URL ?>/user/log_in" class="text-dark font-bold">LogIn</a>
                        </p>
                    </div>
                    <form action="<?= BASE_URL ?>/user/Usersignup" method="post" onsubmit="return validateForm()">
                        <div class="mx-auto max-w-xs">
                            <input class="mt-2 mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" id="firstname" name="firstname" required placeholder="First Name" />
                            <span id="firstnameError" class="error-message text-xs mt-0"></span>

                            <input class="mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" id="lastname" name="lastname" required placeholder="Last Name" />
                            <span id="lastnameError" class="error-message text-xs"></span>

                            <input class="mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="email" id="email" name="email" required placeholder="E-mail" />
                            <span id="emailError" class="error-message text-xs"></span>

                            <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" id="password" name="password" required placeholder="Password" />
                            <span id="passwordError" class="error-message text-xs"></span>

                            <button class="mt-8 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none" name="submit" type="submit">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-3">
                                    Sign Up
                                </span>
                            </button>
                        </div>
                    </form>

                    <script>
                        function validateForm() {
                            var firstNameInput = document.getElementById('firstname');
                            var lastNameInput = document.getElementById('lastname');
                            var emailInput = document.getElementById('email');
                            var passwordInput = document.getElementById('password');

                            if (!validateName(firstNameInput.value)) {
                                displayError('firstnameError', 'Invalid firstname , and the name must be greater than 3 characters.');
                                return false;
                            } else {
                                clearError('firstnameError');
                            }

                            if (!validateName(lastNameInput.value)) {
                                displayError('lastnameError', 'Invalid lastname, and the name must be greater than 3 characters.');
                                return false;
                            } else {
                                clearError('lastnameError');
                            }

                            if (!validateEmail(emailInput.value)) {
                                displayError('emailError', 'Invalid email address.');
                                return false;
                            } else {
                                clearError('emailError');
                            }

                            if (!validatePassword(passwordInput.value)) {
                                displayError('passwordError', 'Invalid password. It must contain at least one digit, one lowercase and one uppercase letter, and be at least 8 characters long.');
                                return false;
                            } else {
                                clearError('passwordError');
                            }

                            return true;
                        }

                        function validateName(name) {
                            var regex = /^[A-Za-z]{4,}$/;
                            return regex.test(name);
                        }

                        function validateEmail(email) {
                            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            return regex.test(email);
                        }

                        function validatePassword(password) {
                            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                            return regex.test(password);
                        }

                        function displayError(elementId, errorMessage) {
                            var errorElement = document.getElementById(elementId);
                            errorElement.textContent = errorMessage;
                            errorElement.style.color = 'red';
                        }

                        function clearError(elementId) {
                            var errorElement = document.getElementById(elementId);
                            errorElement.textContent = '';
                        }
                    </script>

                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>

</body>

</html>